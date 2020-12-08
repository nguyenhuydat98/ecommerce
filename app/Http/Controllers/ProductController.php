<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductInformation;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Order;
use App\Http\Requests\RatingRequest;
use App\Http\Requests\FilterProductRequest;
use Auth;
use DB;
use Alert;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $productInformations = ProductInformation::orderBy('id', 'desc')
            ->with('products.images')
            ->paginate(config('setting.paginate.product'));

        $listMinPrice = [];
        $listMaxPrice = [];
        foreach ($productInformations as $productInformation) {
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
            array_push($listMinPrice, $minPrice);
            array_push($listMaxPrice, $maxPrice);
        }

        return view('user.pages.product', compact('productInformations', 'categories', 'listMinPrice', 'listMaxPrice'));
    }

    public function getProductDetail($id)
    {
        try {
            $productInformation = ProductInformation::findOrFail($id);
            $comments = Comment::where('product_information_id', $productInformation->id)
                ->orderBy('updated_at', 'desc')
                ->get();
            $images = [];
            foreach ($productInformation->products as $product) {
                foreach ($product->images as $image) {
                    array_push($images, $image);
                }
            }
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
            $isOrder = $this->isOrder($id);
            $isComment = $this->isComment($id);

            return view('user.pages.product_detail', compact(
                'productInformation',
                'images',
                'minPrice',
                'maxPrice',
                'comments',
                'isOrder',
                'isComment'
            ));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getQuantityOfProductDetail($id)
    {
        try {
            $product = Product::findOrFail($id);
            $data = [
                'id' => $id,
                'quantity' => $product->quantity,
                'color' => $product->color_id,
                'unit_price' => number_format($product->unit_price) . " đ",
            ];

            return json_encode($data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getByCategory($id)
    {
        $categories = Category::all();
        $productInformations = ProductInformation::orderBy('id', 'desc')
            ->where('category_id', $id)
            ->with('products.images')
            ->paginate(config('setting.paginate.product'));

        $listMinPrice = [];
        $listMaxPrice = [];
        foreach ($productInformations as $productInformation) {
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
            array_push($listMinPrice, $minPrice);
            array_push($listMaxPrice, $maxPrice);
        }

        return view('user.pages.product_by_category', compact('productInformations', 'categories', 'listMinPrice', 'listMaxPrice'));
    }

    public function rating(RatingRequest $request, $id)
    {
        try {
            $productInformation = ProductInformation::findOrFail($id);
            DB::beginTransaction();
            if ($productInformation->rate == null || $productInformation->rate == 0) {
                $rate = $request->rate;
            } else {
                $comments = Comment::where('product_information_id', $id)->get();
                $numberOfRating = count($comments);
                $rate = ($productInformation->rate*$numberOfRating + $request->rate) / ($numberOfRating + 1);
            }
            $productInformation->update([
                'rate' => $rate,
            ]);
            Comment::create([
                'user_id' => Auth::guard('web')->id(),
                'product_information_id' => $id,
                'rate' => $request->rate,
                'content' => $request->comment,
            ]);
            DB::commit();

            return redirect()->back();
        } catch (Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }


    // Xem user đã mua SP này hay chưa
    public function isOrder($productInformationId)
    {
        $orders = Order::where('user_id', Auth::guard('web')->id())
            ->where('status', config('setting.status.approved'))
            ->get();
        foreach ($orders as $order) {
            foreach ($order->products as $product) {
                if ($product->productInformation->id == $productInformationId) {
                    return true;
                }
            }
        }

        return false;
    }

    // Xem user đã đánh giá SP này sau khi mua hàng hay chưa
    public function isComment($productInformationId)
    {
        if ($this->isOrder($productInformationId)) {
            $comment = Comment::where('user_id', Auth::guard('web')->id())
                ->where('product_information_id', $productInformationId)
                ->get();
            if (count($comment) != 0) {
                return true;
            }
        }

        return false;
    }

    // Tìm kiếm sản phẩm
    public function search(Request $request)
    {
        $keyWord = $request->keyword;
        $productInformations = ProductInformation::where('name', 'like', "%" . $request->keyword . "%")
            ->paginate(config('setting.paginate.product'));
        if (count($productInformations) > 0) {
            $categories = Category::all();
            $listMinPrice = [];
            $listMaxPrice = [];
            foreach ($productInformations as $productInformation) {
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
                array_push($listMinPrice, $minPrice);
                array_push($listMaxPrice, $maxPrice);
            }

            return view('user.pages.product_search', compact(
                'categories',
                'productInformations',
                'listMinPrice',
                'listMaxPrice',
                'keyWord'
            ));
        } else {
            alert()->error(trans('user.sweetalert.whoops'), "Không tìm được sản phẩm phù hợp");

            return redirect()->back();
        }
    }

    // Sắp xếp SP tăng dần theo giá bán
    public function sortByPriceAsc()
    {
        $categories = Category::all();
        $products = Product::orderBy('unit_price')->get();
        $listProduct = $products->groupBy('product_information_id');

        $listProductInformation = [];
        foreach ($listProduct as $key => $product) {
            $productInformation = ProductInformation::where('id', $key)->with('products.images')->get();
            array_push($listProductInformation, $productInformation);
        }

        $listMinPrice = [];
        $listMaxPrice = [];
        foreach ($listProductInformation as $productInformation) {
            $minPrice = $productInformation[0]->products->first()->unit_price;
            $maxPrice = $minPrice;
            foreach ($productInformation->first()->products as $product) {
                if ($minPrice > $product->unit_price) {
                    $minPrice = $product->unit_price;
                }
                if ($maxPrice < $product->unit_price) {
                    $maxPrice = $product->unit_price;
                }
            }
            array_push($listMinPrice, $minPrice);
            array_push($listMaxPrice, $maxPrice);
        }

        return view('user.pages.product_sort_by_price', compact(
            'categories',
            'listProductInformation',
            'listMinPrice',
            'listMaxPrice'
        ));
    }

    // Sắp xếp SP giảm dần theo giá bán
    public function sortByPriceDesc()
    {
        $categories = Category::all();
        $products = Product::orderBy('unit_price', 'desc')->get();
        $listProduct = $products->groupBy('product_information_id');

        $listProductInformation = [];
        foreach ($listProduct as $key => $product) {
            $productInformation = ProductInformation::where('id', $key)->with('products.images')->get();
            array_push($listProductInformation, $productInformation);
        }

        $listMinPrice = [];
        $listMaxPrice = [];
        foreach ($listProductInformation as $productInformation) {
            $minPrice = $productInformation[0]->products->first()->unit_price;
            $maxPrice = $minPrice;
            foreach ($productInformation->first()->products as $product) {
                if ($minPrice > $product->unit_price) {
                    $minPrice = $product->unit_price;
                }
                if ($maxPrice < $product->unit_price) {
                    $maxPrice = $product->unit_price;
                }
            }
            array_push($listMinPrice, $minPrice);
            array_push($listMaxPrice, $maxPrice);
        }

        return view('user.pages.product_sort_by_price', compact(
            'categories',
            'listProductInformation',
            'listMinPrice',
            'listMaxPrice'
        ));
    }

    // Lọc SP theo giá bán
    public function filterByPrice(FilterProductRequest $request)
    {
        $from = (int) $request->from_price;
        $to = (int) $request->to_price;
        if ($from > $to) {
            alert()->error(trans('user.sweetalert.whoops'), "Không tìm được sản phẩm phù hợp");

            return redirect()->back();
        }
        $products = Product::where([
            ['unit_price', '>=', $from],
            ['unit_price', '<=', $to],
        ])->get();

        if (count($products) == 0) {
            alert()->error(trans('user.sweetalert.whoops'), "Không tìm được sản phẩm phù hợp");

            return redirect()->back();
        }
        $listProducts = $products->groupBy('product_information_id');

        $categories = Category::all();
        $listProductInformation = [];
        foreach ($listProducts as $key => $product) {
            $productInformation = ProductInformation::where('id', $key)->with('products.images')->get();
            array_push($listProductInformation, $productInformation);
        }

        $listMinPrice = [];
        $listMaxPrice = [];
        foreach ($listProductInformation as $productInformation) {
            $minPrice = $productInformation[0]->products->first()->unit_price;
            $maxPrice = $minPrice;
            foreach ($productInformation->first()->products as $product) {
                if ($minPrice > $product->unit_price) {
                    $minPrice = $product->unit_price;
                }
                if ($maxPrice < $product->unit_price) {
                    $maxPrice = $product->unit_price;
                }
            }
            array_push($listMinPrice, $minPrice);
            array_push($listMaxPrice, $maxPrice);
        }

        return view('user.pages.product_filter_by_price', compact(
            'categories',
            'listProductInformation',
            'listMinPrice',
            'listMaxPrice',
            'from',
            'to'
        ));
    }
}
