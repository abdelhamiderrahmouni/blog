@empty($funnel)
    <x-announcement />
@endempty

<div {{ $attributes->merge(['class' => 'container flex items-center justify-between relative sm:static'])}}>
    <x-logo />

    @empty($funnel)
        <div class="flex items-center gap-6 md:gap-8">
            <div class="sm:relative" x-data="{ open: false }" @click.away="open = false">
                <button class="flex items-center gap-2" @click="open = ! open">
                    For you
                    <x-heroicon-o-chevron-down
                        class="w-4 h-4 transition-transform translate-y-px"
                        x-bind:class="{ 'rotate-180': open }"
                    />
                </button>

                <ul
                    class="absolute z-10 bg-white/[.75] backdrop-brightness-150 backdrop-saturate-150 dark:bg-black/[.75] backdrop-blur-md rounded-md overflow-hidden shadow-lg left-4 sm:left-auto sm:w-[300px] md:w-[350px] lg:w-[400px] sm:right-0 right-4 top-full"
                    x-cloak
                    x-show="open"
                    x-transition
                >
                    <li>
                        <a
                            href="{{ route('phpunit-to-pest') }}"
                            class="block px-4 py-3 transition-colors duration-500 group hover:bg-indigo-700/60 hover:text-white"
                        >
                            <span class="block font-medium">Convert PHPUnit tests to Pest for free</span>
                            <span class="block text-sm text-gray-500 duration-500 group-hover:text-indigo-100 dark:group-hover:text-indigo-300">Kickstart the migration of your test suite.</span>
                        </a>
                    </li>

                    <li>
                        <a
                            href="https://smousss.com"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="block px-4 py-3 transition-colors duration-500 group hover:bg-indigo-700/60 hover:text-white"
                        >
                            <span class="block font-medium">Smousss</span>
                            <span class="block text-sm text-gray-500 duration-500 group-hover:text-indigo-100 dark:group-hover:text-indigo-300">An AI-powered assistant for Laravel developers.</span>
                        </a>
                    </li>

                    <li>
                        <a
                            href="https://benjamincrozat.pirsch.io/?domain=benjamincrozat.com&interval=today&scale=day"
                            target="_blank"
                            rel="nofollow noopener noreferrer"
                            class="block px-4 py-3 transition-colors duration-500 group hover:bg-indigo-700/60 hover:text-white"
                        >
                            <span class="block font-medium">My live analytics dashboard</span>
                            <span class="block text-sm text-gray-500 duration-500 group-hover:text-indigo-100 dark:group-hover:text-indigo-300">See the growth of my blog for yourself.</span>
                        </a>
                    </li>
                </ul>
            </div>

            <x-search-btn />
        </div>
    @endempty
</div>
