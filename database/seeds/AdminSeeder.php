<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'name' => 'Management',
                'email' => 'management@gmail.com',
                'password' => '$2y$10$fSz9qggDZ2LYzXFzYHLTmOGEUzUmmO5bmBuHaBf7fPX3wppSareEG',
                'address' => 'Vietnam',
                'phone' => '0989999999',
                'avatar' => config('setting.default.avatar'),
                'role_id' => config('setting.role.management'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Admin Product',
                'email' => 'admin.product@gmail.com',
                'password' => '$2y$10$fSz9qggDZ2LYzXFzYHLTmOGEUzUmmO5bmBuHaBf7fPX3wppSareEG',
                'address' => 'Vietnam',
                'phone' => '0987654321',
                'avatar' => config('setting.default.avatar'),
                'role_id' => config('setting.role.admin_product'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Admin Order',
                'email' => 'admin.order@gmail.com',
                'password' => '$2y$10$fSz9qggDZ2LYzXFzYHLTmOGEUzUmmO5bmBuHaBf7fPX3wppSareEG',
                'address' => 'Vietnam',
                'phone' => '0123456789',
                'avatar' => config('setting.default.avatar'),
                'role_id' => config('setting.role.admin_order'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
        ]);
    }
}
