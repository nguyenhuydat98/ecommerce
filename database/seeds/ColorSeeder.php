<?php

use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->insert([
            [
                'name' => 'Đen',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Trắng',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Gold',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Xanh',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Đỏ',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Hồng',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
        ]);
    }
}
