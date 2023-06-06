<header class="lg:ml-[16.25rem] flex items-center justify-between p-4">
    <div class="flex items-center gap-2 lg:w-3/4 lg:px-8">
        {{-- Desktop --}}
        <form class="relative grow hidden lg:block" method="get" action="{{ route('home.search') }}">
            <input type="text" placeholder="Search for news.." name="q" value="{{ $search }}" required
                   class="rounded pl-4 pr-12 py-3 hover:ring-2 hover:ring-primary focus:ring-2 outline-0 focus:ring-primary w-full bg-[#2f9ff80a] border-0">
            <svg viewBox="0 0 24 24" id="submit-alt"
                 class="w-6 h-6 text-textPrimary absolute top-1/2 right-0 -translate-y-1/2 -translate-x-1/2"
                 fill="currentColor">
                <path
                    d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path>
                <path
                    d="M11.412 8.586c.379.38.588.882.588 1.414h2a3.977 3.977 0 0 0-1.174-2.828c-1.514-1.512-4.139-1.512-5.652 0l1.412 1.416c.76-.758 2.07-.756 2.826-.002z"></path>
            </svg>
        </form>
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
    @if(auth()->check())
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

            <a href="{{ route('profile.edit') }}" class="flex items-center gap-2">
                <svg viewBox="0 0 24 24" class="w-6 h-6" fill="currentColor">
                    <path
                        d="M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z"></path>
                </svg>
                {{-- <span class="text-[15px] whitespace-nowrap">My Profile</span> --}}
            </a>
        </div>
    @else
        <div class="flex gap-4 lg:w-1/4 lg:px-4 justify-end items-center">
            <a href="{{ route('login') }}" class="rounded flex items-center justify-center">
                <svg viewBox="0 0 24 24" class="w-6 h-6 opacity-60">
                    <path
                        d="M12 2A10.13 10.13 0 0 0 2 12a10 10 0 0 0 4 7.92V20h.1a9.7 9.7 0 0 0 11.8 0h.1v-.08A10 10 0 0 0 22 12 10.13 10.13 0 0 0 12 2zM8.07 18.93A3 3 0 0 1 11 16.57h2a3 3 0 0 1 2.93 2.36 7.75 7.75 0 0 1-7.86 0zm9.54-1.29A5 5 0 0 0 13 14.57h-2a5 5 0 0 0-4.61 3.07A8 8 0 0 1 4 12a8.1 8.1 0 0 1 8-8 8.1 8.1 0 0 1 8 8 8 8 0 0 1-2.39 5.64z"></path>
                    <path
                        d="M12 6a3.91 3.91 0 0 0-4 4 3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4zm0 6a1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2 1.91 1.91 0 0 1-2 2z"></path>
                </svg>
            </a>
            <div class="h-4 w-px mx-2 bg-gray-300"></div>
            <a href="{{ route('socialite.redirect', 'google') }}" class="rounded flex items-center justify-center">
                <svg viewBox="-0.5 0 48 48" class="w-6 h-6">
                    <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Color-" transform="translate(-401.000000, -860.000000)">
                            <g id="Google" transform="translate(401.000000, 860.000000)">
                                <path
                                    d="M9.82727273,24 C9.82727273,22.4757333 10.0804318,21.0144 10.5322727,19.6437333 L2.62345455,13.6042667 C1.08206818,16.7338667 0.213636364,20.2602667 0.213636364,24 C0.213636364,27.7365333 1.081,31.2608 2.62025,34.3882667 L10.5247955,28.3370667 C10.0772273,26.9728 9.82727273,25.5168 9.82727273,24"
                                    id="Fill-1" fill="#FBBC05">

                                </path>
                                <path
                                    d="M23.7136364,10.1333333 C27.025,10.1333333 30.0159091,11.3066667 32.3659091,13.2266667 L39.2022727,6.4 C35.0363636,2.77333333 29.6954545,0.533333333 23.7136364,0.533333333 C14.4268636,0.533333333 6.44540909,5.84426667 2.62345455,13.6042667 L10.5322727,19.6437333 C12.3545909,14.112 17.5491591,10.1333333 23.7136364,10.1333333"
                                    id="Fill-2" fill="#EB4335">

                                </path>
                                <path
                                    d="M23.7136364,37.8666667 C17.5491591,37.8666667 12.3545909,33.888 10.5322727,28.3562667 L2.62345455,34.3946667 C6.44540909,42.1557333 14.4268636,47.4666667 23.7136364,47.4666667 C29.4455,47.4666667 34.9177955,45.4314667 39.0249545,41.6181333 L31.5177727,35.8144 C29.3995682,37.1488 26.7323182,37.8666667 23.7136364,37.8666667"
                                    id="Fill-3" fill="#34A853">

                                </path>
                                <path
                                    d="M46.1454545,24 C46.1454545,22.6133333 45.9318182,21.12 45.6113636,19.7333333 L23.7136364,19.7333333 L23.7136364,28.8 L36.3181818,28.8 C35.6879545,31.8912 33.9724545,34.2677333 31.5177727,35.8144 L39.0249545,41.6181333 C43.3393409,37.6138667 46.1454545,31.6490667 46.1454545,24"
                                    id="Fill-4" fill="#4285F4">
                                </path>
                            </g>
                        </g>
                    </g>
                </svg>
            </a>
        </div>
    @endif
</header>

@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const submitAlt = document.getElementById("submit-alt");
            if (submitAlt) {
                submitAlt.addEventListener("click", function () {
                        const form = submitAlt.closest("form");
                        if (form && form.querySelector("input[name=q]").value !== "") {
                            form.submit();
                        }
                    }
                );
            }
        });
    </script>
@endpush
