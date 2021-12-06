<?php

use App\Models\Product;
use App\Models\Th_Jual;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTdJualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('td_jual', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Th_Jual::class);
            $table->foreignIdFor(Product::class);
            $table->bigInteger('harga')->unsigned();
            $table->unsignedInteger('jumlah')->length(10);
            $table->bigInteger('subtotal')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('td_jual');
    }
}
