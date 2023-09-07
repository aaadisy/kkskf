<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  // database/migrations/create_users_table.php

public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('first_name', 200);
        $table->string('last_name', 200);
        $table->bigInteger('mobile_number');
        $table->mediumText('address');
        $table->string('email', 200)->unique();
        $table->string('password', 200);
        $table->timestamp('registration_date')->default(DB::raw('CURRENT_TIMESTAMP'));
        $table->enum('role', ['admin', 'employee'])->default('employee');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
