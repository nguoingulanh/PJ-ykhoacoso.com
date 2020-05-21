<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $admin = [
            [
            'name' =>'Admin',
            'email' => 'admin@gmail.com',
            'role' => 1,
            'is_active' => true,
            'password' => bcrypt('P@ssword!123'),
            ],
            [
                'name' =>'Người ngu lanh',
                'email' => 'nguoingulanh@gmail.com',
                'role' => 1,
                'is_active' => true,
                'password' => bcrypt('Lanh0382928982'),
            ]
        ];

        User::insert($admin);
    }
}
