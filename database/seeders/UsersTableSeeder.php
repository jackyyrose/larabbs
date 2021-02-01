<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserRole;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory()->times(5)->make();
        User::insert($users->makeVisible(['password', 'remember_token'])->toArray());
        for ($i=0; $i<count($users); $i++){
            $user = User::find($i + 1);
            $role = new UserRole([
                'role' => 1,
                'company_name' => $user['name'],
                'street' => 'xx yy',
                'city' => 'auckland',
                'country' => 'new zealand',
                'zip' => '0100']);
            $user->role()->save($role);
        }

    }
}
