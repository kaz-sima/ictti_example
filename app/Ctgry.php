<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Ctgry extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
        'code' => 'required',
        'name' => 'required',
    );
    public function getData()
    {
        return $this->id . ':' . $this->name . '(' . $this->code . ')';
    }
    public function subctgries()
    {
        return $this->hasMany('App\Subctgry', 'ctgry_code', 'code');
    }
}
