<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductLog extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_logs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_ip', 'field', 'old_value', 'new_value'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
