<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('managers', function (Blueprint $table) {
            $table->unsignedMediumInteger('id', true)->comment('Идентификатор менеджера');
            $table->string('firstName', 150)->nullable(false)->default('');
            $table->string('lastName', 150)->nullable(false)->default('');
        });
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedMediumInteger('manager_id')->comment('Идентификатор менеджера');
            $table->foreign(['manager_id'])
                ->references('id')
                ->on('managers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('orders');
        Schema::drop('managers');
    }
};
