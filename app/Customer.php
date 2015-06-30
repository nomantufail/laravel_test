<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {

    protected $table = "customers";
    protected $fillable = [
        'name',
        'phone',
        'address',
    ];


    public function product()
    {
        return $this->belongsTo('App\Product');
    }


    public function getFillables()
    {
        return $this->fillable;
    }

    public function getViewables()
    {
        return array(
            'id',
            'name',
            'phone',
            'address',
            'insertedAt',
        );
    }

    public function getFormattedHeaders()
    {
        return array(
            'id'=>'ID',
            'name'=>'Name',
            'phone'=>'Phone',
        );
    }

    public function get_addable_properties()
    {
        return array();
    }

    public function get_money_properties()
    {
        return array();
    }

    /**
     * @return mixed
     */
    public function getAddress_VIEW()
    {
        return $this->address;
    }

    /**
     * @return mixed
     */
    public function getId_VIEW()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName_VIEW()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPhone_VIEW()
    {
        return $this->phone;
    }

    /**
     * @return mixed
     */
    public function getInsertedAt_VIEW()
    {
        return $this->created_at;
    }


}
