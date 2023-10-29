<?php

namespace App\Http\Controllers;

use App\Mail\ContactForm;
use App\Mail\DevisRequested;
use App\Mail\OrderValidated;
use App\Mail\ServiceRequested;
use App\Mail\UserOrderValidated;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function home(): View {
        $categories = Category::has('products')->get();
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
        $cart = session()->get('cart');
        if ($cart == null)
            $cart = ['products' => [], 'ids' => [], 'amount' => 0];
        $wishlist = session()->get('wishlist');
        if ($wishlist == null)
            $wishlist = ['products' => [], 'ids' => []];
        $devis_success = '';
        $service_success = '';
        return view('index', compact('categories', 'latest_products', 'top_sold_products', 'top_rated_products', 'wishlist', 'cart', 'devis_success', 'service_success'));
    }

    public function shop(Request $request, $per_page = 12): View {
        $categories = Category::has('products')->get();
        $latest_products = Product::latest()->take($per_page)->get();
        $latest_products = $latest_products->split(3);
        $min_price = Product::min('price');
        $max_price = Product::max('price');
        $devis_success = '';
        $service_success = '';

        #Get filter request parameters and set selected value in filter
        $filter_min_price = $request->min_price;
        $filter_max_price = $request->max_price;
        $category_id = $request->category;
        $sort_by = $request->sort_by ? $request->sort_by : 'DESC';
        $search = $request->search;
        $products = Product::orderBy('updated_at', $sort_by);
        if ($search) {
            $products = $products->where('name', 'LIKE', '%'.$search.'%');
            if ($category_id) {
                $products = $products->where('category_id', $category_id);
                $min_price = $products->min('price');
                $max_price = $products->max('price');

                if($filter_min_price && $filter_max_price) {
                    if($filter_min_price > 0 && $filter_max_price >0) {
                        $products = $products->whereBetween('price', [$filter_min_price,$filter_max_price])->paginate($per_page)->withQueryString();
                    }
                }
                #Show default product list in Blade file
                else {
                    $products = $products->paginate($per_page)->withQueryString();
                }

            } else {
                #Get products according to filter
                if($filter_min_price && $filter_max_price) {
                    if($filter_min_price > 0 && $filter_max_price >0) {
                        $products = Product::whereBetween('price',[$filter_min_price,$filter_max_price])->paginate($per_page)->withQueryString();
                    }
                }
                #Show default product list in Blade file
                else {
                    $products = Product::paginate($per_page)->withQueryString();
                }
            }
        } else {
            if ($category_id) {
                $products = $products->where('category_id', $category_id);
                $min_price = $products->min('price');
                $max_price = $products->max('price');

                if($filter_min_price && $filter_max_price) {
                    if($filter_min_price > 0 && $filter_max_price >0) {
                        $products = $products->whereBetween('price', [$filter_min_price,$filter_max_price])->paginate($per_page)->withQueryString();
                    }
                }
                #Show default product list in Blade file
                else {
                    $products = $products->paginate($per_page)->withQueryString();
                }

            } else {
                #Get products according to filter
                if($filter_min_price && $filter_max_price) {
                    if($filter_min_price > 0 && $filter_max_price >0) {
                        $products = Product::whereBetween('price',[$filter_min_price,$filter_max_price])->paginate($per_page)->withQueryString();
                    }
                }
                #Show default product list in Blade file
                else {
                    $products = Product::paginate($per_page)->withQueryString();
                }
            }
        }

        $cart = session()->get('cart');
        if ($cart == null)
            $cart = ['products' => [], 'ids' => [], 'amount' => 0];
        $wishlist = session()->get('wishlist');
        if ($wishlist == null)
            $wishlist = ['products' => [], 'ids' => []];
        return view('shop', compact('devis_success', 'service_success', 'categories', 'latest_products', 'min_price', 'max_price', 'products', 'request', 'wishlist', 'cart'));
    }

    public function addToCart(Request $request)
    {
        $cart = json_decode($request->cart);
        session()->put(
            'cart',
            [
                'products' => $cart,
                'ids' => array_map(function ($value) {
                    return $value->id;
                }, $cart),
                'amount' => array_reduce($cart, function($carry, $item) {
                    $carry += $item->quantity * $item->price;
                    return $carry;
                })
            ]
        );
        $cart = session()->get('cart');
        if ($cart == null)
            $cart = ['products' => [], 'ids' => [], 'amount' => 0];

        return response()->json($cart);
    }

    public function addToWishlist(Request $request)
    {
        $wishlist = json_decode($request->wishlist);
        session()->put(
            'wishlist',
            [
                'products' => $wishlist,
                'ids' => array_map(function ($value) {
                    return $value->id;
                }, $wishlist)
            ]);

        $wishlist = session()->get('wishlist');
        if ($wishlist == null)
            $wishlist = ['products' => [], 'ids' => []];
        return response()->json($wishlist);
    }

    public function shop_details(Request $request, string $product_id, $per_page = 4): View {
        $categories = Category::has('products')->get();
        $devis_success = '';
        $service_success = '';
        $cart = session()->get('cart');
        if ($cart == null)
            $cart = ['products' => [], 'ids' => [], 'amount' => 0];
        $wishlist = session()->get('wishlist');
        if ($wishlist == null)
            $wishlist = ['products' => [], 'ids' => []];
        $product = Product::with(['category', 'reviews', 'reviews.user'])->find($product_id);
        $featured_products = Product::inRandomOrder()->where('category_id', $product->category_id)->take($per_page)->get();
        $filtered = array_filter($cart['products'], function ($item) use ($product) {
            return $item->id == $product->id;
        });
        $cart_item = null;
        if (count($filtered) > 0) {
            $cart_item = $filtered[0];
        }
        return view('shop-details', compact('categories', 'featured_products', 'product', 'request', 'wishlist', 'cart', 'cart_item', 'devis_success', 'service_success'));
    }

    public function wishlist(Request $request): View {
        $categories = Category::has('products')->get();
        $devis_success = '';
        $service_success = '';
        $cart = session()->get('cart');
        if ($cart == null)
            $cart = ['products' => [], 'ids' => [], 'amount' => 0];
        $wishlist = session()->get('wishlist');
        if ($wishlist == null)
            $wishlist = ['products' => [], 'ids' => []];
        return view('wishlist', compact('categories', 'wishlist', 'cart', 'devis_success', 'service_success'));
    }

    public function shopping_cart(Request $request): View {
        $categories = Category::has('products')->get();
        $devis_success = '';
        $service_success = '';
        $cart = session()->get('cart');
        if ($cart == null)
            $cart = ['products' => [], 'ids' => [], 'amount' => 0];
        $wishlist = session()->get('wishlist');
        if ($wishlist == null)
            $wishlist = ['products' => [], 'ids' => []];
        return view('shopping-cart', compact('categories', 'wishlist', 'cart', 'devis_success', 'service_success'));
    }

    public function post_shopping_cart(Request $request): JsonResponse {
        $cart = json_decode($request->cart);
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'amount' => array_reduce($cart, function($carry, $item) {
                $carry += $item->quantity * $item->price;
                return $carry;
            })
        ]);
        $order_items = [];
        foreach ($cart as $item) {
            array_push($order_items, OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'quantity' => $item->quantity,
                'amount' => $item->quantity * $item->price,
            ]));
        }
        Mail::to(config('mail.to.address'))->send(new OrderValidated(Order::with(['user', 'order_items', 'order_items.product'])->where('id', '=', $order->id)->first()));
        Mail::to(auth()->user()->email)->send(new UserOrderValidated(Order::with(['user', 'order_items', 'order_items.product'])->where('id', '=', $order->id)->first()));
        session()->put(
            'cart',
            [
                'products' => [],
                'ids' => [],
                'amount' => 0
            ]
        );
        return response()->json(['order' => $order, 'order_items' => $order_items, 'cart' => $cart, 'message' => 'Votre commande a été prise en compte. Nous vous contacterons pour la suite.']);
    }


    public function save_devis_request(Request $request): View {
        Mail::to(config('mail.to.address'))->send(new DevisRequested($request->name, $request->telephone, $request->need));
        return $this->home()->with(['devis_success' => 'Votre demande devis a été prise en compte. Nous vous contacterons dans un bref délai.', 'service_success' => '']);
    }

    public function save_service(Request $request) {
        Mail::to(config('mail.to.address'))->send(new ServiceRequested($request->name, $request->telephone, $request->need));
        return redirect()->route('home')->with(['service_success' => 'Votre demande de service a été prise en compte. Nous vous contacterons dans un bref délai.', 'devis_success' => '']);
    }

    public function contact(Request $request): View {
        $devis_success = '';
        $service_success = '';
        $categories = Category::has('products')->get();
        $cart = session()->get('cart');
        if ($cart == null)
            $cart = ['products' => [], 'ids' => [], 'amount' => 0];
        $wishlist = session()->get('wishlist');
        if ($wishlist == null)
            $wishlist = ['products' => [], 'ids' => []];
        return view('contact', compact('wishlist', 'cart', 'categories', 'devis_success', 'service_success'));
    }

    public function post_contact_form(Request $request): View {
        $devis_success = '';
        $service_success = '';
        $categories = Category::has('products')->get();
        $cart = session()->get('cart');
        if ($cart == null)
            $cart = ['products' => [], 'ids' => [], 'amount' => 0];
        $wishlist = session()->get('wishlist');
        if ($wishlist == null)
            $wishlist = ['products' => [], 'ids' => []];
        Mail::to(config('mail.to.address'))->send(new ContactForm($request->name, $request->email, $request->message));
        $message = 'Votre message a été enregistré. Nous vous contacterons dans un bref délai.';
        return view('contact', compact('wishlist', 'cart', 'message', 'devis_success', 'service_success', 'categories'));
    }

}
