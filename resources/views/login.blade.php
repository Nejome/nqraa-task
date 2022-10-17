<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body>
<div class="h-screen flex justify-center items-center">
    <div class="w-11/12 lg:w-2/5 bg-white border rounded px-5 py-4">
        <h1 class="text-center text-2xl text-[#3e4155]">تسجل الدخول</h1>
        <form method="post" action="/login" class="mt-10">
            @csrf
            @if(session()->has('danger'))
                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                    {{session()->get('danger')}}
                </div>
            @endif
            @csrf
            <div class="mt-3">
                <label class="text-[#626475] text-sm">البريد الإلكتروني</label>
                <input type="email" name="email" class="bg-[#f8f9fb] rounded px-3 py-2 w-full mt-1 border">
            </div>
            <div class="mt-3">
                <label class="text-[#626475] text-sm">كلمة المرور</label>
                <input type="password" name="password" class="bg-[#f8f9fb] rounded px-3 py-2 w-full mt-1 border">
            </div>
            <div class="mt-10 text-center">
                <button type="submit" class="bg-indigo-700 hover:bg-indigo-600 text-white px-3 py-2 rounded text-sm">تسجيل الدخول</button>
                <a href="/register" class="hover:underline text-xs block mt-2">ليس لديك حساب؟</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
