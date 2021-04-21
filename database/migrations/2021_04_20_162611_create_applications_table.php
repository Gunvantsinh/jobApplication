<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('gender')->nullable();
            $table->text('address')->nullable();
            $table->bigInteger('contact');
            $table->string('university')->nullable();
            $table->integer('year')->nullable();
            $table->string('percentage')->nullable();
            $table->boolean('hindiread')->nullable();
            $table->boolean('hindiwrite')->nullable();
            $table->boolean('hindispeak')->nullable();
            $table->boolean('engread')->nullable();
            $table->boolean('engwrite')->nullable();
            $table->boolean('engspeak')->nullable();
            $table->boolean('gujaratiread')->nullable();
            $table->boolean('gujaratiwrite')->nullable();
            $table->boolean('gujaratispeak')->nullable();
            $table->boolean('phpbeginner')->nullable();
            $table->boolean('phpmediator')->nullable();
            $table->boolean('phpexpert')->nullable();
            $table->boolean('mysqlbeginner')->nullable();
            $table->boolean('mysqlmediator')->nullable();
            $table->boolean('mysqlexpert')->nullable();
            $table->boolean('laravelbeginner')->nullable();
            $table->boolean('laravelmediator')->nullable();
            $table->boolean('laravelexpert')->nullable();
            $table->string('location')->nullable();
            $table->integer('ectc')->nullable();
            $table->integer('cctc')->nullable();
            $table->integer('notice_period')->nullable();
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
        Schema::dropIfExists('applications');
    }
}
