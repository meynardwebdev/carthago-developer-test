<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductLineRequest;
use App\Http\Resources\ProductLineResource;
use App\Models\ProductLine;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ProductLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return ProductLineResource::collection(ProductLine::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductLineRequest $request
     * @return ProductLineResource
     */
    public function store(ProductLineRequest $request): ProductLineResource
    {
        $product_line = ProductLine::create($request->validated());

        return new ProductLineResource($product_line);
    }

    /**
     * Display the specified resource.
     *
     * @param ProductLine $product_line
     * @return ProductLineResource
     */
    public function show(ProductLine $product_line): ProductLineResource
    {
        return new ProductLineResource($product_line);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductLineRequest $request
     * @param ProductLine $product_line
     * @return ProductLineResource
     */
    public function update(ProductLineRequest $request, ProductLine $product_line): ProductLineResource
    {
        $product_line->update($request->validated());

        return new ProductLineResource($product_line);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProductLine $product_line
     * @return Response
     */
    public function destroy(ProductLine $product_line): Response
    {
        $product_line->delete();

        return response()->noContent();
    }
}
