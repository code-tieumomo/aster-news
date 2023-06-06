<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('crawler_queues', function (Blueprint $table) {
            $table->id();
            $table->string('url_hash', 128);
            $table->text('url');
            $table->longText('url_class');
            $table->longText('html')->nullable()->collation('utf8mb4_bin');
            $table->expires();
            $table->index('url_hash');
            $table->index('expires_at');
            $table->timestamps();
            $table->softDeletes()->comment('Processed');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crawler_queues');
    }
};
