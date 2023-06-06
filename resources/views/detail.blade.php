@extends('layout.base.app')

@section('content')
    <h1 class="text-[26px] font-bold">
        {{ $post->title }}
    </h1>

    <ul class="flex gap-2 mt-2">
        <li>
            <a href="{{ route('home.posts-by-cate', $post->category->slug) }}"
               class="bg-[#2F9FF8] text-primary rounded py-1 px-2 text-xs bg-opacity-20">
                {{ $post->category->name }}
            </a>
        </li>
    </ul>

    <p class="text-[17px] opacity-60 mt-5">
        {{ $post->description }}
    </p>

    {{-- <img src="{{ $post->image }}" class="mt-5 aspect-video w-full rounded object-cover" alt=""> --}}

    <article class="mt-4" id="article">
        {!! $post->content !!}
    </article>

    <div class="flex flex-col items-center mt-8">
        <div class="text-xs opacity-30">Published {{ $post->created_at->toDayDateTimeString() }}</div>
        <div class="text-xs mt-2">by {{ $post->user->name }}</div>
        <button class="mt-6 text-xs text-primary underline">Back to top</button>
    </div>

    <div class="flex items-center gap-3 mt-8">
        <label for="comment" class="font-bold text-[17px]">Add your comment</label>
        <div class="grow h-px bg-gray-300"></div>
    </div>
    {{-- <textarea id="comment" --}}
    {{--           class="border-none rounded bg-[#ECF5F8] p-4 w-full mt-2 outline-0 focus:ring-2 focus:ring-primary" --}}
    {{--           placeholder="Enter your comment here.."></textarea> --}}
    {{-- <button class="bg-primary text-white px-8 py-2 mt-2 rounded">Post Comment</button> --}}
    {{-- <button id="comments-toggle" class="flex items-center gap-2 text-primary underline mt-4"> --}}
    {{--     View All Comments (04) --}}
    {{--     <svg viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"> --}}
    {{--         <path --}}
    {{--             d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 14.414-5.707-5.707 1.414-1.414L12 13.586l4.293-4.293 1.414 1.414L12 16.414z"></path> --}}
    {{--     </svg> --}}
    {{-- </button> --}}
    {{-- <div id="comments" class="mt-5 flex flex-col gap-3 hidden"> --}}
    {{--     <x-comment :self="true"></x-comment> --}}
    {{--     <div --}}
    {{--         class="relative pl-8 before:content-[''] before:absolute before:w-0.5 before:h-full before:top-0 before:left-0 before:bg-amber-400"> --}}
    {{--         <x-comment></x-comment> --}}
    {{--     </div> --}}

    {{--     <x-comment></x-comment> --}}
    {{--     <div --}}
    {{--         class="relative pl-8 before:content-[''] before:absolute before:w-0.5 before:h-full before:top-0 before:left-0 before:bg-amber-400"> --}}
    {{--         <x-comment></x-comment> --}}
    {{--     </div> --}}
    {{-- </div> --}}

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/app.css') }}">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    @comments([
    'model' => $post,
    'maxIndentationLevel' => 1
    ])

    {{-- Newsletter --}}
    <div class="mt-8 p-4 pl-8 bg-[#FFE8C5] rounded flex items-center justify-between">
        <div class="w-full">
            <div class="font-bold">Subscribe to our newsletter</div>
            <div class="w-full flex items-center gap-2 mt-2">
                <input class="grow min-w-0 bg-[#FFF5E6] px-4 py-2 rounded outline-0" type="text"
                       placeholder="Enter Email">
                <button class="bg-primary text-white px-8 py-2 rounded">Subscribe</button>
            </div>
        </div>
        <img class="hidden md:block" src="{{ asset('images/letter.png') }}" alt="">
    </div>

    {{-- More news --}}
    <div class="flex items-center gap-3 mt-8">
        <label for="comment" class="font-bold text-[17px]">More News for you</label>
        <div class="grow h-px bg-gray-300"></div>
    </div>
    <div class="grid grid-cols-2 mt-2 gap-4">
        @for($i = 0;$i < 6;$i++)
            <div class="col-span-full lg:col-span-1 bg-white p-4 gap-12 shadow-[0_2px_20px_0_#0000000A]">
                <div class="flex justify-between">
                    <div class="flex flex-col pl-2 max-w-[calc(100%-9rem)] lg:max-w-[calc(100%-11rem)]">
                        <a href="{{ route('home.detail-test') }}" class="font-medium text-[17px] line-clamp-2">
                            Battlegrounds Mobile India iOS release date
                        </a>
                        <p class="opacity-60 line-clamp-3 mt-2">
                            Samsung Galaxy F22 has been launched in India. The new smartphone has been priced in
                            the
                            mid-range segment. The new smartphone is powered by a MediaTek chipset and features
                            a
                            high refresh rate AMOLED display.
                        </p>
                    </div>
                    <img class="w-32 object-cover rounded" src="{{ asset('/images/cod.png') }}" alt="Samsung">
                </div>
                <div class="flex items-center justify-between mt-4 pl-2 text-xs gap-4">
                    <div class="flex items-center opacity-40 gap-2">
                        <span class="whitespace-nowrap">The Mint</span>
                        •
                        <span class="whitespace-nowrap">15 mins ago</span>
                    </div>
                    <div class="flex items-center gap-5">
                        <a href="#" class="flex items-center gap-2 text-[#0768B5]">
                            <svg viewBox="0 0 24 24" class="w-5 h-5" fill="currentColor">
                                <path d="M11 15h2V9h3l-4-5-4 5h3z"></path>
                                <path d="M20 18H4v-7H2v7c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2v-7h-2v7z"></path>
                            </svg>
                            <span class="hidden xl:block">Share</span>
                        </a>
                        <a href="#" class="flex items-center gap-2 text-[#0768B5]">
                            <svg viewBox="0 0 24 24" class="w-5 h-5" fill="currentColor">
                                <path
                                    d="M20.995 6.9a.998.998 0 0 0-.548-.795l-8-4a1 1 0 0 0-.895 0l-8 4a1.002 1.002 0 0 0-.547.795c-.011.107-.961 10.767 8.589 15.014a.987.987 0 0 0 .812 0c9.55-4.247 8.6-14.906 8.589-15.014zM12 19.897C5.231 16.625 4.911 9.642 4.966 7.635L12 4.118l7.029 3.515c.037 1.989-.328 9.018-7.029 12.264z"></path>
                                <path d="m11 12.586-2.293-2.293-1.414 1.414L11 15.414l5.707-5.707-1.414-1.414z"></path>
                            </svg>
                            <span class="whitespace-nowrap hidden xl:block">Read Later</span>
                        </a>
                    </div>
                </div>
            </div>
        @endfor
    </div>
@endsection
