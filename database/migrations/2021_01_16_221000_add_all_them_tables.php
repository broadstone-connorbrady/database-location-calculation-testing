<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;

class AddAllThemTables extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Locations
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->unique();
            $table->string('name');
            $table->string('address_line_1');
            $table->string('address_line_2');
            $table->string('address_line_3');
            $table->string('city');
            $table->string('region');
            $table->string('postcode');
            $table->char('country', 2);

            $table->decimal('latitude', 11, 8);
            $table->decimal('longitude', 11, 8);

            $table->timestamps();
            $table->softDeletes();

            $table->index(['latitude', 'longitude']);
        });

        // House statuses
        Schema::create('houses_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->unique();
            $table->string('title');

            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('houses_statuses')->insert([
            [
                'uuid' => Uuid::uuid4()->toString(),
                'title' => 'For sale',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'uuid' => Uuid::uuid4()->toString(),
                'title' => 'For let',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'uuid' => Uuid::uuid4()->toString(),
                'title' => 'Contract pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'uuid' => Uuid::uuid4()->toString(),
                'title' => 'Sold',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'uuid' => Uuid::uuid4()->toString(),
                'title' => 'Do not sell',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        // Estate agents
        Schema::create('estate_agents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->unique();
            $table->string('title');

            $table->bigInteger('location_id');

            $table->timestamps();
            $table->softDeletes();
        });

        // Houses
        Schema::create('houses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->unique();

            $table->bigInteger('status_id');
            $table->bigInteger('estate_agent_id');
            $table->bigInteger('location_id');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('houses');
        Schema::dropIfExists('estate_agents');
        Schema::dropIfExists('locations');
        Schema::dropIfExists('houses_statuses');
    }
}
