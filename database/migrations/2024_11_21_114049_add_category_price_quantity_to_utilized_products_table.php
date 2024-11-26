<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryPriceQuantityToUtilizedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('utilized_products', function (Blueprint $table) {
            $table->integer('product_id')->nullable();
            $table->string('category')->nullable();  // Add the 'category' column
            $table->decimal('price', 8, 2)->nullable();  // Add the 'price' column
            $table->integer('quantity')->nullable();  // Add the 'quantity' column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('utilized_products', function (Blueprint $table) {
            $table->dropColumn('product_id');
            $table->dropColumn('category');  // Drop the 'category' column
            $table->dropColumn('price');  // Drop the 'price' column
            $table->dropColumn('quantity');  // Drop the 'quantity' column
        });
    }
}
