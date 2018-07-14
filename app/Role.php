<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
		'label'
	];
	
	public $timestamps = false;

	public function permissions()
	{
		return $this->belongsToMany(Permission::class);
	}

	public function givePermission(Permission $permission)
	{
		return $this->permissions()->save($permission);
	}

	/**
	 * Determines if the role contains any of given permissions.
	 */
	public function hasAccess(array $permissions)
    {
        foreach ($permissions as $permission) {
            if ($this->hasPermission($permission)) {
                return true;
			}
        }
        return false;
    }
	/**
	 * Check if the role has the given permission.
	 * @param $permission 	string|Permission The permission
	 */
	public function hasPermission($permission)
    {
		if (is_string($permission)) {
            return $this->permissions->contains('name', $permission);
        }
		return $this->permissions->contains($permission);
    }
}
