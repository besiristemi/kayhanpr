<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('haber') && ! Schema::hasTable('icerikler')) {
            Schema::rename('haber', 'icerikler');
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('icerikler') && ! Schema::hasTable('haber')) {
            Schema::rename('icerikler', 'haber');
        }
    }
};
