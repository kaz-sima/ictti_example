<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = ['id'];
    protected $fillable=['book_title', 'Author', 'publisher', 'published', 'lendingstatus', 'ctgry_id', 'subctgry_id'];
    
    public function ctgry()
    {
        return $this->belongsTo('App\Ctgry');
    }
    public function getCtgryData()
    {
        return $this->ctgry->name;
    }
    public function subctgry()
    {
        return $this->belongsTo('App\Subctgry');
    }
    public function getSubctgryData()
    {
        return $this->subctgry['name'];
    }
    public function resevations()
    {
        return $this->hasMany('App\Reservation');
    }
    public function loans()
    {
        return $this->hasMany('App\Loan');
    }    
}
