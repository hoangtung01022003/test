<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //gialam
    public function index(Request $request)
    {
        // lấy danh sách user, có phân trang và tìm kiếm
        $search = $request->input('search');
        // nếu có search thì lọc theo name hoặc email, nếu không thì lấy tất cả
        $users = User::when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%");
        })
            ->orderBy('id', 'desc')
            ->paginate(5);
        // trả về view list với dữ liệu users và search
        return view('crud_user.list', compact('users', 'search'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('crud_user.detail', compact('user'));
    }

    public function create()
    {
        // trả về form create
        return view('crud_user.register');
    }

    public function store(Request $request)
    {  // xu lý lưu user mới
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'nullable|max:20',
            'address' => 'nullable|max:255',
        ]);

        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        User::create($data);

        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        // trả về form edit
        $user = User::findOrFail($id);
        return view('crud_user.update', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // xử lý update user
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $data = $request->all();

        if (!empty($request->password)) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        // xử lý xóa user
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index');
    }
}
