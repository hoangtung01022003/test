<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
      public function index()
    {
        // hiển thị danh sách user
    }

    public function show($id)
    {
        // xem chi tiết user
    }

    public function create()
    {
        // trả về form create
    }

    public function store(Request $request)
    {
        // xử lý lưu user
    }

    public function edit($id)
    {
        // trả về form edit
    }

    public function update(Request $request, $id)
    {
        // xử lý update user
    }

    public function destroy($id)
    {
        // xóa user
    }
}
