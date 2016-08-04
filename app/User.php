<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function books(){
        return $this->hasMany('App\Models\Books\Book','book_user_id','id');
    }

    public function ownsBook($id){

        foreach ($this->books->toArray() as $book){
            if ($book["id"] == $id) {
                return true;
            }
        }

        return false;
    }
}
