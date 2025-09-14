<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void {
        Schema::create('products', function (Blueprint $t) {
            $t->id();
            $t->string('title');
            $t->string('slug')->unique();
            $t->unsignedBigInteger('category_id')->nullable();
            $t->decimal('price', 10, 2);
            $t->unsignedInteger('stock')->default(0);
            $t->boolean('is_active')->default(true);
            $t->text('description')->nullable();
            $t->timestamps();

            $t->foreign('category_id')->references('id')->on('categories')->nullOnDelete();
        });
    }
    public function down(): void { Schema::dropIfExists('products'); }
};
