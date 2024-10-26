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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->text('description');
            $table->decimal('goal_amount', 15, 2); // Campaigns funding goal in ETH (you can store in wei)
            $table->decimal('current_amount', 15, 2)->default(0); // Track funds raised
            $table->string('owner'); // Address of the campaign owner
            $table->timestamp('deadline')->nullable(); // Deadline for the campaign
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
