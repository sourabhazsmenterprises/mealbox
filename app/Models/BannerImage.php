<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BannerImage extends Model
{
    use SoftDeletes;
    protected $table = 'banner_image';
    protected $guarded = ['id'];
}