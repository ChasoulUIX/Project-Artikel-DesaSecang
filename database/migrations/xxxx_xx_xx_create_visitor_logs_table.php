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
        if (!Schema::hasTable('visitor_logs')) {
            Schema::create('visitor_logs', function (Blueprint $table) {
                $table->id();
                $table->string('ip_address')->nullable();
                $table->string('user_agent')->nullable();
                $table->foreignId('article_id')->nullable()->constrained()->onDelete('set null');
                $table->string('url')->nullable();
                $table->string('session_id')->nullable();
                $table->timestamps();
            });
        } else {
            Schema::table('visitor_logs', function (Blueprint $table) {
                if (!Schema::hasColumn('visitor_logs', 'ip_address')) {
                    $table->string('ip_address')->nullable();
                }
                if (!Schema::hasColumn('visitor_logs', 'user_agent')) {
                    $table->string('user_agent')->nullable();
                }
                if (!Schema::hasColumn('visitor_logs', 'article_id')) {
                    $table->foreignId('article_id')->nullable()->constrained()->onDelete('set null');
                }
                if (!Schema::hasColumn('visitor_logs', 'url')) {
                    $table->string('url')->nullable();
                }
                if (!Schema::hasColumn('visitor_logs', 'session_id')) {
                    $table->string('session_id')->nullable();
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitor_logs');
    }
}; 