<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone', 20);
            $table->string('document')->unique();
            $table->string('address');
            $table->uuid('city_id')->nullable();
            $table->uuid('state_id')->nullable();
            $table->uuid('country_id')->nullable();
            $table->string('postcode', 10)->nullable();
            $table->uuid('tenancy_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onDelete('set null');

            $table->foreign('state_id')
                ->references('id')
                ->on('states')
                ->onDelete('set null');

            $table->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->onDelete('set null');

            $table->foreign('tenancy_id')
                ->references('id')
                ->on('tenancies');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
