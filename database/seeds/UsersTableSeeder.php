<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['username'=>'Ahmad','email'=>'ahmad@mail.com','address'=>'jl pramuka','phone'=>'085212325698','status'=>'ACTIVE','avatar'=>'','password'=>Hash::make("123456")],
            ['username'=>'redha','email'=>'redha@mail.com','address'=>'jl siloam','phone'=>'0812563254','status'=>'ACTIVE','avatar'=>'','password'=>Hash::make("123456")],
            ['username'=>'ita','email'=>'ita@mail.com','address'=>'jl perjuangan','phone'=>'0823658974','status'=>'ACTIVE','avatar'=>'','password'=>Hash::make("123456")],
            ['username'=>'rofi','email'=>'rofi@mail.com','address'=>'jl tenggarong','phone'=>'085214478547','status'=>'ACTIVE','avatar'=>'','password'=>Hash::make("123456")],
            ['username'=>'mega','email'=>'mega@mail.com','address'=>'jl pelita','phone'=>'084114522365','status'=>'ACTIVE','avatar'=>'','password'=>Hash::make("12345")],   
        ]);
    }
}
