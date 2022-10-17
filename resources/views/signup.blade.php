<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body>
<div class="h-screen flex justify-center items-center">
    <div class="w-11/12 lg:w-7/12 bg-white border rounded px-5 py-4">
        <h1 class="text-center text-2xl text-[#3e4155] mt-10">انشاء حساب</h1>
        <form method="post" action="/register" class="mt-10">
            @csrf
            @if(session()->has('danger'))
                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                    {{session()->get('danger')}}
                </div>
            @endif
                <div class="grid grid-cols-6 gap-4">
                    <div class="col-span-6 sm:col-span-3 mt-3">
                        <label class="text-[#626475] text-sm">الإسم</label>
                        <input type="text" name="name" value="{{old('name')}}" class="bg-[#f8f9fb] rounded px-3 py-2 w-full mt-1 border">
                        <p class="text-red-600">{{$errors->first('name')}}</p>
                    </div>
                    <div class="col-span-6 sm:col-span-3 mt-3">
                        <label class="text-[#626475] text-sm">البريد الإلكتروني</label>
                        <input type="email" name="email" value="{{old('email')}}" class="bg-[#f8f9fb] rounded px-3 py-2 w-full mt-1 border">
                        <p class="text-red-600">{{$errors->first('email')}}</p>
                    </div>
                    <div class="col-span-6 sm:col-span-3 mt-3">
                        <label class="text-[#626475] text-sm">الوظيفة</label>
                        <input type="text" name="job" value="{{old('job')}}" class="bg-[#f8f9fb] rounded px-3 py-2 w-full mt-1 border">
                        <p class="text-red-600">{{$errors->first('job')}}</p>
                    </div>
                    <div class="col-span-6 sm:col-span-3 mt-3">
                        <label class="text-[#626475] text-sm">قسم الوظيفة</label>
                        <input type="text" name="job_department" value="{{old('job_department')}}" class="bg-[#f8f9fb] rounded px-3 py-2 w-full mt-1 border">
                        <p class="text-red-600">{{$errors->first('job_department')}}</p>
                    </div>
                    <div class="col-span-6 sm:col-span-3 mt-3">
                        <label class="text-[#626475] text-sm">رقم الجوال</label>
                        <input type="text" name="phone" value="{{old('phone')}}" class="bg-[#f8f9fb] rounded px-3 py-2 w-full mt-1 border">
                        <p class="text-red-600">{{$errors->first('phone')}}</p>
                    </div>
                    <div class="col-span-6 mt-3">
                        <hr />
                    </div>
                    <div class="col-span-6 sm:col-span-3 mt-3">
                        <label class="text-[#626475] text-sm">كلمة المرور</label>
                        <input type="password" name="password" class="bg-[#f8f9fb] rounded px-3 py-2 w-full mt-1 border">
                        <p class="text-red-600">{{$errors->first('password')}}</p>
                    </div>
                    <div class="col-span-6 sm:col-span-3 mt-3">
                        <label class="text-[#626475] text-sm">تأكيد كلمة المرور</label>
                        <input type="password" name="password_confirmation" class="bg-[#f8f9fb] rounded px-3 py-2 w-full mt-1 border">
                    </div>
                </div>
            <div class="mt-10 text-center">
                <button type="submit" class="bg-indigo-700 hover:bg-indigo-600 text-white px-3 py-2 rounded text-sm">تسجيل</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
