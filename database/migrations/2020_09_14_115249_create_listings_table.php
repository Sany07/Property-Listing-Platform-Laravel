<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::disableForeignKeyConstraints();
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('title', 300);
            $table->text('description');
            $table->float('price', 10, 2);
            $table->float('square_feet', 10, 2);
            $table->float('lot_size', 10, 2);
            $table->integer('bedroom');
            $table->integer('garage');
            $table->integer('bathroom');
            $table->string('city');
            $table->string('country');
            $table->string('thumbnail_0');
            $table->string('thumbnail_1')->nullable();
            $table->string('thumbnail_2')->nullable();
            $table->string('thumbnail_3')->nullable();
            $table->string('thumbnail_4')->nullable();
            $table->string('thumbnail_5')->nullable();
            $table->string('thumbnail_6')->nullable();
            $table->timestamps();
            $table->foreignId('realtor_id')->nullable()
                    ->constrained()
                    ->onDelete('cascade');
            $table-> enum('is_published',['0','1']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listings');
    }
}
