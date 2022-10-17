<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body>

<header class="bg-white">
    <div class="container mx-auto">
        <div class="px-4 py-5">
            <div class="flex justify-between">
                <p class="text-[#626475]">{{auth()->user()->name}}</p>

                <a href="/logout" class="flex items-center gap-2 hover:text-red-600">
                    تسجيل الخروج
                    <i class="fa-solid fa-right-from-bracket"></i>
                </a>
            </div>
        </div>
    </div>
</header>

{{$slot}}

<script src="https://kit.fontawesome.com/1efc283d1a.js" crossorigin="anonymous"></script>
</body>
</html>
