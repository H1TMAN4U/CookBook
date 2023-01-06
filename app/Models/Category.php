<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'id';
    public $incrementing = true;
    use HasFactory;

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
