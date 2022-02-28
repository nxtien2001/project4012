<?php

namespace App\Http\Controllers;

use App\Http\Requests\Checkout\CheckoutRequest;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function index()
    {
        return view('pages.showcart');
    }
    public function AddCart($id)
    {
        $products = Product::find($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        } else {
            $cart[$id] = [
                // 'id' => $products->id,
                'name' => $products->name,
                'price' => $products->sale_price ? $products->sale_price : $products->price,
                'quantity' => 1,
                'image' => $products->image
            ];
        }
        session()->put('cart', $cart);
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }
    public function ShowCart()
    {
        $carts = session()->get('cart');
        return view('pages.showcart', compact('carts'));
    }
    public function UpdateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $carts = session()->get('cart');
            $carts[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cartComponent = view('pages.cart', compact('carts'))->render();
            return response()->json(['cart' => $cartComponent, 'code' => 200], 200);
        }
    }
    public function DeleteCart(Request $request)
    {
        if ($request->id) {
            $carts = session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cartComponent = view('pages.cart', compact('carts'))->render();
            return response()->json(['cart' => $cartComponent, 'code' => 200], 200);
        }
    }
    public function getFormPay()
    {
        $carts = session()->get('cart');
        return view('pages.checkout', compact('carts'));
    }
    public function getSaveInfo(CheckoutRequest $request)
    {
        $cart = Session::get('cart');
        // dd($cart);
        if (Auth::check()) {
            $invoice = new Invoice();
            $invoice->user_id = Auth::id();
            $invoice->phone = $request->phone;
            $invoice->address = $request->address;
            $invoice->note = $request->note;
            $invoice->save();

            foreach ($cart  as $product_id => $item) {
                $invoice_details = new InvoiceDetail();
                $invoice_details->invoice_id = $invoice->id;
                $invoice_details->product_id = $product_id;
                $invoice_details->quantity = $item['quantity'];
                $invoice_details->unit_price = $item['price'];
                $invoice_details->save();
            }

            Session::forget('cart');
            return redirect()->route('thanhcong');
        } else {
            return redirect()->route('login')->with('message', 'Bạn chưa đăng nhập');
        }
    }
    public function thanhcong()
    {
        return view('pages.order_success');
    }
}
