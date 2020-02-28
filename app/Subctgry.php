<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subctgry extends Model
{
    protected $guarded = array('id');
    protected $fillable = ['ctgry_code','code','name'];
    
    public static $rules = array(
        'ctgry_code' => 'required',
        'code' => 'required',
        'name' => 'required'
    );
    
    public function ctgry()
    {
        return $this->belongsTo('App\Ctgry', 'ctgry_code', 'code');
    }
    
    public function getData()
    {
        return $this->id . ':' . $this->name . '(' . $this->code . ')';
    }
    
    // This methd is for the function of the select lists
    public static function get_subctgry()
    {
        $all_subctgry = Subctgry::orderBy('id','asc')->get();
        $ret_subctgry = array(',' => "subctgry");
        foreach($all_subctgry as $subctgry){
            $ret_subctgry += [$subctgry->code .','. $subctgry->ctgry_code => $subctgry->name];
        }
        return $ret_subctgry;
    }
}
