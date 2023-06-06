@extends('layout.base.app')

@section('content')
    <div class="grid grid-cols-2 gap-4">
        <h2 class="col-span-full mt-2 text-xl font-bold">Top Stories for you</h2>

        {{-- Genres --}}
        <div class="col-span-full flex gap-3 text-[15px] overflow-x-auto scrollbar-hide">
            @unless($categories->count() < 1)
                <a href="#"
                   class="px-4 py-1 shadow-[0_2px_20px_0_#0000000A] rounded-full whitespace-nowrap bg-primary text-white">
                    All
                </a>
            @endunless
            @foreach($categories as $category)
                <a href="{{ route('home.posts-by-cate', $category->slug) }}"
                   class="px-4 py-1 shadow-[0_2px_20px_0_#0000000A] bg-white rounded-full whitespace-nowrap">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>

        @forelse($posts as $post)
            @if ($loop->first)
                <div class="col-span-full bg-white p-4 gap-12 flex shadow-[0_2px_20px_0_#0000000A]">
                    <div class="flex flex-col justify-between pl-2 max-w-full lg:w-[calc(100%-14rem)] gap-4">
                        <div>
                            <a href="{{ route('home.detail-test', $post->id) }}"
                               class="block font-medium text-[17px] truncate">
                                {{ $post->title }}
                            </a>
                            <p class="opacity-60 line-clamp-3 mt-2">
                                {{ $post->description }}
                            </p>
                        </div>
                        <div class="flex items-center justify-between text-xs gap-16">
                            <div class="flex items-center opacity-40 gap-2">
                                <span class="whitespace-nowrap">{{ $post->user->name }}</span>
                                •
                                <span class="whitespace-nowrap">{{ $post->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="flex items-center gap-5">
                                <a href="#" class="flex items-center gap-2 text-[#0768B5]">
                                    <svg viewBox="0 0 24 24" class="w-5 h-5" fill="currentColor">
                                        <path d="M11 15h2V9h3l-4-5-4 5h3z"></path>
                                        <path
                                            d="M20 18H4v-7H2v7c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2v-7h-2v7z"></path>
                                    </svg>
                                    <span class="hidden sm:inline">Share</span>
                                </a>
                                <a href="#" class="flex items-center gap-2 text-[#0768B5]">
                                    <svg viewBox="0 0 24 24" class="w-5 h-5" fill="currentColor">
                                        <path
                                            d="M20.995 6.9a.998.998 0 0 0-.548-.795l-8-4a1 1 0 0 0-.895 0l-8 4a1.002 1.002 0 0 0-.547.795c-.011.107-.961 10.767 8.589 15.014a.987.987 0 0 0 .812 0c9.55-4.247 8.6-14.906 8.589-15.014zM12 19.897C5.231 16.625 4.911 9.642 4.966 7.635L12 4.118l7.029 3.515c.037 1.989-.328 9.018-7.029 12.264z"></path>
                                        <path
                                            d="m11 12.586-2.293-2.293-1.414 1.414L11 15.414l5.707-5.707-1.414-1.414z"></path>
                                    </svg>
                                    <span class="whitespace-nowrap hidden sm:inline">Read Later</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <img class="w-44 object-cover rounded hidden lg:block" src="{{ $post->image }}"
                         alt="Samsung">
                </div>
            @else
                <div
                    class="col-span-full lg:col-span-1 bg-white p-4 shadow-[0_2px_20px_0_#0000000A] flex flex-col justify-between">
                    <div class="flex justify-between">
                        <div class="flex flex-col pl-2 max-w-[calc(100%-9rem)] lg:max-w-[calc(100%-11rem)]">
                            <a href="{{ route('home.detail-test', $post->id) }}"
                               class="font-medium text-[17px] line-clamp-2">
                                {{ $post->title }}
                            </a>
                            <p class="opacity-60 line-clamp-3 mt-2">
                                {{ $post->description }}
                            </p>
                        </div>
                        <img class="w-32 object-cover rounded" src="{{ $post->image }}" alt="Samsung">
                    </div>
                    <div class="flex items-center justify-between mt-4 pl-2 text-xs gap-4">
                        <div class="flex items-center opacity-40 gap-2">
                            <span class="whitespace-nowrap">{{ $post->user->name }}</span>
                            •
                            <span class="whitespace-nowrap">{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="flex items-center gap-5">
                            <a href="#" class="flex items-center gap-2 text-[#0768B5]">
                                <svg viewBox="0 0 24 24" class="w-5 h-5" fill="currentColor">
                                    <path d="M11 15h2V9h3l-4-5-4 5h3z"></path>
                                    <path
                                        d="M20 18H4v-7H2v7c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2v-7h-2v7z"></path>
                                </svg>
                                <span class="whitespace-nowrap hidden sm:max-lg:block 2xl:block">Share</span>
                            </a>
                            <a href="#" class="flex items-center gap-2 text-[#0768B5]">
                                <svg viewBox="0 0 24 24" class="w-5 h-5" fill="currentColor">
                                    <path
                                        d="M20.995 6.9a.998.998 0 0 0-.548-.795l-8-4a1 1 0 0 0-.895 0l-8 4a1.002 1.002 0 0 0-.547.795c-.011.107-.961 10.767 8.589 15.014a.987.987 0 0 0 .812 0c9.55-4.247 8.6-14.906 8.589-15.014zM12 19.897C5.231 16.625 4.911 9.642 4.966 7.635L12 4.118l7.029 3.515c.037 1.989-.328 9.018-7.029 12.264z"></path>
                                    <path
                                        d="m11 12.586-2.293-2.293-1.414 1.414L11 15.414l5.707-5.707-1.414-1.414z"></path>
                                </svg>
                                <span class="whitespace-nowrap hidden sm:max-lg:block 2xl:block">Read Later</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        @empty
            <span class="italic text-textPrimary text-opacity-60 text-xs">Can not found any posts</span>
        @endforelse

        {{-- <div class="col-span-full"> --}}
        {{--     <button class="block mt-8 mx-auto border border-gray-300 px-6 py-2 text-[15px]">Show More --}}
        {{--     </button> --}}
        {{-- </div> --}}

        <div class="col-span-full">
            {{ $posts->links() }}
        </div>

        <div class="col-span-full flex items-center justify-between mt-2">
            <div class="flex items-center gap-2 text-[15px] font-bold">
                <svg viewBox="0 0 24 24" class="w-6 h-6" fill="currentColor">
                    <path
                        d="M18.404 2.998c-.757-.754-2.077-.751-2.828.005l-1.784 1.791L11.586 7H7a.998.998 0 0 0-.939.658l-4 11c-.133.365-.042.774.232 1.049l2 2a.997.997 0 0 0 1.049.232l11-4A.998.998 0 0 0 17 17v-4.586l2.207-2.207v-.001h.001L21 8.409c.378-.378.586-.881.585-1.415 0-.535-.209-1.038-.588-1.415l-2.593-2.581zm-3.111 8.295A.996.996 0 0 0 15 12v4.3l-9.249 3.363 4.671-4.671c.026.001.052.008.078.008A1.5 1.5 0 1 0 9 13.5c0 .026.007.052.008.078l-4.671 4.671L7.7 9H12c.266 0 .52-.105.707-.293L14.5 6.914 17.086 9.5l-1.793 1.793zm3.206-3.208-2.586-2.586 1.079-1.084 2.593 2.581-1.086 1.089z"></path>
                </svg>
                Creators you should follow
            </div>

            <div class="flex items-center gap-4">
                <button>
                    <svg viewBox="0 0 24 24" class="w-6 h-6 opacity-20" fill="currentColor">
                        <path
                            d="M12.707 17.293 8.414 13H18v-2H8.414l4.293-4.293-1.414-1.414L4.586 12l6.707 6.707z"></path>
                    </svg>
                </button>
                <button>
                    <svg viewBox="0 0 24 24" class="w-6 h-6 rotate-180" fill="currentColor">
                        <path
                            d="M12.707 17.293 8.414 13H18v-2H8.414l4.293-4.293-1.414-1.414L4.586 12l6.707 6.707z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="col-span-full flex gap-4 overflow-x-auto scrollbar-hide">
            @for($i = 0;$i < 20;$i++)
                <div class="bg-white p-4 flex flex-col items-center">
                    <img class="w-[4.375rem] h-[4.375rem] rounded-full object-cover"
                         src="{{ asset('/images/shan.png') }}"
                         alt="Shan">
                    <h3 class="text-sm font-medium mt-3">Shan Teylor</h3>
                    <span class="text-xs opacity-40 mt-2">Tech Mint</span>
                    <button class="bg-primary text-white rounded text-[15px] px-10 py-1 mt-3">Follow</button>
                </div>
            @endfor
        </div>
    </div>
@endsection
