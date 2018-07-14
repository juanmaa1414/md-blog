<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
	protected $fillable = [
		'title', 'slug', 'user_id', 'published', 'upvotes', 'content'
	];
	
	protected $dates = ['created_at', 'updated_at', 'deleted_at'];

	public function scopePublished($query)
	{
		return $query->where('published', 1);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
