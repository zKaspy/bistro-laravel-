<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Validator;


class CartController extends Controller
{
    public function index() {
        $items = \Cart::session(Auth::id())->getContent();

        session(['order_id' => '1']);

        return view('bistro/cartest', [
            'items' => $items,
        ]);
    }

    public function addToCart(Request $req) {
       $product = Product::where('id', $req->id)->first(); 

        \Cart::session(Auth::id())->add(array(
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => [
                'img' => $product->img,
                'ctg' => $product->category_id,
                'weight' => $product->weight
            ]
        )); 

        return response()->json(\Cart::getContent());
    }

    public function cartOrder(Request $req) {

        if (!$req->session()->exists('order_id')) {
            return redirect('/');
        }

        if (!\Cart::session(Auth::id())->getTotal()) {
            return redirect('/')->with('empty-order',' ');
        }

        $validate = Validator::make($req->all(),[
            'tel' => 'required|max:255',
            'comment' => 'required|max:255',
            'delivery' => 'required|max:255',
        ]);

        if ($validate->fails()) {
            return redirect('/cart')->with('error',' ');
        }


        $products = \Cart::session(Auth::id())->getContent();
        $user_id = Auth::id();

        $order = Order::create([
            'name' => Auth::user()->name,
            'delivery_street' => $req->input('delivery'),
            'tel' => $req->input('tel'),
            'comment' => $req->input('comment'),
            'amount' => \Cart::session(Auth::id())->getTotal(), 
            'user_id' => $user_id,
            ]
        );

        foreach ($products as $product) {
            $order->items()->create([
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $product->quantity,
                'cost' => $product->price * $product->quantity,
            ]);
        }

        \Cart::session($user_id)->clear();

        $req->session()->forget('order_id');

        return redirect('/')->with('order-success', '');
    }
    public function subtractItem(Request $req) {
        \Cart::session(Auth::id())->update($req->id, array(
            'quantity' => -1,
        )); 

        return response()->json([
            'qty' => \Cart::get($req->id)->quantity,
            'sum' => \Cart::get($req->id)->getPriceSum(),
            'total' => \Cart::session(Auth::id())->getTotal()
            ]);
    }
    public function deleteItem(Request $req) {
        \Cart::session(Auth::id())->remove($req->id);  
        
        return response()->json([
            'total' => \Cart::session(Auth::id())->getTotal()
            ]);
    }
    public function addItem(Request $req) {
        \Cart::session(Auth::id())->update($req->id, array(
            'quantity' => 1,
        ));   

        return response()->json([
            'qty' => \Cart::get($req->id)->quantity,
            'sum' => \Cart::get($req->id)->getPriceSum(),
            'total' => \Cart::session(Auth::id())->getTotal()
            ]); 
    }
}
