<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->longText('query')->nullable();
            $table->string('source')->nullable();
            $table->string('destination')->nullable();
            $table->integer('adults')->nullable();
            $table->integer('children')->nullable();
            $table->integer('infants')->nullable();
            $table->string('carrier')->nullable();
            $table->integer('cabin')->nullable();
            $table->date('depart_date')->nullable();
            $table->date('return_date')->nullable();
            $table->enum('enquiry_type', ['CONTACT_ENQUIRY', 'FLIGHT_ENQUIRY', 'SEARCH_FLIGHT_ENQUIRY'])->nullable();
            $table->string('ip')->nullable();
            $table->string('reference_id')->nullable();
            $table->string('country')->nullable();
            $table->string('accept_privacy')->nullable();

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable();

            $table->index('reference_id');
            $table->index('phone');
            $table->index('enquiry_type');
            $table->index('destination');
            $table->index('source');
            $table->index('adults');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enquiries');
    }
}
