<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->uuid('id')->primary();
	    $table->uuid('service_id');
	    $table->foreign('service_id')
		  ->references('id')
		  ->on('services')
		  ->onDelete('cascade');
	    $table->string('hosts');
	    $table->string('methods');
	    $table->string('paths');
	    $table->string('protocols');
	    $table->boolean('preserve_host');
	    $table->boolean('strip_path');
	    $table->unsignedTinyInteger('regex_priority');
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
        Schema::dropIfExists('routes');
    }
}
