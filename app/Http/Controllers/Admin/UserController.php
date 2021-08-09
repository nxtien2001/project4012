<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Amin\User\UpdateRequest;
use App\Http\Requests\Amin\User\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index()
    {
        $listUser = User::latest()->paginate(20);
        $listUser->load(['invoices']);
        if ($key = request()->keyword) {
            $listUser = User::latest()->where('name', 'like', '%' . $key . '%')->paginate(20);
            $listUser = User::latest()->where('email', 'like', '%' . $key . '%')->paginate(20);
        } else {
            $listUser = User::latest()->paginate(20);
        }
        return view('admin.users.index', [
            'data' => $listUser,
        ]);
    }
    public function show($id)
    {
        // https://laravel.com/docs/8.x/routing#route-model-binding
        $user =  User::find($id);
        return view('admin.users.show', compact('user'));
    }
    public function create()
    {
        if (!Gate::allows('create-user' == false)) {
            abort(403);
        }
        return view('admin.users.create');
    }
    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');
        $result = User::create($data);
        if ($request->ajax() == true) {
            return response()->json([
                'status' => 200,
                'message' => 'ok'
            ]);
        }
        return redirect()->route('admin.users.index', compact('result'));
    }
    public function edit($id)
    {
        $data = User::find($id);
        return view('admin.users.edit', compact('data'));
    }
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('_token');
        $user = User::find($id);
        $user->update($data);
        return redirect()->route('admin.users.index')->with('message', 'Update dữ liệu thành công');
    }
    public function delete($id)
    {
        $user = User::find($id)->delete();
        return redirect()->route('admin.users.index', compact('user'));
    }
}
