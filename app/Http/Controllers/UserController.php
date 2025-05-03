<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
// use Illuminate\Container\Attributes\Auth;
use App\Models\Category;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    //orders

    public function showorder(){
        $user = Auth::user();
        $orders = $user->orders()->with('orderdetails.product')->get();
        return view('User.showorder' , compact('orders'));
    }


















    public function categoryproducts($id)
    {
        $category = Category::findOrfail($id);
        $products = Product::where('category_id', $category->id)->paginate(6);
        return view('User.categoryproducts', compact('category', 'products'));
    }

    public function allusers()
    {
        $users = User::all();
        return view('Admin.allusers', compact('users'));
    }

    public function showuser($id)
    {
        $user = User::findOrfail($id);
        return view('Admin.showuser', compact('user'));
    }


    public function all()
    {
        // $banners = Category::latest()->take(5)->get();
        $categories = Category::all();
        $products = Product::paginate(6);
        return view('User.home', compact('products', 'categories')); // نوديهم على الفيو
    }

    public function show($id)
    {
        $product = Product::findorfail($id);
        return view('User.show', compact('product'));
    }

    public function search(Request $request)
    {
        $key = $request->key;
        $from = $request->from;
        $products = Product::where('name', "like", "%$key%")
            ->orwhere('desc', "like", "%$key%")
            ->paginate(6);
        if ($from == 'home') {
            return view('User.home', compact('products'));
        }elseif($from == 'catpro'){
            return view('User.categoryproducts', compact('products'));
        }
    }

    //cart using sessions
    public function addtocart($id, Request $request)
    {


        $quantity = $request->quantity;
        $product = Product::findOrFail($id);
        $request->validate([
            'quantity' => "required|integer|min:1|max:$product->quantity",
        ]);

        // دا بيضمن إنه يرجع cart لو موجود، أو مصفوفة فاضية لو مش موجود
        $cart = session()->get('cart', []);

        // لو المنتج موجود بالفعل، نزود كميته
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $quantity;
            $cart[$id]['Total Price'] = $cart[$id]['quantity'] * $product->price;
        } else {
            // منتج جديد، نضيفه للكارت
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => $quantity,
                'Total Price' => $quantity * $product->price,
            ];
        }

        // نحفظ التعديلات في السيشن
        session()->put('cart', $cart);

        // لمتابعة التراكينج جرب تشوف الكارت بعد كل عملية
        // dd(session()->get('cart'));

        return back()->with('success', 'Product add to cart');
    }

    public function showcart()
    {

        $cart = session()->get('cart');
        if ($cart) {
            return view('User.mycart', compact('cart'));
        } else {
            return view('User.mycart')->with('empty', 'Your Cart Empty !');
        }
    }

    public function delete($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Item Removed Successfully');
    }

    //add to order and orderdetails
    public function makeorder(Request $request)
    {

        $day =  Carbon::now()->addDays(2)->format('Y-m-d');
        $user_id = Auth::user()->id;
        $products = session()->get('cart');

        //add to order
        $order = Order::create([
            'requireDate' => $day,
            'user_id' => $user_id
        ]);

        foreach ($products as $id => $item) {
            //add to details
            OrderDetails::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
        }

        $request->session()->forget('cart');
        session()->flash('success', 'Your Ordered make Successfully');
        return redirect(url('mycart'))->with("day", $day);
    }
}
