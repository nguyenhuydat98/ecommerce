<?php

namespace App;

use App\Models\User;
use App\Models\Comment;

class Similarity
{
    /**
     * Tính giá trị trung bình đánh giá của 1 user
     * Sử dụng trong quá trình chuẩn hóa dữ liệu
     */
    public static function averageRating(User $user)
    {
        $comments = $user->comments;
        $countComment = count($comments);
        if ($countComment > 0) {
            $sum = 0;
            foreach ($comments as $comment) {
                $sum += $comment->rate;
            }

            return $sum / $countComment;
        }

        return null;
    }
}
