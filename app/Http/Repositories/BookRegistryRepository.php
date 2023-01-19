<?php
namespace App\Http\Repositories;

use App\Models\BookRegistry;
use App\Models\BookStore;

class BookRegistryRepository {

    public static function create(BookStore $store, array $registryData) : ? BookRegistry {         
        return $store->bookRegistries()->create($registryData);        
    }

    public static function update(BookRegistry $book,array $data) : ? bool {
        return $book->update($data);
    }

    public static function delete(BookRegistry $book) : ? bool {
        return $book->delete();            
    }  
}
