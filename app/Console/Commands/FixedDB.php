<?php

namespace App\Console\Commands;

use App\Models\Office;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductLine;
use Illuminate\Console\Command;

class FixedDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:fix-db';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // @Office

        // @Employee

        // @Orders - change orderNumber to ID

        // @Products
//        $products = Product::all();
//        foreach ($products as $product) {
//            $order_details = OrderDetail::where('sku', $product->sku)->get();
//
//            foreach ($order_details as $order) {
//                $order->product_id = $product->id;
//                $order->save();
//            }
//        }

        // @OrderDetails - change productCode to ID

        // @ProductLines
        $product_lines = ProductLine::all();
        foreach ($product_lines as $line) {
            $products = Product::where('productLine', $line->name)->get();

            foreach ($products as $product) {
                $product->product_line_id = $line->id;
                $product->save();
            }
        }

        // @Customer
    }
}
