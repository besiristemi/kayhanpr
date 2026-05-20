<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('sayfalar')
            ->where(function ($q) {
                $q->where('baslik', 'like', '%Bize Ulaş%')
                    ->orWhere('baslik', 'like', '%bize ulaş%');
            })
            ->whereNull('ust_id')
            ->update([
                'ust_id' => 1,
                'updated_at' => now(),
            ]);
    }

    public function down(): void
    {
        //
    }
};
