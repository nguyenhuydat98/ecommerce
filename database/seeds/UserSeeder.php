<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => '$2y$10$fSz9qggDZ2LYzXFzYHLTmOGEUzUmmO5bmBuHaBf7fPX3wppSareEG',
                'role_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Management',
                'email' => 'management@gmail.com',
                'password' => '$2y$10$fSz9qggDZ2LYzXFzYHLTmOGEUzUmmO5bmBuHaBf7fPX3wppSareEG',
                'role_id' => 2,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Admin Product',
                'email' => 'admin.product@gmail.com',
                'password' => '$2y$10$fSz9qggDZ2LYzXFzYHLTmOGEUzUmmO5bmBuHaBf7fPX3wppSareEG',
                'role_id' => 3,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Admin Order',
                'email' => 'admin.order@gmail.com',
                'password' => '$2y$10$fSz9qggDZ2LYzXFzYHLTmOGEUzUmmO5bmBuHaBf7fPX3wppSareEG',
                'role_id' => 4,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],

        ]);
    }
}
