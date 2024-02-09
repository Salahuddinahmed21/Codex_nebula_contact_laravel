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
        Schema::create('client_query', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id')->index('client_id');
            $table->string('features');
            $table->string('sub_features');
            $table->string('referencewebsite');
            $table->string('Description');
            $table->string('tpintegration')->nullable();
            $table->string('referimage')->nullable();
            $table->string('technology');
            $table->string('sdate');
            $table->string('edate');
            $table->string('images')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_client_query');
    }
};
