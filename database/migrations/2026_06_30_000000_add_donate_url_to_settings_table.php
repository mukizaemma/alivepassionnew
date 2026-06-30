<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
  {
    Schema::table('settings', function (Blueprint $table) {
      $table->string('donate_url')->nullable()->after('youtube');
    });

    DB::table('settings')->update([
      'donate_url' => 'https://faithandlearning.org/projects/alive-passion-ministries/#form-section',
    ]);
  }

  public function down()
  {
    Schema::table('settings', function (Blueprint $table) {
      $table->dropColumn('donate_url');
    });
  }
};
