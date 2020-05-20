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
            'name' =>'Admin',
            'email' => 'admin@gmail.com',
            'role' => 1,
            'is_active' => true,
            'password' => bcrypt('123456'),
        ];

        User::create($admin);
    }
}
