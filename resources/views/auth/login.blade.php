<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

    <body class="min-h-screen flex flex-col font-sans">
        {{-- ヘッダー --}}
        <header class="w-full flex justify-center items-center px-10 py-4 bg-white shadow-sm border-b relative">
        <h1 class="text-xl font-serif text-[#8b7e6a]">FashionablyLate</h1>
        <a href="/register" class="absolute right-10 text-sm bg-gray-100 px-4 py-1 text-[#8b7e6a] rounded hover:bg-[#8b7e6a] hover:text-white transition">register</a>
    </header>

    {{--  メインエリア  --}}
    <main class="flex-grow flex flex-col items-center justify-center bg-[#f1ece7] pb-20">
        {{-- タイトル --}}
        <h2 class="text-2xl text-[#8b7e6a] mt-10 mb-10 text-center font-serif">Login</h2>
        {{-- フォーム --}}
        <div class="bg-white w-[400px] p-10 shadow-md rounded">
            <form method="POST" action="/login">
                @csrf

                {{-- メール --}}
                <div class="mb-4">
                    <label class="block text-sm text-[#8b7e6a] mb-1">メールアドレス</label>
                    <input type="email" name="email" class="w-full p-2 bg-gray-100 border-none outline-none" placeholder="例：test@example.com">
                </div>

                {{-- パスワード --}}
                <div class="mb-6">
                    <label class="block text-sm text-[#8b7e6a] mb-1">パスワード</label>
                    <input type="password" name="password" class="w-full p-2 bg-gray-100 border-none outline-none" placeholder="例：coach-tech1106">
                </div>

                {{-- ボタン --}}
                <div class="mt-8 flex justify-center">
                    <button class="bg-[#8b7e6a] text-white px-10 py-2 hover:opacity-90">
                        ログイン
                    </button>
                </div>
            </form>
            @if ($errors->any())
    <div class="text-red-500 mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    </div>
    </main>
</body>
</html>


<!-- http://localhost/login -->
