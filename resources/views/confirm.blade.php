<x-app-layout>
    <div class="max-w-4xl mx-auto py-12 px-6">
        {{-- タイトル --}}
        <div class="text-center mb-12">
            <h1 class="text-3xl font-serif text-[#8b7e6a] tracking-widest uppercase">FashionablyLate</h1>
            <h2 class="text-2xl font-serif mt-4 text-[#8b7e6a]">Confirm</h2>
        </div>

        {{-- 確認テーブル --}}
        <div class="bg-white shadow-sm border border-gray-200">
            <table class="w-full text-left border-collapse">
                {{-- お名前 --}}
                <tr class="border-b border-gray-200">
                    <th class="w-1/3 bg-[#b2a191] text-white p-4 font-bold">お名前</th>
                    <td class="p-4 text-gray-700">
                        {{ $contact['last_name'] }}　{{ $contact['first_name'] }}
                    </td>
                </tr>
                
                {{-- 性別 --}}
                <tr class="border-b border-gray-200">
                    <th class="bg-[#b2a191] text-white p-4 font-bold">性別</th>
                    <td class="p-4 text-gray-700">
                        {{-- 1:男性, 2:女性, 3:その他 を文字に変換 --}}
                        @if($contact['gender'] == 1) 男性 @elseif($contact['gender'] == 2) 女性 @else その他 @endif
                    </td>
                </tr>

                {{-- メールアドレス --}}
                <tr class="border-b border-gray-200">
                    <th class="bg-[#b2a191] text-white p-4 font-bold">メールアドレス</th>
                    <td class="p-4 text-gray-700">{{ $contact['email'] }}</td>
                </tr>

                {{-- 電話番号 --}}
                <tr class="border-b border-gray-200">
                    <th class="bg-[#b2a191] text-white p-4 font-bold">電話番号</th>
                    <td class="p-4 text-gray-700">
                        {{ $contact['tel_1'] }}{{ $contact['tel_2'] }}{{ $contact['tel_3'] }}
                    </td>
                </tr>

                {{-- 住所の行 --}}
<tr class="border-b border-gray-200">
    <th class="bg-[#b2a191] text-white p-4 font-bold">住所</th>
    <td class="p-4 text-gray-700">
        {{ $contact['address'] }}
    </td>
</tr>

{{-- 建物名の行 --}}
<tr class="border-b border-gray-200">
    <th class="bg-[#b2a191] text-white p-4 font-bold">建物名</th>
    <td class="p-4 text-gray-700">
        {{ $contact['building'] }}
    </td>
</tr>

{{-- お問い合わせの種類 --}}
<tr class="border-b border-gray-200">
    <th class="bg-[#b2a191] text-white p-4 font-bold">お問い合わせの種類</th>
    <td class="p-4 text-gray-700">
    @switch($contact['category_id'])
        @case(1) 商品のお届けについて @break
        @case(2) 商品の交換について @break
        @case(3) 商品トラブル @break
        @case(4) ショップへのお問い合わせ @break
        @case(5) その他 @break
        @default 不明
    @endswitch
    </td>
</tr>

                {{-- お問い合わせ内容 --}}
                <tr class="border-b border-gray-200">
                    <th class="bg-[#b2a191] text-white p-4 font-bold">お問い合わせ内容</th>
                    <td class="p-4 text-gray-700">{{ $contact['detail'] }}</td>
                </tr>
            </table>
        </div>

        {{-- ボタンエリア --}}
        <form action="{{ route('thanks') }}" method="get">
            <button class="bg-[#8b7e6a] text-white px-12 py-2 font-bold hover:opacity-90">送信</button>
        </form>
            {{-- 入力画面に戻るリンク --}}
            <a href="#" onclick="history.back()" class="text-[#8b7e6a] underline pt-2">修正</a>
        </div>
    </div>
</x-app-layout>