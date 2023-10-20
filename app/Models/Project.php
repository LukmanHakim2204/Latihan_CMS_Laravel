<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public $table = 'project';

    public $fillable = [
        'id',
        'manager_id',
        'name_project',
        'category_id',
        'description',
        'status',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImageUrl()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        return null;
    }

    public function manager()
    {
        return $this->belongsTo(Manager::class, 'manager_id');
    }

    public function getSlugUrl()
    {
        return route('project.show', $this->slug);
    }
}
