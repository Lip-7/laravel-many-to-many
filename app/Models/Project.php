<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'gitUrl', 'description', 'framework_id', 'tecnologies', 'slug'];

    public function framework() {
        return $this->belongsTo(Framework::class);
    }
}
