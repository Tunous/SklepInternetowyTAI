<?php

use App\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->integer('cost');
            $table->timestamps();
        });

        $this->addProduct('Produkt 1', 'Produkt z numerem 1', 1000);
        $this->addProduct('Produkt 2', 'Produkt z numerem 2', 2280);
        $this->addProduct('Produkt 3', 'Produkt z numerem 3', 1250);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }

    private function addProduct($name, $description, $cost)
    {
        $product = new Product([
            'name' => $name,
            'description' => $description,
            'cost' => $cost
        ]);
        $product->save();
    }
}
