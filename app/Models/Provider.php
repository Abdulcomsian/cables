<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Product;

class Provider extends Model
{
    use HasFactory;

    public static function booted()
    {
        static::creating(function($model){
            if(!$model->uuid)
            {
                $model->uuid = Str::uuid();
            }
        });
    }

    public function product()
    {
        return $this->hasMany(Product::class , 'provider_id' , 'id');
    }

    
}
