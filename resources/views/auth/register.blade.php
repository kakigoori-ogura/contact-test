<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

    <body class="min-h-screen flex flex-col font-sans">
        {{-- ヘッダー --}}
        <header class="w-full flex justify-center items-center px-10 py-4 bg-white shadow-sm border-b relative">
        <h1 class="text-xl font-serif text-[#8b7e6a]">FashionablyLate</h1>
        <a href="/login" class="absolute right-10 text-sm bg-gray-100 px-4 py-1 text-[#8b7e6a] rounded hover:bg-[#8b7e6a] hover:text-white transition">login</a>
    </header>

    {{--  メインエリア  --}}
    <main class="flex-grow flex flex-col items-center justify-center bg-[#f1ece7] pb-20">
        {{-- タイトル --}}
        <h2 class="text-2xl text-[#8b7e6a] mt-10 mb-10 text-center font-serif">Register</h2>
        {{-- フォーム --}}
        <div class="bg-white w-[400px] p-10 shadow-md rounded">
            <form method="GET" action="/contact">
                @csrf

                {{-- 名前 --}}
                <div class="mb-4">
                    <label class="block text-sm text-[#8b7e6a] mb-1">お名前</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="w-full p-2 bg-gray-100 border-none outline-none" placeholder="例：山田太郎">
                </div>
                @error('name')
    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
@enderror

                {{-- メール --}}
                <div class="mb-4">
                    <label class="block text-sm text-[#8b7e6a] mb-1">メールアドレス</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="w-full p-2 bg-gray-100 border-none outline-none" placeholder="例：test@example.com">
                </div>

                {{-- パスワード --}}
                <div class="mb-6">
                    <label class="block text-sm text-[#8b7e6a] mb-1">パスワード</label>
                    <input type="password" name="password" class="w-full p-2 bg-gray-100 border-none outline-none" placeholder="例：coach-tech1106">
                </div>

                {{-- ボタン --}}
                <div class="mt-8 flex justify-center">
                    <button type="submit" class="bg-[#8b7e6a] text-white px-10 py-2 hover:opacity-90">
                        登録
                    </button>
                </div>
            </form>
    </div>
    </main>
</body>
</html>


<!-- http://localhost/login -->
