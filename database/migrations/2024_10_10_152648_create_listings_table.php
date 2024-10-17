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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->longText('description');
            $table->string('salary')->nullable()->default(null);
            $table->string('tags')->nullable()->default(null);
            $table->string('job_type')->nullable()->default('Full-time')->comment('Full-time, Part-time, Contract, Internship');
            $table->boolean('remote')->default(false)->comment('0: No, 1: Yes');
            $table->longText('requirements')->nullable()->default(null);
            $table->longText('benefits')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->string('city')->nullable()->default(null);
            $table->string('state')->nullable()->default(null);
            $table->string('zipcode')->nullable()->default(null);
            $table->string('contact_email')->nullable()->default(null);
            $table->string('contact_phone')->nullable()->default(null);
            $table->string('company_name')->nullable()->default(null);
            $table->string('company_description')->nullable()->default(null);
            $table->string('company_logo')->nullable()->default(null);
            $table->string('company_website')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
