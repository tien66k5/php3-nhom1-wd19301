<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePcBuildsAndPcBuildComponentsTables extends Migration
{
    public function up(): void
    {
        Schema::create('pc_builds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name')->nullable(); 
            $table->timestamps();
        });

        Schema::create('pc_build_components', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pc_build_id')->constrained('pc_builds')->onDelete('cascade');
            $table->foreignId('category_values_id')->constrained('category_values')->onDelete('cascade'); 
            $table->foreignId('sku_id')->constrained('product_skus')->onDelete('cascade'); 

            $table->unique(['pc_build_id', 'category_values_id']); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pc_build_components');
        Schema::dropIfExists('pc_builds');
    }
}
