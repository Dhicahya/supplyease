<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('pages.user.index', compact('data'));
    }


    public function create()
    {
        return view('pages.user.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string|min:8',
            'image_path' => 'nullable|file',
            'role' => 'required|in:admin,staff',

        ]);

        if (@$data['image_path']) {
            $ext = $request->file('image_path')->getClientOriginalExtension();
            // save to storage
            $data['image_path'] = $request->file('image_path')->storeAs('public/profile', time() . Str::slug($request->nama) . '.' . $ext);
            $data['image_path'] = str_replace('public/', '', $data['image_path']);
        }

        $data['password'] = bcrypt($data['password']);

        User::create($data);
        return redirect()->route('user.index');
    }


    public function show(User $user)
    {
        //
    }


    public function edit(User $user)
    {
        return view('pages.user.update', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|string',
            'password' => 'nullable|string',
            'image_path' => 'nullable|file',
            'role' => 'required|in:admin,staff',
        ]);

        if ($data['password'] == '') {
            unset($data['password']);
        }

        if (@$data['image_path']) {
            $ext = $request->file('image_path')->getClientOriginalExtension();
            // save to storage
            $data['image_path'] = $request->file('image_path')->storeAs('public/profile', time() . Str::slug($request->nama) . '.' . $ext);
            $data['image_path'] = str_replace('public/', '', $data['image_path']);
        }


        $user->update($data);
        return redirect()->route('user.index');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }
}
