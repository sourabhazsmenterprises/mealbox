<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeliveryPincode extends Model
{
    use SoftDeletes;
    protected $table = 'pincode_offer';
    protected $guarded = ['id'];
}