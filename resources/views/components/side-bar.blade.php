<aside
    class="fixed top-0 -left-full lg:left-0 bottom-0 w-[16.25rem] flex flex-col justify-between items-stretch gap-4">
    <div class="overflow-y-auto pr-4">
        <a href="{{ route('home.index') }}" class="flex items-center py-[21px] px-[31px]">
            <img class="w-[29px] h-[35px]" src="{{ asset('/images/logo.png') }}" alt="Logo">
            <span class="text-[#0768B5] ml-[15px] font-bold text-lg">Aster News</span>
        </a>

        <ul class="flex flex-col">
            <li class="sidebar-active">
                <a href="#" class="px-8 py-3 flex items-center">
                    <svg viewBox="0 0 24 24" class="w-6 h-6 text-textPrimary mr-4" fill="currentColor">
                        <path
                            d="M5 22h14a2 2 0 0 0 2-2v-9a1 1 0 0 0-.29-.71l-8-8a1 1 0 0 0-1.41 0l-8 8A1 1 0 0 0 3 11v9a2 2 0 0 0 2 2zm5-2v-5h4v5zm-5-8.59 7-7 7 7V20h-3v-5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v5H5z"></path>
                    </svg>
                    <span class="text-textPrimary leading-none text-[15px]">Top Stories</span>
                </a>
            </li>
            <li>
                <a href="#" class="px-8 py-3 flex items-center">
                    <svg viewBox="0 0 24 24" class="w-6 h-6 text-textPrimary mr-4" fill="currentColor">
                        <path
                            d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm7.931 9h-2.764a14.67 14.67 0 0 0-1.792-6.243A8.013 8.013 0 0 1 19.931 11zM12.53 4.027c1.035 1.364 2.427 3.78 2.627 6.973H9.03c.139-2.596.994-5.028 2.451-6.974.172-.01.344-.026.519-.026.179 0 .354.016.53.027zm-3.842.7C7.704 6.618 7.136 8.762 7.03 11H4.069a8.013 8.013 0 0 1 4.619-6.273zM4.069 13h2.974c.136 2.379.665 4.478 1.556 6.23A8.01 8.01 0 0 1 4.069 13zm7.381 6.973C10.049 18.275 9.222 15.896 9.041 13h6.113c-.208 2.773-1.117 5.196-2.603 6.972-.182.012-.364.028-.551.028-.186 0-.367-.016-.55-.027zm4.011-.772c.955-1.794 1.538-3.901 1.691-6.201h2.778a8.005 8.005 0 0 1-4.469 6.201z"></path>
                    </svg>
                    <span class="text-textPrimary leading-none text-[15px]">Around the World</span>
                </a>
            </li>
            <li>
                <a href="#" class="px-8 py-3 flex items-center">
                    <svg viewBox="0 0 24 24" class="w-6 h-6 text-textPrimary mr-4" fill="currentColor">
                        <path
                            d="M20 6h-3V4c0-1.103-.897-2-2-2H9c-1.103 0-2 .897-2 2v2H4c-1.103 0-2 .897-2 2v11c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V8c0-1.103-.897-2-2-2zm-5-2v2H9V4h6zM4 8h16v4h-3v-2h-2v2H9v-2H7v2H4V8zm0 11v-5h3v2h2v-2h6v2h2v-2h3.001v5H4z"></path>
                    </svg>
                    <span class="text-textPrimary leading-none text-[15px]">Business</span>
                </a>
            </li>
            <li>
                <a href="#" class="px-8 py-3 flex items-center">
                    <svg viewBox="0 0 24 24" class="w-6 h-6 text-textPrimary mr-4" fill="currentColor">
                        <path
                            d="M16.97 4.757a.999.999 0 0 0-1.918-.073l-3.186 9.554-2.952-6.644a1.002 1.002 0 0 0-1.843.034L5.323 12H2v2h3.323c.823 0 1.552-.494 1.856-1.257l.869-2.172 3.037 6.835c.162.363.521.594.915.594l.048-.001a.998.998 0 0 0 .9-.683l2.914-8.742.979 3.911A1.995 1.995 0 0 0 18.781 14H22v-2h-3.22l-1.81-7.243z"></path>
                    </svg>
                    <span class="text-textPrimary leading-none text-[15px]">Health</span>
                </a>
            </li>
            <li>
                <div class="w-full h-px bg-textSecondary my-3 opacity-40"></div>
            </li>
            <li>
                <a href="#" class="px-8 py-2 flex items-center">
                    <svg viewBox="0 0 24 24" class="w-6 h-6 text-textPrimary mr-4" fill="currentColor">
                        <path
                            d="M11.63 21.91A.9.9 0 0 0 12 22a1 1 0 0 0 .41-.09C22 17.67 21 7 21 6.9a1 1 0 0 0-.55-.79l-8-4a1 1 0 0 0-.9 0l-8 4A1 1 0 0 0 3 6.9c0 .1-.92 10.77 8.63 15.01zM5 7.63l7-3.51 7 3.51c.05 2-.27 9-7 12.27C5.26 16.63 4.94 9.64 5 7.63z"></path>
                        <path d="M11.06 16h2v-3h3.01v-2h-3.01V8h-2v3h-3v2h3v3z"></path>
                    </svg>
                    <span class="text-textPrimary leading-none text-[15px]">Covid 19</span>
                </a>
            </li>
            <li>
                <div class="w-full h-px bg-textSecondary my-3 opacity-40"></div>
            </li>
            <li>
                <a href="#" class="px-8 py-3 flex items-center">
                    <svg viewBox="0 0 24 24" class="w-6 h-6 text-textPrimary mr-4" fill="currentColor">
                        <path
                            d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path>
                        <path d="m9 17 8-5-8-5z"></path>
                    </svg>
                    <span class="text-textPrimary leading-none text-[15px]">Entertainment</span>
                </a>
            </li>
            <li>
                <a href="#" class="px-8 py-3 flex items-center">
                    <svg viewBox="0 0 24 24" class="w-6 h-6 text-textPrimary mr-4" fill="currentColor">
                        <path
                            d="M4.035 15.479A3.976 3.976 0 0 0 4 16c0 2.378 2.138 4.284 4.521 3.964C9.214 21.198 10.534 22 12 22s2.786-.802 3.479-2.036C17.857 20.284 20 18.378 20 16c0-.173-.012-.347-.035-.521C21.198 14.786 22 13.465 22 12s-.802-2.786-2.035-3.479C19.988 8.347 20 8.173 20 8c0-2.378-2.143-4.288-4.521-3.964C14.786 2.802 13.466 2 12 2s-2.786.802-3.479 2.036C6.138 3.712 4 5.622 4 8c0 .173.012.347.035.521C2.802 9.214 2 10.535 2 12s.802 2.786 2.035 3.479zm1.442-5.403 1.102-.293-.434-1.053A1.932 1.932 0 0 1 6 8c0-1.103.897-2 2-2 .247 0 .499.05.73.145l1.054.434.293-1.102a1.99 1.99 0 0 1 3.846 0l.293 1.102 1.054-.434C15.501 6.05 15.753 6 16 6c1.103 0 2 .897 2 2 0 .247-.05.5-.145.73l-.434 1.053 1.102.293a1.993 1.993 0 0 1 0 3.848l-1.102.293.434 1.053c.095.23.145.483.145.73 0 1.103-.897 2-2 2-.247 0-.499-.05-.73-.145l-1.054-.434-.293 1.102a1.99 1.99 0 0 1-3.846 0l-.293-1.102-1.054.434A1.935 1.935 0 0 1 8 18c-1.103 0-2-.897-2-2 0-.247.05-.5.145-.73l.434-1.053-1.102-.293a1.993 1.993 0 0 1 0-3.848z"></path>
                        <path d="m15.742 10.71-1.408-1.42-3.331 3.299-1.296-1.296-1.414 1.414 2.704 2.704z"></path>
                    </svg>
                    <span class="text-textPrimary leading-none text-[15px]">Sports</span>
                </a>
            </li>
            <li>
                <a href="#" class="px-8 py-3 flex items-center">
                    <svg viewBox="0 0 24 24" class="w-6 h-6 text-textPrimary mr-4" fill="currentColor">
                        <path
                            d="M5 18v3.766l1.515-.909L11.277 18H16c1.103 0 2-.897 2-2V8c0-1.103-.897-2-2-2H4c-1.103 0-2 .897-2 2v8c0 1.103.897 2 2 2h1zM4 8h12v8h-5.277L7 18.234V16H4V8z"></path>
                        <path
                            d="M20 2H8c-1.103 0-2 .897-2 2h12c1.103 0 2 .897 2 2v8c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2z"></path>
                    </svg>
                    <span class="text-textPrimary leading-none text-[15px]">Discussion</span>
                </a>
            </li>
            <li>
                <a href="#" class="px-8 py-3 flex items-center">
                    <svg viewBox="0 0 24 24" class="w-6 h-6 text-textPrimary mr-4" fill="currentColor">
                        <path
                            d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707A.996.996 0 0 0 3 16v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2a.996.996 0 0 0-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707A.996.996 0 0 0 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zm-7 5a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22z"></path>
                    </svg>
                    <span class="text-textPrimary leading-none text-[15px]">Notification</span>
                </a>
            </li>
            <li>
                <a href="#" class="px-8 py-3 flex items-center">
                    <svg viewBox="0 0 24 24" class="w-6 h-6 text-textPrimary mr-4" fill="currentColor">
                        <path
                            d="M12 16c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4zm0-6c1.084 0 2 .916 2 2s-.916 2-2 2-2-.916-2-2 .916-2 2-2z"></path>
                        <path
                            d="m2.845 16.136 1 1.73c.531.917 1.809 1.261 2.73.73l.529-.306A8.1 8.1 0 0 0 9 19.402V20c0 1.103.897 2 2 2h2c1.103 0 2-.897 2-2v-.598a8.132 8.132 0 0 0 1.896-1.111l.529.306c.923.53 2.198.188 2.731-.731l.999-1.729a2.001 2.001 0 0 0-.731-2.732l-.505-.292a7.718 7.718 0 0 0 0-2.224l.505-.292a2.002 2.002 0 0 0 .731-2.732l-.999-1.729c-.531-.92-1.808-1.265-2.731-.732l-.529.306A8.1 8.1 0 0 0 15 4.598V4c0-1.103-.897-2-2-2h-2c-1.103 0-2 .897-2 2v.598a8.132 8.132 0 0 0-1.896 1.111l-.529-.306c-.924-.531-2.2-.187-2.731.732l-.999 1.729a2.001 2.001 0 0 0 .731 2.732l.505.292a7.683 7.683 0 0 0 0 2.223l-.505.292a2.003 2.003 0 0 0-.731 2.733zm3.326-2.758A5.703 5.703 0 0 1 6 12c0-.462.058-.926.17-1.378a.999.999 0 0 0-.47-1.108l-1.123-.65.998-1.729 1.145.662a.997.997 0 0 0 1.188-.142 6.071 6.071 0 0 1 2.384-1.399A1 1 0 0 0 11 5.3V4h2v1.3a1 1 0 0 0 .708.956 6.083 6.083 0 0 1 2.384 1.399.999.999 0 0 0 1.188.142l1.144-.661 1 1.729-1.124.649a1 1 0 0 0-.47 1.108c.112.452.17.916.17 1.378 0 .461-.058.925-.171 1.378a1 1 0 0 0 .471 1.108l1.123.649-.998 1.729-1.145-.661a.996.996 0 0 0-1.188.142 6.071 6.071 0 0 1-2.384 1.399A1 1 0 0 0 13 18.7l.002 1.3H11v-1.3a1 1 0 0 0-.708-.956 6.083 6.083 0 0 1-2.384-1.399.992.992 0 0 0-1.188-.141l-1.144.662-1-1.729 1.124-.651a1 1 0 0 0 .471-1.108z"></path>
                    </svg>
                    <span class="text-textPrimary leading-none text-[15px]">News Feed Settings</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="mx-4 mb-4 p-4 bg-primary rounded">
        <div class="flex items-center gap-4">
            <svg viewBox="0 0 24 24" class="w-7 h-7 text-white" fill="currentColor">
                <path
                    d="M20 7h-1.209A4.92 4.92 0 0 0 19 5.5C19 3.57 17.43 2 15.5 2c-1.622 0-2.705 1.482-3.404 3.085C11.407 3.57 10.269 2 8.5 2 6.57 2 5 3.57 5 5.5c0 .596.079 1.089.209 1.5H4c-1.103 0-2 .897-2 2v2c0 1.103.897 2 2 2v7c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-7c1.103 0 2-.897 2-2V9c0-1.103-.897-2-2-2zm-4.5-3c.827 0 1.5.673 1.5 1.5C17 7 16.374 7 16 7h-2.478c.511-1.576 1.253-3 1.978-3zM7 5.5C7 4.673 7.673 4 8.5 4c.888 0 1.714 1.525 2.198 3H8c-.374 0-1 0-1-1.5zM4 9h7v2H4V9zm2 11v-7h5v7H6zm12 0h-5v-7h5v7zm-5-9V9.085L13.017 9H20l.001 2H13z"></path>
            </svg>
            <span class="text-white text-[15px] leading-none truncate">Subscribe to Premium</span>
        </div>
        <div class="flex items-center justify-between mt-2">
            <div class="text-white">
                <span class="font-bold text-3xl">$8</span>/m
            </div>

            <button class="bg-[#0768B5] rounded px-7 py-2 text-white">
                Upgrade
            </button>
        </div>
    </div>
</aside>
<div id="sidebar-overlay"></div>
