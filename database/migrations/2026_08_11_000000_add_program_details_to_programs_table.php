<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('programs', function (Blueprint $table) {
            if (!Schema::hasColumn('programs', 'excerpt')) {
                $table->text('excerpt')->nullable()->after('description');
            }
            if (!Schema::hasColumn('programs', 'icon')) {
                $table->string('icon')->nullable()->after('excerpt');
            }
            if (!Schema::hasColumn('programs', 'sort_order')) {
                $table->unsignedInteger('sort_order')->default(0)->after('status');
            }
        });
    }

    public function down()
    {
        Schema::table('programs', function (Blueprint $table) {
            if (Schema::hasColumn('programs', 'excerpt')) {
                $table->dropColumn('excerpt');
            }
            if (Schema::hasColumn('programs', 'icon')) {
                $table->dropColumn('icon');
            }
            if (Schema::hasColumn('programs', 'sort_order')) {
                $table->dropColumn('sort_order');
            }
        });
    }
};
