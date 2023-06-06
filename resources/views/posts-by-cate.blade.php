@extends('layout.base.app')

@section('content')
    <div class="grid grid-cols-2 gap-4">
        <h2 class="col-span-full mt-2 text-xl font-bold">{{ $cate->name }}</h2>

        @empty($posts)
            No posts found
        @else
            @foreach($posts as $post)
                <div class="col-span-full lg:col-span-1 bg-white p-4 gap-12 shadow-[0_2px_20px_0_#0000000A]">
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
                        <img class="w-32 h-28 object-cover rounded" src="{{ $post->image }}"
                             alt="{{ $post->title }}">
                    </div>
                    <div class="flex items-center justify-between mt-4 pl-2 text-xs gap-4">
                        <div class="flex items-center opacity-40 gap-2">
                            <span class="whitespace-nowrap truncate max-w-xs">{{ $post->user->name }}</span>
                            •
                            <span class="whitespace-nowrap">{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="flex items-center gap-5">
                            <a href="#" class="flex items-center gap-2 text-[#0768B5]">
                                <svg viewBox="0 0 24 24" class="w-5 h-5" fill="currentColor">
                                    <path d="M11 15h2V9h3l-4-5-4 5h3z"></path>
                                    <path d="M20 18H4v-7H2v7c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2v-7h-2v7z"></path>
                                </svg>
                                <span class="hidden hidden sm:max-lg:block 2xl:block">Share</span>
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
            @endforeach

            <div class="col-span-full">
                {{ $posts->withQueryString()->links() }}
            </div>
        @endempty
    </div>

@endsection
