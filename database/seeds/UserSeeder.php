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
                'avatar' => config('setting.default.avatar'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
        ]);
    }
}
