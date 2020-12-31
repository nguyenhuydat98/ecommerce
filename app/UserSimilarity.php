<?php

namespace App;

use App\Models\User;
use App\Models\ProductInformation;
use App\Models\Comment;

class UserSimilarity
{
    /**
     * Hàm similarity, được dùng sau khi chuẩn hóa dữ liệu
     * 2 vector có cùng độ dài
     */
    public static function cosineSimilarity(array $arrayX, array $arrayY)
    {
        $tuSo = 0;
        $sumX = $sumY = 0;
        $keys = array_keys($arrayX);
        foreach ($keys as $key) {
            if ($arrayX[$key] != 0 && $arrayY[$key] != 0) {
                $tuSo += $arrayX[$key] * $arrayY[$key];
                $sumX += pow($arrayX[$key], 2);
                $sumY += pow($arrayY[$key], 2);
            }
        }
        if ($tuSo == 0) {
            return 0;
        }

        return $tuSo / (sqrt($sumX) * sqrt($sumY));
    }
}
