<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="min-h-screen flex flex-col items-center justify-center bg-[#f1ece7]">

    {{-- タイトル --}}
    <h1 class="text-2xl font-serif text-[#8b7e6a] mb-8">
        Register
    </h1>

    {{-- カード --}}
    <div class="bg-white w-[400px] p-10 shadow-md rounded">

        <form method="POST" action="/register">
            @csrf

            {{-- 名前 --}}
            <div class="mb-4">
                <label>名前</label>
                <input type="text" name="name" class="w-full border p-2 bg-gray-100">
            </div>

            {{-- メール --}}
            <div class="mb-4">
                <label>メールアドレス</label>
                <input type="email" name="email" class="w-full border p-2 bg-gray-100">
            </div>

            {{-- パスワード --}}
            <div class="mb-4">
                <label>パスワード</label>
                <input type="password" name="password" class="w-full border p-2 bg-gray-100">
            </div>

            {{-- 確認 --}}
            <div class="mb-6">
                <label>パスワード確認</label>
                <input type="password" name="password_confirmation" class="w-full border p-2 bg-gray-100">
            </div>

            <div class="text-center">
                <button class="bg-[#8b7e6a] text-white px-6 py-2">
                    登録
                </button>
            </div>
        </form>

    </div>
</div>
</body>
</html>

<!-- http://localhost/register -->