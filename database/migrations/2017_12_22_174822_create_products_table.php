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
            $table->timestamps();
        });

        $this->addProduct('Szarlotka', 'Ciasto z jabłkami');
        $this->addProduct('Makowiec', 'Ciasto z makiem');
        $this->addProduct('Sernik', 'Ciasto z serem');
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

    private function addProduct($name, $description)
    {
        $product = new Product([
            'name' => $name,
            'description' => $description
        ]);
        $product->save();
    }
}
