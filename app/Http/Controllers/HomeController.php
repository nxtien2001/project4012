<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $post = Post::where('status', 1)->orderBy('id', 'DESC')->take(3)->get();
        $newProducts = Product::limit(6)->orderBy('id', 'DESC')->get(); //sp mới
        $topProducts = Product::where('status', 1)->limit(6)->orderBy('id', 'ASC')->get(); //nổi bật
        $sale_products = Product::where('sale_price', '>', 0)->limit(6)->orderBy('id', 'DESC')->get(); //giảm giá
        return view('welcome', compact('topProducts', 'newProducts', 'sale_products', 'post'));
    }
    public function getSearch(Request $request)
    {
        // $products = Product::limit(20)->orderBy('id', 'DESC')->get();
        // if ($key = request()->key) {
        //     $products = Product::latest()->where('name', 'like', '%' . $key . '%')->paginate(8);
        // }
        $products = Product::where('name', 'like', "%" . $request->key . "%");
        if ($request->has('order_by') && $request->order_by > 0) {
            if ($request->order_by == 1) {
                $products = $products->orderByDesc('id');
            } else if ($request->order_by == 2) {
                $products = $products->orderBy('price');
            } else if ($request->order_by == 3) {
                $products = $products->orderByDesc('price');
            } else if ($request->order_by == 4) {
                $products = $products->orderBy('quantity');
            } else {
                $products = $products->orderByDesc('quantity');
            }
        }
        $products = $products->latest()->paginate(8);

        return view('pages.search', compact('products'));
    }
    public function category($slug, $id)
    {
        $category = Category::where('slug', $slug)->first();
        $product = Product::where('category_id', $category->id)->paginate(8);
        $category->load('childrent');
        return view('pages.category', compact('category', 'product'));
    }
    public function detail($slug, $id)
    {
        // dd($id);
        $cmt = Comment::where('product_id', $id)->get();
        $product = Product::find($id);
        $product->load(['attributes']);
        $category_id = $product->category_id;
        $related = Product::where('category_id', $category_id)->where('id', '!=', $id)->get();
        return view('pages.detail', compact('product', 'cmt', 'related'));
    }
    public function postComment(Request $request, $slug, $id)
    {
        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->content = $request->content;
        $comment->product_id = $id;
        $comment->save();
        return redirect()->back();
    }
    public function cart()
    {
        return view('pages.order');
    }
    public function post($slug)
    {
        $postdetail = Post::where('slug', $slug)->first();
        $postdetail->update([
            'view' => $postdetail->view + 1
        ]);
        return view('pages.blog-details', compact('postdetail'));
    }
}
