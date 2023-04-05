<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderDetailRequest;
use App\Http\Resources\OrderDetailResource;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return OrderDetailResource::collection(OrderDetail::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OrderDetailRequest $request
     * @return OrderDetailResource
     */
    public function store(OrderDetailRequest $request): OrderDetailResource
    {
        $order_detail = OrderDetail::create($request->validated());

        return new OrderDetailResource($order_detail);
    }

    /**
     * Display the specified resource.
     *
     * @param OrderDetail $order_detail
     * @return OrderDetailResource
     */
    public function show(OrderDetail $order_detail): OrderDetailResource
    {
        return new OrderDetailResource($order_detail);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param OrderDetailRequest $request
     * @param OrderDetail $order_detail
     * @return OrderDetailResource
     */
    public function update(OrderDetailRequest $request, OrderDetail $order_detail): OrderDetailResource
    {
        $order_detail->update($request->validated());

        return new OrderDetailResource($order_detail);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param OrderDetail $order_detail
     * @return Response
     */
    public function destroy(OrderDetail $order_detail): Response
    {
        $order_detail->delete();

        return response()->noContent();
    }
}
