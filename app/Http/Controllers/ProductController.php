<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    private function getProducts()
    {
        return [
            1 => ['id' => 1, 'name' => 'Bottled Water 500ml', 'price' => 15, 'stock' => 120, 'category' => 'Drinks'],
            2 => ['id' => 2, 'name' => 'Instant Noodles',     'price' => 12, 'stock' => 200, 'category' => 'Pantry'],
            3 => ['id' => 3, 'name' => 'Canned Sardines',     'price' => 25, 'stock' => 80,  'category' => 'Canned'],
            4 => ['id' => 4, 'name' => 'Sliced Bread',        'price' => 60, 'stock' => 30,  'category' => 'Bakery'],
            5 => ['id' => 5, 'name' => '3-in-1 Coffee',       'price' => 8,  'stock' => 300, 'category' => 'Drinks'],
            6 => ['id' => 6, 'name' => 'Corned Beef',         'price' => 45, 'stock' => 60,  'category' => 'Canned'],
            7 => ['id' => 7, 'name' => 'Pandesal Pack',       'price' => 20, 'stock' => 50,  'category' => 'Bakery'],
            8 => ['id' => 8, 'name' => 'Rice 1kg',            'price' => 55, 'stock' => 70,  'category' => 'Pantry'],
        ];
    }

    public function index()
    {
        $products = $this->getProducts();

        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $products = $this->getProducts();

        // No product with this id? Show a proper 404 page.
        if (!isset($products[$id])) {
            abort(404);
        }

        return view('products.show', [
            'product' => $products[$id],
            'heading' => 'Product Details',
        ]);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    // ---------- MY EXTRA METHODS (not one of the seven) ----------

    public function featured()
    {
        $products = $this->getProducts();

        return view('products.show', [
            'product' => $products[5],  
            'heading' => 'Featured Product',
        ]);
    }

    public function filter($category = null)
    {
        $products = $this->getProducts();
        $matches = [];

        foreach ($products as $product) {
            if ($category === null || strtolower($product['category']) === strtolower($category)) {
                $matches[] = $product;
            }
        }

        return view('products.filter', [
            'products' => $matches,
            'category' => $category,
        ]);
    }
}