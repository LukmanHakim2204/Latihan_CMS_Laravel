<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;
    public $table = 'manager';

    public $fillable = [
        'nip',
        'name',
        'email',
    ];
    public function projects()
    {
        return $this->hasMany(Project::class, 'manager_id');
    }
}
