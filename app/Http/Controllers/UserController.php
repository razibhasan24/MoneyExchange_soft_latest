<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id','DESC')->paginate(10);
        return view('pages.users.index', compact('users'));
    }

    public function create()
    {

        return view('pages.users.create', [
            'mode' => 'create',
            'user' => new User(),

        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        User::create($data);
        return redirect()->route('users.index')->with('success', 'Successfully created!');
    }

    public function show(User $user)
    {
        return view('pages.users.view', compact('user'));
    }

    public function edit(User $user)
    {

        return view('pages.users.edit', [
            'mode' => 'edit',
            'user' => $user,

        ]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        $user->update($data);
        return redirect()->route('users.index')->with('success', 'Successfully updated!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Successfully deleted!');
    }
}