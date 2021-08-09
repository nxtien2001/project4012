<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCateRequest;
use App\Http\Requests\Category\UpdateCateRequest;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $cateChildrent = Category::where('parent_id', 0)->orderBy('id', 'DESC')->get();
        $listCategory = Category::latest()->paginate(10);
        if ($key = request()->keyword) {
            $listCategory = Category::latest()->where('name', 'like', '%' . $key . '%')->paginate(10);
        }
        return view('/admin/category/index', [
            'data' => $listCategory,
            'cateChildrent' => $cateChildrent
        ]);
    }
    public function create()
    {
        $category = Category::where('parent_id', 0)->get();
        return view('admin.category.create', compact('category'));
    }
    public function store(StoreCateRequest $request)
    {
        Category::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->route('admin.categories.index')->with('alert', 'Thêm dữ liệu thành công!');
    }
    public function edit($id)
    {
        $data = Category::find($id);
        return view('admin.category.edit', compact('data'));
    }
    public function update(UpdateCateRequest $request, $id)
    {
        $categories = new Category();
        Category::find($id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'parent_id' => $request->parent_id
        ]);
        return redirect()->route('admin.categories.index', compact('categories'))->with('success', 'Cập nhật dữ liệu thành công!');
    }
    public function delete($id)
    {
        $cate = Category::find($id);
        $cate->childrent()->delete($id);
        $cate->delete($id);
        return redirect()->route('admin.categories.index', compact('cate'))->with('message', 'Xóa dữ liệu thành công!');
    }
}
