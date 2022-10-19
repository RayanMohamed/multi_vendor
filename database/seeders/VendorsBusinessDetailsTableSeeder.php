<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBusinessDetail;

class VendorsBusinessDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecords = [
        	['id'=>2,'vendor_id'=>20,'shop_name'=>'Amish Electronics','shop_address'=>'AE1234', 'shop_mobile'=>'011234532','shop_email'=>'amish@gmail.com'],
        ];
        VendorsBusinessDetail::insert($vendorRecords);

    }
}
