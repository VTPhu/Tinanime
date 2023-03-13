<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class Userroleadmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        'name'=>'admin1',
        'email'=>'adminphu@gmail.com',
        'password'=>bcrypt('00000000'),
        'role'=>0,
        'status'=>1,
        'created_at'=> new \DateTime(),
        ];
        DB::table('users')->insert($data);
    }
}
