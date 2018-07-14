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
        'name', 'email', 'password', 'country_num'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	public function roles()
	{
		return $this->belongsToMany(Role::class);
	}

	public function notes()
	{
		return $this->hasMany(Note::class);
	}

	public function assignRole(Role $role)
	{
		return $this->roles()->save($role);
	}

	/**
	 * Determine if any of the user roles contains any of given permissions.
	 */
	public function hasAccess(array $permissions)
	{
		foreach ($this->roles as $role) {
			if ($role->hasAccess($permissions)) {
				return true;
			}
		}
		return false;
	}

	public function hasRole(Role $role)
	{
		return $this->roles->contains($role);
	}
}
