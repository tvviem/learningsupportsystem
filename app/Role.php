<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /* protected $fillable = [
        'role_name', 'role_description'
    ]; */

    // black list 
    protected $guarded = ['*'];
    public function users() {
        return $this->belongsToMany('App\User', 'role_users', 'role_id', 'user_id');
    }
}