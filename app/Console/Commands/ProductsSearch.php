<?php

namespace App\Console\Commands;

use App\Http\Resources\PharmacyResource;
use App\Models\PharmaciesProducts;
use Illuminate\Console\Command;
use Response;

class ProductsSearch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:search-cheapest {product_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'return 5 cheapest pharmaceries  price from products';

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
     * @return int
     */
    public function handle()
    {
        $result = [];
        $productId = $this->argument('product_id');
        $pharmacies_products =  PharmaciesProducts::where('products_id',$productId)->orderBy('price', 'asc')->limit(5)->get();
        if(!empty($pharmacies_products)){
            $result = PharmacyResource::collection($pharmacies_products);
        }
        print_r($result);
      //  return \Response::json($result, 200);
    }
}
