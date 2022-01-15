<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('company_id')
                ->constrained()
                ->onDelete('cascade');
            $table->string('main')->nullable();;
            $table->string('inn')->nullable();;
            $table->string('director')->nullable();;
            $table->string('info')->nullable();;
            $table->string('address')->nullable();;
            $table->string('phone')->nullable();;
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
        Schema::dropIfExists('comments');
    }
}
