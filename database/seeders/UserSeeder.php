<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (count(User::all()) > 0) {
            return; //
        }
        // Default User
        User::insert(
            [
                [
                    'id' => 1,
                    'username' => 'Jet Supper Admin',
                    'phone' => '011999999',
                    'email' => 'jetsupperadmin@gmail.com',
                    'email_verified_at' => now(),
                    'password' => '$2y$10$gPSdfoS8U7T11x/22Wr/hePM4R2k4jfRJQNuDXHmOdD7q04arp.1K',
                    'remember_token' => Str::random(10),
                    'role' => config('cnst.user.role.super_admin'),
                    'status' => config('cnst.user.status.active'),
                ],
                [
                    'id' => 2,
                    'username' => '012888999',
                    'phone' => '012888999',
                    'email' => 'bopha@gmail.com',
                    'email_verified_at' => now(),
                    'password' => '$2y$10$gPSdfoS8U7T11x/22Wr/hePM4R2k4jfRJQNuDXHmOdD7q04arp.1K', // password
                    'remember_token' => Str::random(10),
                    'role' => config('cnst.user.role.agency'),
                    'status' => config('cnst.user.status.active'),
                ],
                [
                    'id' => 3,
                    'username' => '016888999',
                    'phone' => '016888999',
                    'email' => 'sok@gmail.com',
                    'email_verified_at' => now(),
                    'password' => '$2y$10$gPSdfoS8U7T11x/22Wr/hePM4R2k4jfRJQNuDXHmOdD7q04arp.1K', // password
                    'remember_token' => Str::random(10),
                    'role' => config('cnst.user.role.agency'),
                    'status' => config('cnst.user.status.active'),
                ],
                [
                    'id' => 4,
                    'username' => '0962202350',
                    'phone' => '0962202350',
                    'email' => 'chreounsary@gmail.com',
                    'email_verified_at' => now(),
                    'password' => '$2y$10$gPSdfoS8U7T11x/22Wr/hePM4R2k4jfRJQNuDXHmOdD7q04arp.1K', // password
                    'remember_token' => Str::random(10),
                    'role' => config('cnst.user.role.agency'),
                    'status' => config('cnst.user.status.active'),
                ]
            ]
        );
    }
}
