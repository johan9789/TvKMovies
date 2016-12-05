<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterQualityAndAddTrailerToMoviesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::table('movies', function(Blueprint $table){
            $table->string('quality', 20)->change();
            $table->string('trailer_url')->nullable();
            $table->string('big_cover')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::table('movies', function(Blueprint $table){
            $table->string('quality', 10)->change();
            $table->dropColumn('trailer_url');
            $table->dropColumn('big_cover');
        });
    }

}