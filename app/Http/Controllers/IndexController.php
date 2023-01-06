<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use DB;

class IndexController extends Controller
{
    public function index(Request $req) {

        if ($req->session()->has('error-email')) {
           toastr()->error('Данный Email адрес занят &#128528;');
        }

        if ($req->session()->has('error-data')) {
            toastr()->info('Пожалуйста, заполните все поля!');
        }

        if ($req->session()->has('order-success')) {
            toastr()->success('Заказ успешно оформлен!');
            toastr()->info('Следить за статусом заказа можно в личном кабинете!');
        }

        if ($req->session()->has('error-input')) {
            toastr()->error('Неправильный логин или пароль');
        }

        if ($req->session()->has('empty-order')) {
            toastr()->error('Ваша корзина пуста &#128580;');
        }

        if ($req->session()->has('loggedIn')) {
            toastr()->success('Вы успешно авторизовались &#128521;');
        }
        if ($req->session()->has('registredIn')) {
            toastr()->success('Аккаунт создан! 	&#128519;');
        }
        // $products = Product::orderBy('created_at')->take(8)->get();
       // $categories = Category::where('id', 1)->first();
       // $products = Product::where('category_id', 2)->get();
       $pizzas = Product::where('category_id', 1)->get();
       $pokes = Product::where('category_id', 2)->get();
       $garnishes = Product::where('category_id', 3)->get();
       $rolls = Product::where('category_id', 4)->get();
       $sweets = Product::where('category_id', 5)->get();
       $breads = Product::where('category_id', 6)->get();
       $soups = Product::where('category_id', 7)->get();
       $souses = Product::where('category_id', 8)->get();
       $salads = Product::where('category_id', 9)->get();
       $drinks = Product::where('category_id', 10)->get();
        return view('bistro/index', [
            'pizzas' => $pizzas,
            'pokes' => $pokes,
            'garnishes' => $garnishes,
            'rolls' => $rolls,
            'sweets' => $sweets,
            'breads' => $breads,
            'soups' => $soups,
            'salads' => $salads,
            'drinks' => $drinks
        ]);
    }
    public function about() {
        return view('bistro/about');
    }
    public function contacts() {
        return view('bistro/contacts');
    }
    public function cabinetLogout() {
        
        Auth::logout(Auth::user());

        return redirect('/');

    }
    public function cabinet(Request $req) {
        $user = Auth::user();
        $orders = DB::table('orders')->where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();

        if ($req->session()->has('cabinetSuccess')) {
            toastr()->success('Изменения успешно сохранены! &#128519;');
        }

        return view('bistro/cabinet', [
            'user' => $user,
            'orders' => $orders
        ]);
    }
    
    public function cabinetPost(Request $req) {
        $user = Auth::user();

        $user->name = $req->input('name');
        $user->delivery_street = $req->input('delivery_street');
        $user->date_birthday = $req->input('birthday');
        $user->email = $req->input('email');
        $user->save();

        return redirect('/cabinet')->with('cabinetSuccess', '');
    }
}
