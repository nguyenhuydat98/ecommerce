<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Smartphone',
                'parent_id' => null,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Iphone',
                'parent_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Samsung',
                'parent_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Oppo',
                'parent_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
        ]);
    }
}
