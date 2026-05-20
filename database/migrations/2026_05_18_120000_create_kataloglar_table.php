<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kataloglar', function (Blueprint $table) {
            $table->id();
            $table->string('baslik');
            $table->string('slug')->unique();
            $table->string('pdf_path');
            $table->string('kapak_resim')->nullable();
            $table->text('aciklama')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description', 500)->nullable();
            $table->string('meta_keywords', 500)->nullable();
            $table->unsignedSmallInteger('sira')->default(0);
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });

        Schema::table('ayarlar', function (Blueprint $table) {
            if (! Schema::hasColumn('ayarlar', 'meta_title')) {
                $table->string('meta_title')->nullable()->after('baslik');
            }
            if (! Schema::hasColumn('ayarlar', 'og_image')) {
                $table->string('og_image')->nullable();
            }
            if (! Schema::hasColumn('ayarlar', 'canonical_url')) {
                $table->string('canonical_url')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kataloglar');

        Schema::table('ayarlar', function (Blueprint $table) {
            $cols = ['meta_title', 'og_image', 'canonical_url'];
            foreach ($cols as $col) {
                if (Schema::hasColumn('ayarlar', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
