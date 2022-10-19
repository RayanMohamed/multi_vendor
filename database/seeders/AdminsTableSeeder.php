<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $adminRecords = [
        	['id'=>2,'name'=>'John', 'type'=>'vendor','vendor_id'=>1, 'email'=>'john@admin.com','password'=>'$2y$10$SBbQHHJqpUIFrGCdxdP80OoRU726sLBVuIeL32Dcy4TWM.P0eUHge'],
        ];
        Admin::insert($adminRecords);
    }
}
