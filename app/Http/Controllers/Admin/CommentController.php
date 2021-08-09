<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::latest()->paginate(10);
        return view('admin.comment.index', compact('comments'));
    }
    public function delete($id)
    {
        Comment::find($id)->delete();
        return redirect()->route('admin.comments.index')->with('message', 'Xóa dữ liệu thành công!');
    }
}
