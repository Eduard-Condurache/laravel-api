<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description'
    ];

    // Functions

    public static function getUniqueSlug($name) {
        $originalSlug = str()->slug($name);

        $slug = $originalSlug;

        $existingType = Type::where('slug', $slug)->first();

        $counter = 1;

        while($existingType != null) {
            $slug = $originalSlug.'-'.$counter;

            $existingType = Type::where('slug', $slug)->first();

            $counter = $counter + 1;
        }

        return $slug;
    } 

    // Relations

    public function projects() {
        return $this->hasMany(Project::class);
    }
}
