<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->uuid('id')->primary();
	    $table->uuid('route_id');
	    $table->foreign('route_id')
		  ->references('id')
	          ->on('routes')
	          ->onDelete('cascade');
	    $table->string('method', 8);
	    $table->string('uri');
	    $table->string('url');
	    $table->string('querystring');
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
        Schema::dropIfExists('requests');
    }
}
