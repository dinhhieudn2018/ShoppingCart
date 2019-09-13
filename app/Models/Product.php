<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = [
    	'name', 'slug', 'description', 'quantity', 'price', 'promotion', 'idCategory', 'image','sales','configuration', 'idProductType', 'status',
    ];

    public function productType(){
    	return $this->belongsTo('App\Models\ProductTypes','idProductType','id');
    }
    public function categories(){
    	return $this->belongsTo('App\Models\Categories','idCategory','id');
    }
    public function orders(){
        return $this->belongsToMany('App\Models\Order','orderdetail','idProduct','idOrder')->withPivot('quantity');
    }
}
