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
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('Employee_ID');
            $table->foreignIdFor(App\Models\Employer::class);
            $table->string('Title');
            $table->string('Salary');
            $table->text('description')->nullable();
            $table->string('location')->nullable();
            $table->string('employment_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};
