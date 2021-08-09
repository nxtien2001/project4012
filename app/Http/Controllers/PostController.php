<?php

namespace App\Http\Controllers;

use App\Http\Requests\Amin\Posts\PostRequest;
use App\Http\Requests\Amin\Posts\PostUpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $post = Post::latest()->paginate(10);
        if ($key = request()->keyword) {
            $post = Post::latest()->where('name', 'like', '%' . $key . '%')->paginate(10);
        }
        return view('admin.post.index', compact('post'));
    }
    public function create()
    {
        return view('admin.post.create');
    }
    public function store(PostRequest $request)
    {
        $post = new Post();
        if ($request->hasFile('upload')) {
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $filenametostore = $filename . '_' . time() . '.' . $extension;
            $request->file('upload')->storeAs('public/upload', $filenametostore);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/upload/' . $filenametostore);
            $msg = 'Tải lên thành công';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileImage = time() . '.' . $ext;
            $file->move(public_path('upload/product'), $fileImage);
            $post->image = $fileImage;
        }
        $post =  Post::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->status,
            'image' => $fileImage,
            'description' => $request->description,
            'content' => $request->content,
        ]);
        return redirect()->route('admin.posts.index', compact('post'))->with('alert', 'Thêm dữ liệu thành công!');
    }
    public function edit($id)
    {
        $posts = Post::find($id);
        return view('admin.post.edit', compact('posts'));
    }
    public function update(PostUpdateRequest $request, $id)
    {
        $posts = new Post();
        if ($request->hasFile('upload')) {
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $filenametostore = $filename . '_' . time() . '.' . $extension;
            $request->file('upload')->storeAs('public/upload', $filenametostore);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/upload/' . $filenametostore);
            $msg = 'Tải lên thành công';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileImage = time() . '.' . $ext;
            $file->move(public_path('upload/product'), $fileImage);
            $posts->image = $fileImage;
        }
        Post::find($id)->update([
            'name' => $request->name,
            'image' => $fileImage,
            'slug' => Str::slug($request->name),
            'status' => $request->status,
            'description' => $request->description,
            'content' => $request->content,
        ]);
        return redirect()->route('admin.posts.index')->with('success', 'Cập nhật dữ liệu thành công!');
    }
    public function delete($id)
    {
        Post::find($id)->delete();
        return redirect()->route('admin.posts.index')->with('message', 'Xóa dữ liệu thành công!');
    }
    public function activePost($post_id)
    {
        DB::table('posts')->where('id', $post_id)->update(['status' => 0]);
        return redirect()->back()->with('actived', 'Đã ẩn bài viết!');
    }
    public function unactivePost($post_id)
    {
        DB::table('posts')->where('id', $post_id)->update(['status' => 1]);
        return redirect()->back()->with('active', 'Đã thêm vào bài viết nổi bật!');
    }
}
