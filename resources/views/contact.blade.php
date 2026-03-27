<x-app-layout>
    <div class="max-w-4xl mx-auto px-6 py-12 bg-white">
        <div class="text-center mb-12">
            <h1 class="text-3xl font-serif text-[#8b7e6a] tracking-widest">FashionablyLate</h1>
            <h2 class="text-2xl font-serif mt-6 text-[#8b7e6a]">Contact</h2>
        </div>

        <form action="/contact/confirm" method="POST">
            @csrf

            {{-- お名前 --}}
            <div class="flex items-center mb-6">
                <div class="w-1/3">
                    <label class="block text-gray-700 font-bold">お名前 <span class="text-red-500">※</span></label>
                </div>
                <div class="w-2/3">
                    <div class="flex gap-4 mb-2">
                        <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="例: 山田" class="w-1/2 border-gray-300 rounded-md shadow-sm p-2">
                        <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="例: 太郎" class="w-1/2 border-gray-300 rounded-md shadow-sm p-2">
                    </div>
                    @if ($errors->has('last_name'))
                        <p class="text-red-500 text-sm">{{ $errors->first('last_name') }}</p>
                    @elseif ($errors->has('first_name'))
                        <p class="text-red-500 text-sm">{{ $errors->first('first_name') }}</p>
                    @endif
                </div>
            </div>

            {{-- 性別 --}}
            <div class="flex items-center mb-6">
                <div class="w-1/3">
                    <label class="block text-gray-700 font-bold">性別 <span class="text-red-500">※</span></label>
                </div>
                <div class="w-2/3">
                    <div class="flex gap-8 mb-2">
                        <label class="flex items-center">
                            <input type="radio" name="gender" value="1" {{ old('gender') == '1' ? 'checked' : '' }} class="mr-2"> 男性
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }} class="mr-2"> 女性
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="gender" value="3" {{ old('gender') == '3' ? 'checked' : '' }} class="mr-2"> その他
                        </label>
                    </div>
                    @error('gender')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- メールアドレス --}}
            <div class="flex items-center mb-6">
                <div class="w-1/3">
                    <label class="block text-gray-700 font-bold">メールアドレス <span class="text-red-500">※</span></label>
                </div>
                <div class="w-2/3">
                    <input type="text" name="email" value="{{ old('email') }}" placeholder="例: test@example.com" class="w-full border-gray-300 rounded-md shadow-sm p-2">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- 電話番号 --}}
            <div class="flex items-center mb-6">
                <div class="w-1/3">
                    <label class="block text-gray-700 font-bold">電話番号 <span class="text-red-500">※</span></label>
                </div>
                <div class="w-2/3">
                    <div class="flex items-center gap-2 mb-2">
                        <input type="text" name="tel_1" value="{{ old('tel_1') }}" placeholder="080" class="w-1/3 border-gray-300 rounded-md shadow-sm p-2">
                        <span>-</span>
                        <input type="text" name="tel_2" value="{{ old('tel_2') }}" placeholder="1234" class="w-1/3 border-gray-300 rounded-md shadow-sm p-2">
                        <span>-</span>
                        <input type="text" name="tel_3" value="{{ old('tel_3') }}" placeholder="5678" class="w-1/3 border-gray-300 rounded-md shadow-sm p-2">
                    </div>
                    @error('tel')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- 住所 --}}
            <div class="flex items-center mb-6">
                <div class="w-1/3">
                    <label class="block text-gray-700 font-bold">住所 <span class="text-red-500">※</span></label>
                </div>
                <div class="w-2/3">
                    <input type="text" name="address" value="{{ old('address') }}" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" class="w-full border-gray-300 rounded-md shadow-sm p-2">
                    @error('address')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- 建物名 --}}
            <div class="flex items-center mb-6">
                <div class="w-1/3">
                    <label class="block text-gray-700 font-bold">建物名</label>
                </div>
                <div class="w-2/3">
                    <input type="text" name="building" value="{{ old('building') }}" placeholder="例: 千駄ヶ谷マンション101" class="w-full border-gray-300 rounded-md shadow-sm p-2">
                </div>
            </div>

            {{-- お問い合わせの種類 --}}
            <div class="flex items-center mb-6">
                <div class="w-1/3">
                    <label class="block text-gray-700 font-bold">お問い合わせの種類 <span class="text-red-500">※</span></label>
                </div>
                <div class="w-2/3">
                    <select name="category_id" class="w-full border-gray-300 rounded-md shadow-sm p-2 bg-white">
                        <option value="">選択してください</option>
                        <option value="1" {{ old('category_id') == '1' ? 'selected' : '' }}>商品のお届けについて</option>
                        <option value="2" {{ old('category_id') == '2' ? 'selected' : '' }}>商品の交換について</option>
                        <option value="3" {{ old('category_id') == '3' ? 'selected' : '' }}>商品トラブル</option>
                        <option value="4" {{ old('category_id') == '4' ? 'selected' : '' }}>ショップへのお問い合わせ</option>
                        <option value="5" {{ old('category_id') == '5' ? 'selected' : '' }}>その他</option>
                    </select>
                    @error('category_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- お問い合わせ内容 --}}
            <div class="flex items-start mb-6">
                <div class="w-1/3 pt-2">
                    <label class="block text-gray-700 font-bold">お問い合わせ内容 <span class="text-red-500">※</span></label>
                </div>
                <div class="w-2/3">
                    <textarea name="detail" rows="5" placeholder="お問い合わせ内容をご記載ください" class="w-full border-gray-300 rounded-md shadow-sm p-2">{{ old('detail') }}</textarea>
                    @error('detail')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="text-center mt-10">
                <button type="submit" class="bg-[#8b7e6a] text-white px-12 py-3 rounded-md font-bold text-lg hover:opacity-90">
                    確認画面
                </button>
            </div>
        </form>
    </div>
</x-app-layout>