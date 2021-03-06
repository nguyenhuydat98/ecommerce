<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductInformation;
use App\Models\User;
use App\Models\Comment;
use App\Similarity;
use App\UserSimilarity;
use Auth;


class HomeController extends Controller
{
    public function home()
    {
        $categories = Category::all();
        $productInformations = ProductInformation::orderBy('id', 'desc')->get();

        // Sản phẩm phổ biến
        $listIphoneMinPrice = [];
        $listIphoneMaxPrice = [];

        $listSamSungMinPrice = [];
        $listSamSungMaxPrice = [];
        foreach ($productInformations as $productInformation) {
            if ($productInformation->category_id == 1) {
                $minPrice = $productInformation->products->first()->unit_price;
                $maxPrice = $minPrice;
                foreach ($productInformation->products as $product) {
                    if ($minPrice > $product->unit_price) {
                        $minPrice = $product->unit_price;
                    }
                    if ($maxPrice < $product->unit_price) {
                        $maxPrice = $product->unit_price;
                    }
                }
                array_push($listIphoneMinPrice, $minPrice);
                array_push($listIphoneMaxPrice, $maxPrice);
            }

            if ($productInformation->category_id == 2) {
                $minPrice = $productInformation->products->first()->unit_price;
                $maxPrice = $minPrice;
                foreach ($productInformation->products as $product) {
                    if ($minPrice > $product->unit_price) {
                        $minPrice = $product->unit_price;
                    }
                    if ($maxPrice < $product->unit_price) {
                        $maxPrice = $product->unit_price;
                    }
                }
                array_push($listSamSungMinPrice, $minPrice);
                array_push($listSamSungMaxPrice, $maxPrice);
            }
        }

        // Sản phẩm đánh giá cao
        $productInformationRates = ProductInformation::where(
            [
                ['rate', '<>', null],
                ['rate', '>=', 3],
            ])
            ->orderBy('rate', 'desc')
            ->take(6)
            ->get();

        $rateMinPrice = [];
        $rateMaxPrice = [];

        foreach ($productInformationRates as $productInformation) {
            $minPrice = $productInformation->products->first()->unit_price;
            $maxPrice = $minPrice;
            foreach ($productInformation->products as $product) {
                if ($minPrice > $product->unit_price) {
                    $minPrice = $product->unit_price;
                }
                if ($maxPrice < $product->unit_price) {
                    $maxPrice = $product->unit_price;
                }
            }
            array_push($rateMinPrice, $minPrice);
            array_push($rateMaxPrice, $maxPrice);
        }

        $productRecommenders = [];
        $recommenderMinPrice = [];
        $recommenderMaxPrice = [];
        $top = 3;
        if (Auth::guard('web')->check()) {
            $activeUserId = Auth::guard('web')->id();
            $users = User::all();
            $items = ProductInformation::all();
            $matrix = $this->getMatrixUserItem($users, $items);
            $normalizedMatrix = $this->normalizedMatrixUserItem($users, $items, $matrix);
            $vectorSimilarity = $this->getMatrixUserSimilarity($activeUserId, $users, $normalizedMatrix);
            // dd($matrix, $normalizedMatrix, $vectorSimilarity);
            $recommenders = $this->getRecommender($activeUserId, $matrix, $normalizedMatrix, $vectorSimilarity);
            // dd($recommenders);

            $count = 0;
            foreach ($recommenders as $key => $productRecommender) {
                if ($productRecommender != null && $count <= $top) {
                    $productInformation = ProductInformation::findOrFail($key);
                    array_push($productRecommenders, $productInformation);

                    $minPrice = $productInformation->products->first()->unit_price;
                    $maxPrice = $minPrice;
                    foreach ($productInformation->products as $product) {
                        if ($minPrice > $product->unit_price) {
                            $minPrice = $product->unit_price;
                        }
                        if ($maxPrice < $product->unit_price) {
                            $maxPrice = $product->unit_price;
                        }
                    }
                    array_push($recommenderMinPrice, $minPrice);
                    array_push($recommenderMaxPrice, $maxPrice);
                    $count++;
                } else {
                    break;
                }
            }
        }
        // dd($productRecommenders, $recommenderMinPrice, $recommenderMaxPrice);

        return view('user.pages.home', compact(
            'categories',
            'productInformations',
            'listIphoneMinPrice',
            'listIphoneMaxPrice',
            'listSamSungMinPrice',
            'listSamSungMaxPrice',
            'productInformationRates',
            'rateMinPrice',
            'rateMaxPrice',
            'productRecommenders',
            'recommenderMinPrice',
            'recommenderMaxPrice'
        ));
    }


    /**
     * Step 1
     * Tìm ra ma trận user - item (user hàng, item cột)
     */
    public function getMatrixUserItem($users, $items)
    {
        $matrix = [];
        foreach ($users as $user) {
            $array = [];
            foreach ($items as $item) {
                $array[$item->id] = null;
            }
            $matrix[$user->id] = $array;
        }
        $comments = Comment::all();
        foreach ($comments as $comment) {
            foreach ($users as $user) {
                if ($comment->user_id == $user->id) {
                    foreach ($items as $item) {
                        if ($comment->product_information_id == $item->id) {
                            $matrix[$user->id][$item->id] = $comment->rate;
                            break;
                        }
                    }
                    break;
                }
            }
        }

        return $matrix;
    }

    /**
     * Step 2
     * Chuẩn hóa ma trận user - item
     */
    public function normalizedMatrixUserItem($users, $items, $matrix)
    {
        foreach ($users as $user) {
            $avg = Similarity::averageRating($user);
            foreach ($items as $item) {
                if ($matrix[$user->id][$item->id] != null) {
                    $matrix[$user->id][$item->id] = $matrix[$user->id][$item->id] - $avg;
                } else {
                    $matrix[$user->id][$item->id] = 0;
                }
            }
        }

        return $matrix;
    }

    /**
     * Step 3
     * Tìm ra ma trận User similarity (ma trận vuông)
     * Số hàng (cột) của ma trận là số user trong DB
     * Việc tính toán sẽ được dựa trên ma trận đã chuẩn hóa
     * Tuy nhiên, ta chỉ tính toán active user so với các user khác
     */

    public function getMatrixUserSimilarity($userId, $users, $matrix)
    {
        $activeUser = User::findOrFail($userId);
        $vectorActiveUser = $this->getVectorInNormalizedMatrix($userId, $matrix);

        $vector = [];
        foreach ($users as $otherUser) {
            $column = $otherUser->id;
            if ($otherUser->id == $userId) {
                $vector[$column] = 1;
            } else {
                $vectorOtherUser =  $this->getVectorInNormalizedMatrix($column, $matrix);
                $vector[$column] = UserSimilarity::cosineSimilarity($vectorActiveUser, $vectorOtherUser);
            }
        }

        return $vector;
    }

    /**
     * Step 4
     * Dự đoán rating của active user và đưa ra gợi ý
     * Tìm ra các ô bỏ trống của active user để dự đoán
     * Xét xem với item đó, có các user nào đã đánh giá
     * Xét xem trong các user đã đánh giá đó, có k user nào gần giống với active user nhất
     * Lấy giá trị chuẩn hóa đánh giá của k user này để tính toán
     */

    public function getRecommender($userId, $matrix, $normalizedMatrix, $vectorSimilarity)
    {
        $k = 2;
        $listRatingRecommender = [];
        foreach ($matrix as $id => $row) {
            if ($id == $userId) {
                foreach ($row as $itemId => $value) {
                    if ($value == 0) {
                        $rating = $this->getRating($itemId, $matrix, $normalizedMatrix, $vectorSimilarity, $k);
                        $listRatingRecommender[$itemId] = $rating;
                    }
                }
            }
        }
        arsort($listRatingRecommender);
        // dd($listRatingRecommender);
        
        return $listRatingRecommender;
    }


    public function getVectorInNormalizedMatrix($userId, $matrix)
    {
        foreach ($matrix as $key => $array) {
            if ($key == $userId) {
                return $array;
            }
        }

        return null;
    }

    // hàm dự đoán rating của 1 giá trị trong ma trận chuẩn hóa
    public function getRating($itemId, $matrix, $normalizedMatrix, $vectorSimilarity, $k)
    {
        $listRatingForItem = [];
        foreach ($matrix as $id => $row) {
            if ($row[$itemId] != 0) {
                array_push($listRatingForItem, $id);
            }
        }

        $valueSimilarity = [];
        foreach ($listRatingForItem as $userId) {
            $valueSimilarity[$userId] = $vectorSimilarity[$userId];
        }
        arsort($valueSimilarity);

        $count = 1;
        $tuSo = $mauSo = 0;
        foreach ($valueSimilarity as $key => $value) {
            if ($count <= $k) {
                $tuSo  += $vectorSimilarity[$key] * $normalizedMatrix[$key][$itemId];
                $mauSo += abs($vectorSimilarity[$key]);
                $count++;
            } else {
                break;
            }
        }

        if ($mauSo == 0) {
            return null;
        }

        return $tuSo / $mauSo;
    }
}
