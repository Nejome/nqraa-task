<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::filter()->get();

        return view('users', compact(['users']));
    }

    public function create()
    {
        return view('create');
    }

    public function signup()
    {
        return view('signup');
    }

    public function store(UserRequest $request)
    {
        $user = User::create($request->validated());

        if(Auth::check()){
            return redirect('/users')->with('success', 'تم تسجيل المستخدم بنجاح');
        }

        Auth::loginUsingId($user->id);

        return redirect('/users');
    }

    public function edit(User $user)
    {
        return view('edit', compact(['user']));
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated());

        return redirect('/users')->with('warning', 'تم تعديل المستخدم بنجاح');
    }

    public function toggleActivity(User $user)
    {
        if($user->id == Auth::id()){
            return redirect()->back()->with('warning', 'عفواً لا يمكنك تعديل حالتك');
        }

        $user->update(['active' => $user->active == 1 ? 0 : 1]);

        return redirect()->back()->with('success', 'تم تعديل حالة المستخدم بنجاح');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back()->with('danger', 'تم حذف المستخدم بنجاح');
    }

}
