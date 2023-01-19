<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookRegistry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',        
        'isbn',
        'value'
    ];

    public function bookStore() {
        return $this->belongsTo(bookStore::class);
    }
}
