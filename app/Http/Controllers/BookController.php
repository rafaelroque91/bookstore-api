<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Services\BookRegistryService;
use App\Models\BookRegistry;
use App\Models\BookStore;

class BookController extends BaseController
{
    public $bookRegistryService;

    protected $redirectTo = false;

    public function __construct()
    {
        $this->bookRegistryService = new BookRegistryService();
    }

    public function newBook(BookStore $book_store, NewBookRequest $request){       
        $validatedRequest = $request->validated();

        $newBook = $this->bookRegistryService->new($book_store,$validatedRequest);

        return $this->responseData($newBook);           
    } 

    public function updateBook(BookRegistry $book_registry, UpdateBookRequest $request){       
        $validatedRequest = $request->validated();
      
        $updateBook = $this->bookRegistryService->update($book_registry,$validatedRequest);

        return $this->responseData($updateBook);           
    } 

    public function getBook(BookRegistry $book_registry){

        $getBook = $this->bookRegistryService->get($book_registry);
        return $this->responseData($getBook); 
    }

    public function deleteBook(BookRegistry $book_registry){

        $getBook = $this->bookRegistryService->delete($book_registry);
        return $this->responseData($getBook); 
    }  
}
