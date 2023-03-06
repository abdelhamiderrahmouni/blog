<a href="https://blogging-with-laravel.com" class="bg-gradient-to-r from-gray-900 to-gray-700 block">
    <div class="container flex items-center justify-between gap-4 leading-tight md:max-w-screen-sm py-4 text-sm text-white">
        <div>
            <div class="font-normal">
                Blogging with
                <span class="bg-clip-text bg-gradient-to-r from-red-300 to-red-400">
                    <span class="text-transparent">Laravel</span>
                </span>
            </div>

            <div class="mt-1 text-gray-100">
                A masterclass on unlocking limitless traffic with your favorite framework and <span class="bg-clip-text bg-gradient-to-r from-orange-300 to-orange-600"><span class="text-transparent" style="text-shadow: 0 0 5px rgb(253 186 116 / 50%)">SEO&nbsp;magic</span></span>
            </div>
        </div>

        <div class="bg-white/10 flex-shrink-0 overflow-hidden relative rounded-full w-16 h-16">
            <x-icon-blogging-with-laravel
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 mt-2 w-24 h-24"
            />
        </div>
    </div>
</a>

<div {{ $attributes->merge(['class' => 'container flex items-center justify-between'])}}>
    <a
        href="{{ route('home') }}"
        class="flex sm:flex-shrink-0 items-center gap-3"
        @click="window.fathom?.trackGoal('XAQUA2K4', 0)"
    >
        <x-icon-logo class="fill-current flex-shrink-0 text-black dark:text-white w-8 h-8 md:w-10 md:h-10" />

        <span class="leading-tight sr-only md:not-sr-only text-sm">
            <span class="block font-medium text-black dark:text-white">Benjamin Crozat</span>
            <span class="block opacity-75">The art of crafting web applications</span>
        </span>
    </a>

    @if (empty($funnel))
        <nav class="flex items-center gap-6 text-sm">
            <button class="hover:text-indigo-400 transition-colors" @click="searching = true; window.fathom?.trackGoal('NV4ZNM3W', 0)">
                Search
            </button>
        </nav>
    @endif
</div>
