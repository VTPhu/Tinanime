<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class Userseeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            
        'email'=>'thanhphu1@gmail.com',
        'password'=>bcrypt('123456'),
        'role'=>1,
        'status'=>1,
        'created_at'=> new \DateTime(),
        ];
        DB::table('users')->insert($data);
    }
}
