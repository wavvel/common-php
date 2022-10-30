<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {


  public function up() {
    // TODO: Not finished yet, will continue later
    Schema::create('integration_logs', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->text('idempotency_key');

      $table->timestampsTz();

      $table->index('created_at');
      $table->index('updated_at');
    });


  }

  public function down()  {
    Schema::dropIfxExists('integration_logs');
  }
};
