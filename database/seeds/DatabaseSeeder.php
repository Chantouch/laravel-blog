<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Token;
use App\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Roles
        Role::firstOrCreate(['name' => Role::ROLE_EDITOR]);
        $role_admin = Role::firstOrCreate(['name' => Role::ROLE_ADMIN]);

        // Users
        if (! User::where('email', 'chantouch@bookingkh.com')->exists()) {
            $user = User::create([
                'name' => 'Chantouch',
                'email' => 'chantouch@bookingkh.com',
                'password' => '123456'
            ]);

            $user->roles()->attach($role_admin->id);
        }

        // API tokens
        User::where('api_token', null)->get()->each->update([
            'api_token' => Token::generate()
        ]);
    }
}
