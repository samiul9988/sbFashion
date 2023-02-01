<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['name','email','phone','amount','address','status','trancsation_id,','currency','created_at','updated_at'];
}
