<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Administrator';
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('abc123');
        $user->status = 'enable';
        $user->save();

        $user->assignRole('admin');
    }
}
