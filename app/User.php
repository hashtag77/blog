<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    public $primarykey='id';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * For Posts
     */
    public function posts(){
        return $this->hasMany('App\Post');
    }

    /**
     * For Albums
     */
    public function albums(){
        return $this->hasMany('App\Album');
    }

    /**
     * For Roles
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) || 
                abort(401, 'This action is unauthorized.');
        }
        return $this->hasRole($roles) || 
        abort(401, 'This action is unauthorized.');
    }
 
    /**
    * Check multiple roles
    * @param array $roles
    */
    
    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('id', $roles)->first();
    }
    
    /**
    * Check one role
    * @param string $role
    */
    
    public function hasRole($role)
    {
        return null !== $this->roles()->where('id', $role)->first();
    }

    /**
    * Check for Admin
    * @param string $role
    */
    public function isAdmin()
    {
        foreach ($this->roles()->get() as $role){
            if ($role->id == 2){
                return true;
            }
        }
        return false;
    }
}
