<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanker extends Model {

    protected $table = "tankers";

    protected $fillable = [
        'name',
        'number',
        'chambers',
        'capacity',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function stock()
    {
        return $this->hasOne('App\Stock');
    }

}
