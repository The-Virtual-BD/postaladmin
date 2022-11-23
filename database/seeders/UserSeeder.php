<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Profile;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'firstname' => 'Mehedi',
            'lastname' => 'Hasan',
            'phone' => '+880 1674668544',
            'nib' => '1674668544',
            'email' => 'mehedi@app.com',
            'suite' => date('mds'),
            'username' => 'admin',
            'password' => Hash::make('mehedi123'),
        ]);


        $profile = Profile::create([
            'user_id' => $user->id,
        ]);

        $role = Role::create(['name' => 'admin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}