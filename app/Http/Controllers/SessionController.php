<?php

namespace App\Http\Controllers;

class SessionController extends Controller
{
    public function create()
    {
        return view('login');
    }

    public function store()
    {
        if(!auth()->attempt(request()->only(['email', 'password']))){
            return redirect()->back()->with('danger', 'عفواً قم بالتحقق من بيانات تسجيل الدخول الخاصة بك');
        }

        if(!auth()->user()->active){
            return redirect()->back()->with('danger', 'حسابك غير مفعل قم بمراجعة الادارة');
        }

        session()->regenerate();

        return redirect('/users');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/');
    }
}
