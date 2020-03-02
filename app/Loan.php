<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    // attributes that are mass assignable.
    protected $guarded = array('id');
    protected $fillable = [
        'registerdate', 'returndate','duedate','status','User_id','book_id',];
    // implementation of relationship with User model
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    // implementation of relationship with Book model
    public function book()
    {
        return $this->belongsTo('App\Book');
    }
    // deriving data from User
    public function getUserName()
    {
        return $this->user->name;
    }
    // deriving data from Book
    public function getBookTitle()
    {
        return $this->book->book_title;
    }
    // scope
    public function scopeUserHistory($query, $user_id){
        return $query->where('user_id', $user_id);
    }
}

