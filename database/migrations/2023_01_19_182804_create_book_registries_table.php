<?php

use App\Models\BookStore;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookRegistriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_registries', function (Blueprint $table) {
            $table->id();
            $table->text('name',100);
            $table->text('isbn',13);
            $table->float('value',10,2);            
            $table->foreignIdFor(BookStore::class)->constrained();                        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_registries');
    }
}
