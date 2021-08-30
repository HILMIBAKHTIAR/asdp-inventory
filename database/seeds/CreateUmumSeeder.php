<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateUmumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userumum = User::create([
            'name' => 'UMUM',
            'email' =>'umumasdp@gmail.com',
            'password' =>bcrypt('223344'),
        ]);

        $role = Role::create(['name'=>'umum']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $userumum->assignRole([$role->id]);
    }
}
