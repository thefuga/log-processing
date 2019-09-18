<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responses', function (Blueprint $table) {
            $table->uuid('id')->primary();
	    $table->uuid('request_id');
	    $table->foreign('request_id')
		  ->references('id')
	          ->on('requests')
	          ->onDelete('cascade');
	    $table->string('status', 3);
	    $table->unsignedTinyInteger('size');
	    $table->jsonb('headers');
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
        Schema::dropIfExists('responses');
    }
}
