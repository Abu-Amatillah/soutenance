<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function home(): View {
        $categories = Category::all();
        $latest_products = Product::latest()->take(12)->get();
        $latest_products = $latest_products->split(3);
        $top_rated_products = Product::leftJoin('reviews', 'products.id', '=', 'reviews.product_id')
                                        ->select('products.*', DB::raw('ROUND(AVG(reviews.rating), 2) as average_ratings' ))
                                        ->groupBy('products.id')->orderBy('average_ratings', 'DESC')->take(12)->get();
        $top_rated_products = $top_rated_products->split(3);
        $top_sold_products = OrderItem::select(
                                            'product_id',
                                            'products.name as product_name',
                                            'products.price as product_price',
                                            'products.image as product_image',
                                            DB::raw('SUM(order_items.amount) as total_sale')
                                        )
                                        ->join('orders', function (JoinClause $join) {
                                            $join->on('order_items.order_id', '=', 'orders.id')
                                                ->where('orders.status', '=', config('app.order_status')['processed']);
                                        })
                                        ->leftJoin('products', 'products.id', '=', 'order_items.product_id')
                                        ->groupBy('product_id')
                                        ->orderBy('total_sale', 'desc')
                                        ->take(12)
                                        ->get();
        $top_sold_products = $top_sold_products->split(3);
        return view('index', compact('categories', 'latest_products', 'top_sold_products', 'top_rated_products'));
    }
}
