<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->text('description');
            $table->text('short_description');
            $table->integer('total_quantity')->default(0);
            $table->decimal('discount', 5, 2)->default(0.00);
            $table->text('thumbnail');
            $table->text('specifications');
            $table->tinyInteger('status')->default(1);
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'))->useCurrentOnUpdate();

            // Khóa ngoại
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade')->onUpdate('no action');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
