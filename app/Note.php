<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
	protected $fillable = [
		'title', 'slug', 'user_id', 'published', 'content'
	];
	
	protected $dates = ['created_at', 'updated_at', 'deleted_at'];
	
	/**
	 * @override
	 * @param array $attributes
	 * @return \App\Note
	 */
	public static function create(array $attributes = [])
	{
		$attributes['slug'] = str_slug($attributes['title']);
		
		$model = static::query()->create($attributes);
		return $model;
	}

	public function scopePublished($query)
	{
		return $query->where('published', 1);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
	
	public function tags()
	{
		return $this->belongsToMany(Tag::class);
	}
	
	public function syncTags(array $givenTags)
    {
        $tags = collect($givenTags)->map(function ($givenTag) {
            $tag = Tag::findOrCreateByLabel($givenTag);

            return $tag;
        });

        $this->tags()->sync($tags->pluck('id')->toArray());
    }
	
	public function syncTagsFromUserInput(string $text)
	{
		$arrayTags = (bool)$text ? explode(', ', $request->tags) : [];
		$this->syncTags($givenTags);
	}

	public function getTagsAsCommaSeparatedAttribute()
	{
		$relatedTags = $this->tags()->pluck('label')->toArray();
		if ($relatedTags === NULL) {
			return NULL;
		}
		
		return implode(', ', $relatedTags);
	}
}
