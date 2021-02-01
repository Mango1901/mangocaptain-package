<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class packageSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
      
     
        User::insert([
           [
             "name"=>"Nguyễn Thị Huyền",
             "email"=>"hieu.tuhai2001@gmail.com",
             "password"=>bcrypt("huyenbon"),
               "created_at"=>date("Y-m-d H:i:s"),
               "updated_at"=>date("Y-m-d H:i:s")
           ],
            [
                "name"=>"Từ Hải Hiếu",
                "email"=>"huyenbon99@gmail.com",
                "password"=>bcrypt("huyenbon"),
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s")
            ],
            [
                "name"=>"Jkai",
                "email"=>"deagleka1@gmail.com",
                "password"=>bcrypt("huyenbon"),
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s")
            ]
        ]);
    }
}
