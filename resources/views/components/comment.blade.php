<div>
    <div class="flex items-center justify-between">
        <span class="text-[17px] font-medium text-primary">
            Rakshan
            @if ($self)
                (You)
            @endif
        </span>
        <div class="flex gap-2">
            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                <path
                    d="M20 8h-5.612l1.123-3.367c.202-.608.1-1.282-.275-1.802S14.253 2 13.612 2H12c-.297 0-.578.132-.769.36L6.531 8H4c-1.103 0-2 .897-2 2v9c0 1.103.897 2 2 2h13.307a2.01 2.01 0 0 0 1.873-1.298l2.757-7.351A1 1 0 0 0 22 12v-2c0-1.103-.897-2-2-2zM4 10h2v9H4v-9zm16 1.819L17.307 19H8V9.362L12.468 4h1.146l-1.562 4.683A.998.998 0 0 0 13 10h7v1.819z"></path>
            </svg>
            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 rotate-180">
                <path
                    d="M20 8h-5.612l1.123-3.367c.202-.608.1-1.282-.275-1.802S14.253 2 13.612 2H12c-.297 0-.578.132-.769.36L6.531 8H4c-1.103 0-2 .897-2 2v9c0 1.103.897 2 2 2h13.307a2.01 2.01 0 0 0 1.873-1.298l2.757-7.351A1 1 0 0 0 22 12v-2c0-1.103-.897-2-2-2zM4 10h2v9H4v-9zm16 1.819L17.307 19H8V9.362L12.468 4h1.146l-1.562 4.683A.998.998 0 0 0 13 10h7v1.819z"></path>
            </svg>
        </div>
    </div>

    <p class="text-opacity-60 text-textPrimary mt-1">
        I’ve been a great fan of Samsung products since 2010. Can’t wait for this one. 🔥🔥🔥
    </p>
    <div class="flex items-center justify-between text-xs mt-1">
        <span class="opacity-30">Posted on Jul 5, 2021 | 6:22 AM</span>
        @if($self)
            <button class="flex items-center text-[#FF8C8C] underline">
                <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                    <path
                        d="M15 2H9c-1.103 0-2 .897-2 2v2H3v2h2v12c0 1.103.897 2 2 2h10c1.103 0 2-.897 2-2V8h2V6h-4V4c0-1.103-.897-2-2-2zM9 4h6v2H9V4zm8 16H7V8h10v12z"></path>
                </svg>
                Delete Comment
            </button>
        @endif
    </div>
    <button class="mt-2 text-primary text-sm">Reply</button>
</div>
