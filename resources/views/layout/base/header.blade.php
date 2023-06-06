<header class="lg:ml-[16.25rem] flex items-center justify-between p-4">
    <div class="flex items-center gap-2 lg:w-3/4 lg:px-8">
        {{-- Desktop --}}
        <div class="relative grow hidden lg:block">
            <input type="text" placeholder="Search for news.."
                   class="rounded pl-4 pr-12 py-3 hover:ring-2 hover:ring-primary focus:ring-2 outline-0 focus:ring-primary w-full bg-[#2f9ff80a]">
            <svg viewBox="0 0 24 24"
                 class="w-6 h-6 text-textPrimary absolute top-1/2 right-0 -translate-y-1/2 -translate-x-1/2"
                 fill="currentColor">
                <path
                    d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path>
                <path
                    d="M11.412 8.586c.379.38.588.882.588 1.414h2a3.977 3.977 0 0 0-1.174-2.828c-1.514-1.512-4.139-1.512-5.652 0l1.412 1.416c.76-.758 2.07-.756 2.826-.002z"></path>
            </svg>
        </div>
        <a href="#"
           class="border border-gray-300 px-4 py-3 rounded text-[15px] items-center gap-10 hidden lg:flex">
            <div class="text-textPrimary whitespace-nowrap">
                Latest news on <span class="text-primary">Covid-19</span>
            </div>
            <svg viewBox="0 0 24 24" class="w-6 h-6 -mr-2" fill="currentColor">
                <path d="m11.293 17.293 1.414 1.414L19.414 12l-6.707-6.707-1.414 1.414L15.586 11H6v2h9.586z"></path>
            </svg>
        </a>

        {{-- Mobile --}}
        <button class="lg:hidden" id="sidebar-toggle">
            <svg viewBox="0 0 24 24" class="w-6 h-6" fill="currentColor">
                <path d="M4 11h12v2H4zm0-5h16v2H4zm0 12h7.235v-2H4z"></path>
            </svg>
        </button>
        <a href="{{ route('home.index') }}" class="lg:hidden">
            <img class="w-6 h-6" src="{{ asset('images/logo.png') }}" alt="">
        </a>
    </div>
    <div class="flex items-center justify-end gap-4 lg:w-1/4 lg:px-4">
        {{-- Mobile --}}
        <button class="lg:hidden">
            <svg viewBox="0 0 24 24" class="w-6 h-6" fill="currentColor">
                <path
                    d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path>
                <path
                    d="M11.412 8.586c.379.38.588.882.588 1.414h2a3.977 3.977 0 0 0-1.174-2.828c-1.514-1.512-4.139-1.512-5.652 0l1.412 1.416c.76-.758 2.07-.756 2.826-.002z"></path>
            </svg>
        </button>

        <div class="flex items-center gap-2">
            <svg viewBox="0 0 24 24" class="w-6 h-6" fill="currentColor">
                <path
                    d="M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z"></path>
            </svg>
            <span class="text-[15px] whitespace-nowrap">My Profile</span>
        </div>

        {{-- Desktop --}}
        <button class="hidden lg:block">
            <svg viewBox="0 0 24 24" class="w-6 h-6" fill="currentColor">
                <path d="M16.293 9.293 12 13.586 7.707 9.293l-1.414 1.414L12 16.414l5.707-5.707z"></path>
            </svg>
        </button>
    </div>
</header>
