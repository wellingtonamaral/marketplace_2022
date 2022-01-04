<?php

namespace Database\Seeders;

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
        // \DB::table('users')->insert(
        //     [
        //         'name' => 'Administrator',
        //         'email' => 'admin@admin.com',
        //         'email_verified_at' => now(),
        //         'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //         'remember_token' =>'123456',
        // ]
        //     );

        //\App\Models\User::factory(10)->create()->each(function($user){
        //      $user->store()->save(\App\Models\Store::factory(10));
        // });

        //    \App\Models\User::factory(1)
        //         ->count(2)
        //         ->has(\App\Models\Store::factory()->count(2))
        //         ->create();

        \App\Models\User::factory(10)->create()->each(function($user){

            $user->store()->save(\App\Models\Store::factory()->make());

        });
    }
}
