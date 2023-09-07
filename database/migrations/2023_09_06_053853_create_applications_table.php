<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('application_id')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->string('father_spouse_name')->nullable();
            $table->string('e_card_number')->nullable();
            $table->text('full_address')->nullable();
            $table->bigInteger('mobile_number')->nullable();
            $table->string('occupation')->nullable();
            $table->string('pincode')->nullable();
            $table->enum('cast', ['SC', 'ST', 'OBC', 'MOBC', 'GEN', 'OTHERS'])->nullable();
            $table->integer('total_family_members')->nullable();
            $table->string('district')->nullable();
            $table->string('block')->nullable();
            $table->string('ulb')->nullable();
            $table->string('block_ulb_name')->nullable();
            $table->enum('document_type', ['Aadhaar', 'PAN', 'Voter ID'])->nullable();
            $table->string('document_number')->nullable();
            $table->string('photo')->nullable();
            $table->timestamp('date_of_apply')->useCurrent();
            $table->string('remark')->nullable();
            $table->string('status')->default('Pending');
            $table->timestamp('updation_date')->nullable()->default(null)->useCurrentOnUpdate();
            $table->boolean('approved')->default(false);
        });

        Schema::table('applications', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
