<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookStore extends Model
{
    use HasFactory;

    public function bookRegistries() {
        return $this->hasMany(BookRegistry::class);
    }

    protected $fillable = [
        'name'
    ];
}
