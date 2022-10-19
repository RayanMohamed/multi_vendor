<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;

class Admin extends  Authenticable
{
    use HasFactory;
    protected $guard = 'admin';

    public function vendorPersonal(){
    	return $this->belongsTo('App\Models\Vendors','vendor_id');
    }

    public function vendorsBusiness(){
    	return $this->belongsTo('App\Models\VendorsBusinessDetail','vendor_id');
    }
}
