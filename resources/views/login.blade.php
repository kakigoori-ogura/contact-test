<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <div class="min-h-screen flex flex-col items-center justify-center bg-[#f1ece7]">
        
        {{-- ヘッダー --}}
        <div class="w-full flex justify-between items-center px-10 py-4 bg-white shadow">
            <h1 class="text-xl font-serif text-[#8b7e6a]">FashionablyLate</h1>
            <a href="/register" class="text-sm border px-4 py-1 text-[#8b7e6a]">register</a>
        </div>

        {{-- タイトル --}}
        <h2 class="text-2xl text-[#8b7e6a] mt-10 mb-6">Login</h2>

        {{-- フォーム --}}
        <div class="bg-white w-[400px] p-10 shadow-md rounded">
            <form method="POST" action="/login">
                @csrf

                {{-- メール --}}
                <div class="mb-4">
                    <label class="block text-sm text-gray-600 mb-1">メールアドレス</label>
                    <input type="email" name="email" class="w-full border p-2 bg-gray-100">
                </div>

                {{-- パスワード --}}
                <div class="mb-6">
                    <label class="block text-sm text-gray-600 mb-1">パスワード</label>
                    <input type="password" name="password" class="w-full border p-2 bg-gray-100">
                </div>

                {{-- ボタン --}}
                <div class="text-center">
                    <button class="bg-[#8b7e6a] text-white px-6 py-2 hover:opacity-90">
                        ログイン
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>