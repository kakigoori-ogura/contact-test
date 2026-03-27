<x-app-layout>
    {{-- ヘッダーエリア --}}
    <div class="bg-white border-b py-8 relative">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 flex justify-between items-center">
            {{-- ロゴとタイトル --}}
            <div class="flex-grow text-center">
                <h1 class="text-3xl font-serif text-[#8b7e6a] tracking-widest">FashionablyLate</h1>
                <h2 class="text-2xl font-serif mt-2 text-[#8b7e6a]">Admin</h2>
            </div>
            
            {{-- ログアウトボタン（右側に配置） --}}
            <form method="POST" action="/logout" class="">
                @csrf
                <button class="bg-white border border-[#8b7e6a] text-[#8b7e6a] px-5 py-1 text-sm hover:bg-[#8b7e6a] hover:text-white transition rounded-[2px] font-sans">
                    logout
                </button>
            </form>
        </div>
    </div>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- 検索エリア --}}
                    <div class="mb-8 p-6 bg-gray-100 rounded-lg">
                        <form action="{{ route('admin.contacts') }}" method="GET" class="flex flex-wrap gap-4 items-center justify-between">
                            <div class="flex flex-wrap gap-4">
                                {{-- お名前検索 --}}
                                <div>
                                    <input type="text" name="fullname" placeholder="お名前" class="block w-48 rounded-md border-gray-300 shadow-sm p-2 focus:border-[#8b7e6a] focus:ring-[#8b7e6a] placeholder-gray-400">
                                </div>

                                {{-- 性別検索 --}}
                                <div>
                                    <select name="gender" class="block w-48 rounded-md border-gray-300 shadow-sm focus:border-[#8b7e6a] focus:ring-[#8b7e6a] p-2 text-gray-500">
                                        <option value="">性別</option>
                                        <option value="1">男性</option>
                                        <option value="2">女性</option>
                                        <option value="3">その他</option>
                                    </select>
                                </div>

                                {{-- お問い合わせの種類 --}}
                                <div>
                                    <select name="category_id" class="block w-48 rounded-md border-gray-300 shadow-sm focus:border-[#8b7e6a] focus:ring-[#8b7e6a] p-2 text-gray-500">
                                        <option value="">お問い合わせの種類</option>
                                        <option value="1">1.商品のお届けについて</option>
                                        <option value="2">2.商品の交換について</option>
                                        <option value="3">3.商品トラブル</option>
                                        <option value="4">4.ショップへのお問い合わせ</option>
                                        <option value="5">5.その他</option>
                                    </select>
                                </div>

                                {{-- 年/月/日 --}}
                                <div>
                                    <input type="date" name="date" class="block w-48 rounded-md border-gray-300 shadow-sm p-2 text-gray-400 focus:border-[#8b7e6a] focus:ring-[#8b7e6a]">
                                </div>
                            </div>
                            
                            {{-- 検索・リセットボタン --}}
                            <div class="flex gap-2">
                                <button type="submit" class="bg-[#8b7e6a] text-white px-8 py-2 rounded-[5px] font-bold hover:bg-[#766a58]">
                                    検索
                                </button>
                                <button type="reset" class="bg-[#e0d8d0] text-[#8b7e6a] px-8 py-2 rounded-[5px] font-bold hover:bg-[#d6cdc4]">
                                    リセット
                                </button>
                            </div>
                        </form>
                    </div>

                    {{-- エクスポートとページネーション --}}
                    <div class="mb-4">
                        <div class="flex justify-between items-end mb-4">
                            <div>
                                <button class="bg-[#f2f0ed] text-[#8b7e6a] px-4 py-1 border border-[#8b7e6a] text-sm rounded-[2px] font-sans">
                                    エクスポート
                                </button>
                            </div>
                            <div>
                                {{ $contacts->links() }}
                            </div>
                        </div>
                    </div>

                    {{-- テーブル --}}
                    <table class="min-w-full divide-y divide-gray-200 border border-gray-200">
                        <thead class="bg-[#8b7e6a] text-white">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider">お名前</th>
                                <th class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider">性別</th>
                                <th class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider">メールアドレス</th>
                                <th class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider">お問い合わせ内容</th>
                                <th class="px-6 py-4 text-center text-sm font-bold text-white uppercase tracking-wider">詳細</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $contact->last_name }} {{ $contact->first_name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $contact->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ Str::limit($contact->detail, 20) }}
                                    </td>

                                    {{-- 詳細ボタン（text-centerで中央寄せ） --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-center" x-data="{ open: false }">
                                        <button @click="open = true" class="bg-white border border-[#8b7e6a] text-[#8b7e6a] px-5 py-1 text-sm rounded-[2px] font-sans hover:bg-[#8b7e6a] hover:text-white transition">
                                            詳細
                                        </button>

                                        {{-- モーダルの箱（中身はそのまま） --}}
                                        <div x-show="open" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50" x-cloak>
                                            <div class="bg-white p-12 rounded-lg shadow-xl max-w-2xl w-full relative" @click.away="open = false">
                                                <button @click="open = false" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 text-2xl font-bold">
                                                ×
                                                </button>
                                                <h3 class="text-lg font-bold mb-4 border-b pb-2">お問い合わせ詳細</h3>
                                                <div class="mt-4">
    <table class="w-full text-left border-separate border-spacing-y-7">
        {{-- お名前 --}}
        <tr>
            <th class="w-1/3 font-bold text-gray-700 align-top">お名前</th>
            <td class="text-gray-600">{{ $contact->last_name }}　{{ $contact->first_name }}</td>
        </tr>
        {{-- 性別 --}}
        <tr>
            <th class="font-bold text-gray-700 align-top">性別</th>
            <td class="text-gray-600">
                @if($contact->gender == 1) 男性 @elseif($contact->gender == 2) 女性 @else その他 @endif
            </td>
        </tr>
        {{-- メールアドレス --}}
        <tr>
            <th class="font-bold text-gray-700 align-top">メールアドレス</th>
            <td class="text-gray-600">{{ $contact->email }}</td>
        </tr>
        {{-- 電話番号 --}}
        <tr>
            <th class="font-bold text-gray-700 align-top">電話番号</th>
            <td class="text-gray-600">{{ $contact->tel }}</td>
        </tr>
        {{-- 住所 --}}
        <tr>
            <th class="font-bold text-gray-700 align-top">住所</th>
            <td class="text-gray-600">{{ $contact->address }}</td>
        </tr>
        {{-- 建物名 --}}
        <tr>
            <th class="font-bold text-gray-700">建物名</th>
            <td class="text-gray-600">{{ $contact->building }}</td>
        </tr>
        {{-- お問い合わせの種類 --}}
        <tr>
            <th class="font-bold text-gray-700 align-top">お問い合わせの種類</th>
            <td class="text-gray-600">
                @switch($contact->category_id)
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
        <tr>
            <th class="font-bold text-gray-700 align-top">お問い合わせ内容</th>
            <td class="text-gray-600 whitespace-normal leading-relaxed">
                {{ $contact->detail }}
            </td>
        </tr>
    </table>
{{-- 削除ボタンエリア --}}
<div class="mt-12 text-center">
    {{-- 本来はここで削除用のformを動かします --}}
    <button class="bg-[#bf4d4d] text-white px-10 py-2 rounded-[2px] hover:bg-[#a33c3c] transition shadow-sm">
        削除
    </button>
</div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>