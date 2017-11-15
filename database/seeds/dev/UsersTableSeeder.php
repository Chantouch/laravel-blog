<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Token;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Roles
        $role_editor = Role::firstOrCreate(['name' => Role::ROLE_EDITOR]);
        $role_admin = Role::firstOrCreate(['name' => Role::ROLE_ADMIN]);

        // User Admin
        if (!User::where('email', 'chantouch@bookingkh.com')->exists()) {
            $user = User::create([
                'name' => 'Chantouch',
                'email' => 'chantouch@bookingkh.com',
                'password' => '123456',
                'username' => 'chantouch'
            ]);

            $user->roles()->attach($role_admin->id);
        }
        // User Editor
        if (!User::where('email', 'editor@bookingkh.com')->exists()) {
            $user = User::create([
                'name' => 'Editor',
                'email' => 'editor@bookingkh.com',
                'password' => '123456',
                'username' => 'editor'
            ]);
            $user->roles()->attach($role_editor->id);
        }

        // API tokens
        User::where('api_token', null)->get()->each->update([
            'api_token' => Token::generate()
        ]);
    }
}
