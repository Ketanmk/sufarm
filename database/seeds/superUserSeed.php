<?php

use Illuminate\Database\Seeder;

class superUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::find(1);
        if (!$user) {
            \App\User::create([
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('123456'),
                'type' => \App\Utilities\Constants::USERTYPES['SuperAdmin'],
                'status'=>1
            ]);
        }
    }
}
