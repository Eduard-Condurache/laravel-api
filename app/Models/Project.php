<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'category',
        'type_id'
    ];

    protected $appends = ['full_image_url'];

    // Custom attributes

    public function getFullImageUrlAttribute() {
        
        $fullImageUrl = null;
        
        if($this->image) {
            $fullImageUrl = asset('storage/'.$this->image);
        }

        return $fullImageUrl;
    }

    
    // Functions

    public static function getUniqueSlug($title) {
        $originalSlug = str()->slug($title);

        $slug = $originalSlug;

        $existingProject = Project::where('slug', $slug)->first();

        $counter = 1;

        while($existingProject != null) {
            $slug = $originalSlug.'-'.$counter;

            $existingProject = Project::where('slug', $slug)->first();

            $counter = $counter + 1;
        }

        return $slug;
    } 

    // Relations

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function technologies() {
        return $this->belongsToMany(Technology::class)
                    ->withTimestamps();
    }
}
