<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->all();

        if (Products::where("name", $data['name'])->first() != null) {
            return response()->json(["error" => "Product already registered"], 400);
        }

        $output = Products::create([
            'name' => $data['name'],
            'type' => $data['type'],
            'price' => $data['price'],
        ]);

        if ($output) {
            return response()->json($output);
        }
    }

    public function query(Request $request)
    {
        $products = $request->products;
        $output_array = array();

        $totalPrice = 0;
        $totalTax = 0;

        foreach ($products as $product) {
            $out = Products::where("name", $product['name'])->join("taxes", "products.type", "=", "taxes.type")->first();

            $taxPercentage = $out->tax / 100;
            $taxReal = $out->price * $taxPercentage;

            $priceMultiple = ($out->price + $taxReal) * $product['quantity'];
            $taxMultiple = $taxReal * $product['quantity'];

            array_push($output_array, array(
                "product" => $out->name,
                "priceTotal" => number_format((float)$priceMultiple, 2, ".", ""),
                "taxTotal" => number_format((float)$taxMultiple, 2, ".", ""),
            ));

            $totalPrice += $priceMultiple;
            $totalTax += $taxMultiple;
        }
        return response()->json([
            "products" => $output_array,
            "totalPrice" => number_format((float)$totalPrice, 2, ".", ""),
            "totalTax" => number_format((float)$totalTax, 2, ".", "")
        ]);
    }
}
