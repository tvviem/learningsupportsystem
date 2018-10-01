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
        'id', 'slug', 'name'
    ]; */

    // black list 
    // protected $guarded = ['*'];
    /* public function users() {
        return $this->belongsToMany('App\User', 'role_users', 'role_id', 'user_id');
    } */
    public function permissions() {
        return $this->belongsToMany(Permission::class, 'roles_permissions');
    }
}
