<nav x-data="{ open: false }" class="bg-[#0a0c10]/80 backdrop-blur-xl border-b border-gray-800 sticky top-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group no-underline">
                        <div class="w-10 h-10 relative flex-shrink-0">
                            <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" class="w-full h-full drop-shadow-[0_0_10px_rgba(245,197,24,0.3)] group-hover:rotate-90 transition-transform duration-700 ease-out">
                                <defs>
                                    <linearGradient id="navGold" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" stop-color="#F5C518" />
                                        <stop offset="100%" stop-color="#D4AF37" />
                                    </linearGradient>
                                </defs>
                                <circle cx="50" cy="50" r="45" fill="none" stroke="url(#navGold)" stroke-width="2" opacity="0.3" stroke-dasharray="4 4"/>
                                <g>
                                    <polygon points="50,10 58,42 50,50 42,42" fill="url(#navGold)"/>
                                    <polygon points="50,90 58,58 50,50 42,58" fill="url(#navGold)" opacity="0.6"/>
                                    <polygon points="90,50 58,58 50,50 58,42" fill="url(#navGold)"/>
                                    <polygon points="10,50 42,58 50,50 42,42" fill="url(#navGold)" opacity="0.6"/>
                                </g>
                                <circle cx="50" cy="50" r="6" fill="#111827" stroke="url(#navGold)" stroke-width="2"/>
                            </svg>
                        </div>
                        <span class="font-serif text-2xl font-black bg-clip-text text-transparent bg-gradient-to-r from-amber-400 to-amber-600">Wayn?</span>
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex rtl:space-x-reverse">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-amber-500 text-sm font-bold leading-5 text-white focus:outline-none transition duration-150 ease-in-out">
                        {{ __('Dashboard') }}
                    </a>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-gray-700 text-sm leading-4 font-bold rounded-xl text-gray-300 bg-[#12141a] hover:text-white hover:border-amber-500 focus:outline-none transition ease-in-out duration-150 cursor-pointer shadow-sm">
                            <div class="w-6 h-6 rounded-full bg-gradient-to-r from-amber-500 to-amber-700 text-black flex items-center justify-center font-black mr-2 rtl:mr-0 rtl:ml-2 text-xs">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-2">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="bg-[#12141a] border border-gray-800 rounded-md shadow-xl">
                            <x-dropdown-link :href="route('profile.edit')" class="hover:bg-gray-800 text-gray-300 hover:text-amber-500 font-bold">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();" class="hover:bg-red-500/10 text-red-400 hover:text-red-300 font-bold">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 focus:outline-none focus:bg-gray-800 focus:text-amber-500 transition duration-150 ease-in-out border border-transparent hover:border-gray-700">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-[#0a0c10] border-b border-gray-800 shadow-2xl absolute w-full">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('dashboard') }}" class="block w-full ps-3 pe-4 py-3 border-l-4 border-amber-500 text-left rtl:text-right text-base font-bold text-amber-500 bg-amber-500/10 focus:outline-none focus:text-amber-600 focus:bg-amber-100 transition duration-150 ease-in-out">
                {{ __('Dashboard') }}
            </a>
        </div>

        <div class="pt-4 pb-4 border-t border-gray-800">
            <div class="px-4 flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-gradient-to-r from-amber-500 to-amber-700 flex items-center justify-center text-black font-black">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div>
                    <div class="font-bold text-base text-white">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-4 space-y-1 px-2">
                <a href="{{ route('profile.edit') }}" class="block w-full px-4 py-2 text-left rtl:text-right text-base font-bold text-gray-300 hover:text-amber-500 hover:bg-gray-800 rounded-lg transition duration-150 ease-in-out">
                    {{ __('Profile') }}
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="block w-full px-4 py-2 text-left rtl:text-right text-base font-bold text-red-400 hover:text-red-300 hover:bg-red-500/10 rounded-lg transition duration-150 ease-in-out">
                        {{ __('Log Out') }}
                    </a>
                </form>
            </div>
        </div>
    </div>
</nav>
