<x-app-layout>

    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                Personal information
            </h2>
            <div class="hidden h-full py-1 sm:flex">
                <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
            </div>
            <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                <li class="flex items-center space-x-2">
                    <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                        href="#">Details</a>
                    <svg x-ignore xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </li>

            </ul>
        </div>

        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
            <div class="col-span-12 lg:col-span-4">
                <div class="card p-4 sm:p-5">
                    <div class="flex items-center space-x-4">
                        <div class="avatar size-14">
                            <img class="rounded-full w-24 h-24"
                                 src="{{ $user?->image ? asset('storage/' . $user->image) : asset('backend/images/avatar/avatar-20.png') }}"
                                alt="User Profile Picture" />
                        </div>
                        <div>
                            <h3 class="text-base font-medium text-slate-700 dark:text-navy-100">
                                {{ Auth::user()->name }}
                            </h3>
                            <p class="text-xs+">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <ul class="mt-6 space-y-1.5 font-inter font-medium">
                        <li>
                            <a class="flex items-center space-x-2 rounded-lg bg-primary px-4 py-2.5 tracking-wide text-white outline-none transition-all dark:bg-accent"
                                href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Account</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-span-12 lg:col-span-8">
                <div class="card">
                    <div
                        class="flex flex-col items-center space-y-4 border-b border-slate-200 p-4 dark:border-navy-500 sm:flex-row sm:justify-between sm:space-y-0 sm:px-5">
                        <h2 class="text-lg font-medium tracking-wide text-slate-700 dark:text-navy-100">
                            Account Setting
                        </h2>

                    </div>
                    <div class="p-4 sm:p-5">
                        <div class="flex flex-col">
                            <span class="text-base font-medium text-slate-600 dark:text-navy-100">Avatar</span>
                            <div class="avatar mt-1.5 size-20">
                                <img class="rounded-full w-24 h-24"
                                src="{{ $user?->image ? asset('storage/' . $user->image) : asset('backend/images/avatar/avatar-20.png') }}"
                                alt="User Profile Picture" />
                                <div
                                    class="absolute bottom-0 right-0 flex items-center justify-center rounded-full bg-white dark:bg-navy-700">
                                    <button
                                        class="btn size-6 rounded-full border border-slate-200 p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:border-navy-500 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-3.5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>
                        <div class="">
                            {{-- profile update --}}
                            @include('profile.partials.update-profile-information-form')
                        </div>

                        <div class="">
                            {{-- password update --}}

                            @include('profile.partials.update-password-form')
                        </div>

                        <div class="">
                            {{-- profile destroy --}}

                            @include('profile.partials.delete-user-form')
                        </div>


                    </div>




                    <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>
                    <div>
                        <div class="flex items-center justify-between pt-4">
                            <div class="flex items-center space-x-4">
                                <div class="size-12">
                                    <img src="/backend/images/logos/google.svg" alt="logo" />
                                </div>
                                <p class="font-medium line-clamp-1">
                                    Connect Wallet
                                </p>
                            </div>
                            <button
                                class="btn h-8 rounded-full border border-slate-200 px-3 text-xs+ font-medium text-primary hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-500 dark:text-accent-light dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                                Connect
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </main>
</x-app-layout>
