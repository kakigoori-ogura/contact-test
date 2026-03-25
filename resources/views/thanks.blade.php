<x-app-layout>
    <div class="flex flex-col items-center justify-center h-screen bg-white">
        
        {{-- 背景の薄いThank you --}}
        <h1 class="text-[120px] text-gray-200 absolute opacity-20">
            Thank you
        </h1>

        {{-- メインメッセージ --}}
        <p class="text-lg text-gray-600 mb-6 z-10">
            お問い合わせありがとうございました
        </p>

        {{-- HOMEボタン --}}
        <a href="/" class="bg-[#8b7e6a] text-white px-6 py-2 z-10 hover:opacity-90">
            HOME
        </a>

    </div>
</x-app-layout>