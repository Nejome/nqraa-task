<x-layout>
    <section>
        <div class="container mx-auto">
            <div class="px-4 py-5">
                <divl class="flex flex-col xl:flex-row justify-between">
                    <div class="flex items-center gap-4 flex-wrap">
                        <a href="/users">
                            <h1 class="text-xl border-l px-3 border-[#e7eaf1] text-[#34384d]">قائمة المستخدمين</h1>
                        </a>

                        <p class="text-[#9b9eb0]">
                            {{$users->count()}}
                            مستخدمين
                        </p>

                        <form method="get" action="/users">
                            <div class="text-[#b6bdd7] text-sm px-4 py-3 rounded-3xl w-11/12  lg:w-[450px] border bg-white flex gap-3">
                                <span><i class="fa-solid fa-magnifying-glass"></i></span>
                                <input type="text" name="name" placeholder="البحث بالأسم" class="outline-0 block w-full">
                            </div>
                        </form>
                    </div>
                    <div class="mt-5 lg:mt-0">
                        <a href="/users/create" class="flex items-center gap-3 bg-indigo-700 hover:bg-indigo-600 text-white px-3 py-2 rounded text-sm">
                            <i class="fa-solid fa-plus"></i>

                            <span>أضف مستخدم جديد</span>
                        </a>
                    </div>
                </divl>
            </div>
        </div>
    </section>

    <div class="container mx-auto">
        <div class="px-4 py-5">
            <x-alerts />
        </div>
    </div>

    <section>
        <div class="container mx-auto">
            <div class="px-4 py-2">
                <div class="bg-white border rounded-2xl px-6 py-6">
                    <div class="hidden lg:flex text-[#9599ac] bg-[#f8f9fb] px-4 py-4 border rounded-2xl">
                        <div class="w-3/12">إسم الموظف</div>
                        <div class="w-2/12">البريد الإلكتروني للموظف</div>
                        <div class="w-2/12">رقم الجوال</div>
                        <div class="w-2/12">قسم الموظف</div>
                        <div class="w-2/12">الحالة</div>
                        <div class="w-1/12">إجراء</div>
                    </div>

                    @foreach($users as $user)
                        <div class="flex text-[#8c8e91] px-4 py-4 mt-3  flex-wrap">
                            <div class="w-1/2 mb-2 lg:w-3/12">
                                <div class="flex gap-2">
                                    <div class="w-[50px] h-[50px] rounded-full overflow-hidden">
                                        <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" class="w-full h-full"/>
                                    </div>
                                    <div class="flex flex-col">
                                        <span>{{$user->name}}</span>
                                        <span class="text-[#bcc1d4]">{{$user->job}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="w-1/2 mb-2 lg:w-2/12">
                                {{$user->email}}
                            </div>
                            <div class="w-1/2 mb-2 lg:w-2/12">
                                {{$user->phone}}
                            </div>
                            <div class="w-1/2 mb-2 lg:w-2/12">
                                {{$user->job_department}}
                            </div>
                            <div class="w-1/2 mb-2 lg:w-1/12">
                                @if($user->active == 1)
                                    <a href="/users/{{$user->id}}/toggle-activity" class="block text-[#55d6b0] bg-[#def7f0] py-1 rounded-2xl text-center">نشط</a>
                                @else
                                    <a href="/users/{{$user->id}}/toggle-activity" class="block text-red-700 bg-red-100 py-1 rounded-2xl text-center">غير نشط</a>
                                @endif
                            </div>
                            <div class="w-1/2 mb-2 lg:w-2/12 flex justify-center gap-5">
                                <a href="/users/{{$user->id}}/edit" class="hover:text-yellow-600">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form method="post" action="/users/{{$user->id}}" class="inline-block">
                                    @csrf
                                    @method ('delete')
                                    <button type="submit" class="hover:text-red-600">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
</x-layout>
