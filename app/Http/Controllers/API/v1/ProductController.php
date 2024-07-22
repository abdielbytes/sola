<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Response;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        // Retrieve all products from the database
        $products = Product::all();

        // Return the products as a JSON response
        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request): JsonResponse
    {
        // Validate the request data
        $validated = $request->validated();

        // Create a new product with the validated data
        $product = Product::create($validated);

        // Return a JSON response with the newly created product
        return response()->json($product, Response::HTTP_CREATED);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Not typically needed in an api so I'll leave this method empty.
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): JsonResponse
    {
        // Return the product as a JSON response
        return response()->json($product);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();

        // Update the product with the validated data
        $product->update($validated);

        // Return the updated product as a JSON response
        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            // Delete the product
            $product->delete();

            // Return a success response
            return response()->json(['message' => 'Product deleted successfully'], Response::HTTP_NO_CONTENT);
        } catch (Exception $e) {
            // Handle the case where the product cannot be deleted
            return response()->json(['message' => 'Failed to delete product'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
