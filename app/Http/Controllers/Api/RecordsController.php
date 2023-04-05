<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class RecordsController extends Controller
{
    /**
     * Returns the record count for each resource
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'data' => [
                'customers' => Customer::all()->count(),
                'employees' => Employee::all()->count(),
                'products' => Product::all()->count(),
                'orders' => Order::all()->count(),
            ],
        ]);
    }
}
