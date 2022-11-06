<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up() : void
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->string('image')->nullable();
        });
    }

    public function down() : void
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};
