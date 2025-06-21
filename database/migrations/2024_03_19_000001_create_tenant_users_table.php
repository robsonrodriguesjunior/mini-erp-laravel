<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tenant_users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('password');
            $table->uuid('tenancy_id');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('tenancy_id')
                ->references('id')
                ->on('tenancies');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tenant_users');
    }
};
