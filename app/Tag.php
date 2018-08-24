<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
		'label'
	];
	
	public $timestamps = false;
	
	public static function findOrCreateByLabel($label)
    {
        $tag = self::where('label', $label)->first();
        if ($tag !== null) {
            return $tag;
        }

        $tag = self::create([
			'label' => $label
		]);

        return $tag;
    }
	
	public function scopeBySearch($query, string $terms)
	{
		return $query->where('label', 'like', $terms . '%');
	}
}
