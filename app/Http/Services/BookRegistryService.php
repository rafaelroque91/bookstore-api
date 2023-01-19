<?php
namespace App\Http\Services;

use App\Http\Repositories\BookRegistryRepository;
use App\Models\BookRegistry;
use App\Models\BookStore;
use Exception;

class BookRegistryService {

    public function new(BookStore $store, array $bookData) : array {
        try {           
            $newUser = BookRegistryRepository::create($store, $bookData);
            if ($newUser){
                return ["success" => true, "data" => $newUser,"message" => "Book registred Successfully"];     
            }     
            return ["success" => false, "message" => "Unable to register book."];              
           
        } catch (Exception $e) {    
            return ["success" => false, "message" => "Error when trying to register book." . $e->getMessage()];      
        }         
    }       

    public function update(BookRegistry $registry, array $bookData) : array {
        try {           
            $newUser = BookRegistryRepository::update($registry, $bookData);
            if ($newUser){
                return ["success" => true, "data" => $registry,"message" => "Book updated Successfully"];     
            }     
            return ["success" => false, "message" => "Unable to update book."];              
           
        } catch (Exception $e) {        
            return ["success" => false, "message" => "Error when trying to update book." . $e->getMessage()];      
        }         
    }       

    public function get(BookRegistry $registry) : array {
        try {                      
            return ["success" => true, "data" => $registry,"message" => "Get Book Successfully"];                             
           
        } catch (Exception $e) {    
            return ["success" => false, "message" => "Error when trying to get book." . $e->getMessage()];      
        }         
    }   

    public function delete(BookRegistry $registry) : array {
        try {           
            $newUser = BookRegistryRepository::delete($registry);
            if ($newUser){
                return ["success" => true, "message" => "Book deleted Successfully"];     
            }     
            return ["success" => false, "message" => "Unable to delete book."];              
           
        } catch (Exception $e) {        
            return ["success" => false, "message" => "Error when trying to delete book." . $e->getMessage()];      
        }         
    }      
}
