<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id' => 1,
                'email' => 'n75hasanpur@gmail.com',
                'password' => '$2y$10$uq4QyNqhjD1ALQkv/4d35.dYGEGeBMkq.DMW86rYeCKkQoiUtFwPW',
            ],
        ];

        foreach ($users as $key => $user) {
            User::factory()->create([
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
            ]);
        }
    }
}
