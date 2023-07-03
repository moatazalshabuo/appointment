<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin =ModelsRole::create(['name'=>"مسؤول النظام"]);
        ModelsRole::create(['name'=>"مدير "]);
        ModelsRole::create(['name'=>"مستخدم"]);

        $user = User::create([
            'id'=>1,
            "name"=>"admin",
            "phone"=>"000000000000",
            "password"=>Hash::make(12345678),
            "email"=>"admin@admin.com"
        ]);
        $user->assignRole([$admin->id]);
    }
}
