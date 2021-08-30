<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateSdmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersdm = User::create([
            'name' => 'SDM',
            'email' =>'sdmasdp@gmail.com',
            'password' =>bcrypt('112233'),
        ]);

        $role = Role::create(['name'=>'sdm']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $usersdm->assignRole([$role->id]);
    }
}
