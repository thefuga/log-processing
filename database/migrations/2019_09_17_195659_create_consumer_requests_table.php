<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumerRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumer_requests', function (Blueprint $table) {
            $table->uuid('id')->primary();
	    $table->uuid('consumer_id');
	    $table->foreign('consumer_id')
		  ->references('id')
		  ->on('consumers')
		  ->ondelete('cascade');
	    $table->uuid('request_id');
	    $table->foreign('request_id')
		  ->references('id')
		  ->on('requests')
		  ->ondelete('cascade');
	    $table->string('started_at');
	    $table->string('upstream_uri');
	    $table->json('latencies');
	    $table->ipAddress('client_ip');
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
        Schema::dropIfExists('consumer_solicitations');
    }
}
