<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    
        Schema::table('posts', function (Blueprint $table) {
		$table->text('body');
		$table->foreignIdFor(\App\Models\User::class);
		$table->string('title' , 100);
		
	});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::table('posts' , function (Blueprint $table){
		    $table->dropColumn(['body' , 'title']);
		    $table->dropForeign(['user_id']);
	    });
    }
}
