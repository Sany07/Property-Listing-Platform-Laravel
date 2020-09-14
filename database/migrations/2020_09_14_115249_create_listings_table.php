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
            $table->string('main_thumbnail');
            $table->string('extra_thumbnail_1')->nullable();
            $table->string('extra_thumbnail_2')->nullable();
            $table->string('extra_thumbnail_3')->nullable();
            $table->string('extra_thumbnail_4')->nullable();
            $table->string('extra_thumbnail_5')->nullable();
            $table->string('extra_thumbnail_6')->nullable();
            $table->timestamps();
            $table->foreignId('realtor_id')->nullable()
                    ->constrained()
                    ->onDelete('cascade');

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
