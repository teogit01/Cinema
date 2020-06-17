<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable();
            $table->string('name')->nullable();
            $table->integer('runtime')->nullable();
            $table->string('director')->nullable();
            $table->string('cast')->nullable();
            $table->string('trailer')->nullable();
            $table->date('openday')->nullable();
            $table->integer('openday')->nullable();
            $table->text('poster')->nullable();
            $table->string('status')->nullable();
            $table->string('banner')->nullable();
            $table->float('star')->nullable();

            // $table->integer('id_country')->nullable();
            // $table->integer('id_genre')->nullable();
            
            //$table->timestamps();
            $table->timestamp('created_at')
                    ->default(DB::raw('CURRENT_TIMESTAMP'))
                    ->comment('ngày tạo');

                $table->timestamp('updated_at')
                    ->default(DB::raw('CURRENT_TIMESTAMP'))
                    ->comment('ngày cập nhật');

                $table->timestamp('deleted_at')
                    ->nullable()
                    ->comment('ngày xóa tạm');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('films');
    }
}
