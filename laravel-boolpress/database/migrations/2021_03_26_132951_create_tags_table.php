<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained();
            $table->foreignId('post_id')->constrained();

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
        Schema::dropIfExists('tags');
        Schema::table('tags', function (Blueprint $table) {
            $table->dropForeign('posts_user_id_foreign');// questo cancella la relazione
            $table->dropForeign('users_user_id_foreign');// questo cancella la relazione
            $table->dropcolumn('post_id'); // questo cancella la colonna
            $table->dropcolumn('user_id'); // questo cancella la colonna
        });
    }
}
