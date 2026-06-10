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
    Schema::create('worker_transactions', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('worker_id');
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->string('worker_name');
    $table->decimal('amount', 10, 2);
    $table->date('transaction_date');
    $table->string('payment_type')->default('cash');
    $table->text('description')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('worker_transactions');
    }
    
};
