<x-app-layout>
    <div class="text-center py-8 bg-white border-b">
            <h1 class="text-3xl font-serif text-[#8b7e6a] tracking-widest">FashionablyLate</h1>
            <h2 class="text-2xl font-serif mt-4 text-[#8b7e6a]">Admin</h2>
    </div>

    <form method="POST" action="/logout" class="absolute top-4 right-6">
        @csrf
        <button class="text-sm text-[#8b7e6a] underline">
            ログアウト
        </button>
    </form>

    <div class="py-12 bg-gray-50">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-8 p-6 bg-gray-100 rounded-lg">
    <form action="{{ route('admin.contacts') }}" method="GET" class="flex flex-wrap gap-4 items-end">
        {{-- お名前検索 --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">お名前</label>
            <input type="text" name="fullname" class="mt-1 block w-48 rounded-md border-gray-300 shadow-sm p-2 focus:border-indigo-500 focus:ring-indigo-500">
        </div>

        {{-- 性別検索 --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">性別</label>
            <select name="gender" class="mt-1 block w-48 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2">
                <option value="">全て</option>
                <option value="1">男性</option>
                <option value="2">女性</option>
                <option value="3">その他</option>
            </select>
        </div>
{{-- お問い合わせの種類 --}}
<div>
    <label class="block text-sm font-medium text-gray-700">お問い合わせの種類</label>
    <select name="category_id" class="mt-1 block w-48 rounded-md border-gray-300 shadow-sm p-2">
        <option value="">選択してください</option>
        <option value="1">1.商品のお届けについて</option>
        <option value="2">2.商品の交換について</option>
        <option value="3">3.商品トラブル</option>
        <option value="4">4.ショップへのお問い合わせ</option>
        <option value="5">5.その他</option>
    </select>
</div>

{{-- 年/月/日 --}}
<div>
    <label class="block text-sm font-medium text-gray-700">年/月/日</label>
    <input type="date" name="date" class="mt-1 block w-48 rounded-md border-gray-300 shadow-sm p-2">
</div>
        {{-- 検索ボタン --}}
        <div>
            <button type="submit" class="bg-[#8b7e6a] text-white px-8 py-2 rounded-[5px] font-bold">
    検索
</button>
<button type="reset" class="bg-[#e0d8d0] text-[#8b7e6a] px-8 py-2 rounded-[5px] font-bold ml-2">
    リセット
</button>
        </div>
    </form>
</div>
<div class="mb-4">
    <div class="flex justify-between items-end mb-4">
        <div>
        <button class="bg-[#f2f0ed] text-[#8b7e6a] px-4 py-1 border border-[#8b7e6a] text-sm">
            エクスポート
        </button>
    </div>
    <div>
        {{ $contacts->links() }}
    </div>
</div>
</div>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-[#8b7e6a] text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-bold text-white uppercase tracking-wider">お名前</th>
                                <th class="px-6 py-3 text-left text-sm font-bold text-white uppercase tracking-wider">性別</th>
                                <th class="px-6 py-3 text-left text-sm font-bold text-white uppercase tracking-wider">メールアドレス</th>
                                <th class="px-6 py-3 text-left text-sm font-bold text-white uppercase tracking-wider">お問い合わせ内容</th>
                                <th class="px-6 py-3 text-left text-sm font-bold text-white uppercase tracking-wider">詳細</th>
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

            {{-- 詳細ボタンとモーダルは、必ずこの <td> の中に入れます --}}
            <td class="px-6 py-4 whitespace-nowrap" x-data="{ open: false }">
                <button @click="open = true" class="text-blue-600 hover:text-blue-900 font-bold underline">
                    詳細
                </button>

                {{-- モーダルの箱 --}}
                <div x-show="open" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50" x-cloak>
                    <div class="bg-white p-8 rounded-lg shadow-xl max-w-lg w-full" @click.away="open = false">
                        <h3 class="text-lg font-bold mb-4 border-b pb-2">お問い合わせ詳細</h3>
                        
                        <div class="space-y-4 text-left whitespace-normal">
                            <p><strong>お名前:</strong> {{ $contact->last_name }} {{ $contact->first_name }}</p>
                            <p><strong>メール:</strong> {{ $contact->email }}</p>
                            <p><strong>内容:</strong><br>{{ $contact->detail }}</p>
                        </div>

                        <div class="mt-8 text-center">
                            <button @click="open = false" class="bg-[#8b7e6a] text-white px-6 py-2 rounded hover:bg-[#766a58]">
                                閉じる
                            </button>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
</tbody>
                    </table>
                    <div class="mt-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>