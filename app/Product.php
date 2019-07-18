<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_name', 'price', 'price_offer', 'date_offer'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function logs() {
        return $this->hasMany(ProductLog::class);
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = number_format($value, 2, '.', '');
    }

    public function setPriceOfferAttribute($value)
    {
        $this->attributes['price_offer'] = number_format($value, 2, '.', '');
    }
}
