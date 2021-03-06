<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            
            // PRIMO METODO
            // $table->unsignedBigInteger('user_id');
            
            $table->foreignId('user_id')->constrained();


            // SECONDO METODO

            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')
            //     ->references('id')
            //     ->on('users');
            // $table->foreignId('user_id')->constrained();



            
            $table->string('title', 100);
            $table->text('content');
            $table->string('slug')->unique();
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
        Schema::dropIfExists('posts');
        // Schema::table('posts', function (Blueprint $table) {
        //     $table->dropForeign('posts_user_id_foreign');// questo cancella la relazione
        //     $table->dropcolumn('user_id'); // questo cancella la colonna
        // });
    }
}
