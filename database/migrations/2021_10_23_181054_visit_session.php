<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VisitSession extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit_session', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
            ->constrained('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->text('user_agent')->nullable();
            
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
        Schema::dropIfExists('visit_session');
    }
}
