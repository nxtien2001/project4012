<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $pro = Product::count();
        $order = Invoice::count();
        $user = User::count();
        $total = 1500000;
        return view('admin.index', compact('pro', 'order', 'user', 'total'));
    }
}
