<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();

            $table->string('aairlinecode')->nullable();
            $table->string('Journey')->nullable();
            $table->date('DepartDate')->nullable();
            $table->string('adeptime')->nullable();
            $table->string('barrtime')->nullable();
            $table->string('cdeptime')->nullable();
            $table->string('darrtime')->nullable();
            $table->string('Source')->nullable();
            $table->string('Destination')->nullable();
            $table->double('Adults')->nullable();

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable();

            $table->index('aairlinecode');
            $table->index('Source');
            $table->index('Destination');
            $table->index('Adults');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flights');
    }
}
