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
        // Check if the table exists
        if (Schema::hasTable('visitor_logs')) {
            // First, check which columns we already have
            $columns = Schema::getColumnListing('visitor_logs');
            
            Schema::table('visitor_logs', function (Blueprint $table) use ($columns) {
                if (!in_array('ip_address', $columns)) {
                    $table->string('ip_address')->nullable();
                }
                
                if (!in_array('user_agent', $columns)) {
                    $table->string('user_agent')->nullable();
                }
                
                if (!in_array('article_id', $columns)) {
                    $table->foreignId('article_id')->nullable()->constrained()->onDelete('set null');
                }
                
                if (!in_array('url', $columns)) {
                    $table->string('url')->nullable();
                }
                
                if (!in_array('session_id', $columns)) {
                    $table->string('session_id')->nullable();
                }
            });
        } else {
            // Create the table if it doesn't exist
            Schema::create('visitor_logs', function (Blueprint $table) {
                $table->id();
                $table->string('ip_address')->nullable();
                $table->string('user_agent')->nullable();
                $table->foreignId('article_id')->nullable()->constrained()->onDelete('set null');
                $table->string('url')->nullable();
                $table->string('session_id')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // We don't want to drop the table in down migration
        // since it might have data. Instead, we'll drop columns 
        // that we added in this migration.
        Schema::table('visitor_logs', function (Blueprint $table) {
            // No action needed in down migration
        });
    }
}; 