<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $table = "products";

    protected $fillable = [
        'name',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function stock()
    {
       return $this->hasOne('App\Stock');
    }

    public function customer()
    {
        return $this->hasOne('App\Customer');
    }
}
