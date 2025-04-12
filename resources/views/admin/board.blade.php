<x-app-layout>


    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center justify-between py-5 lg:py-6">
            <div class="flex items-center space-x-1">
                <h2 class="text-xl font-medium text-slate-700 line-clamp-1 dark:text-navy-50 lg:text-2xl">
                    All Users
                </h2>

            </div>


        </div>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($users as $user)
                <div class="card">
                    <div class="p-2 text-right">
                        <!-- Your popper menu -->
                    </div>
                    <div class="flex grow flex-col items-center px-4 pb-5 sm:px-5">
                        <div class="avatar size-20">
                            <img class="rounded-full"
                                src="{{ $user?->image ? asset('storage/' . $user->image) : asset('backend/images/avatar/avatar-20.png') }}"
                                alt="User Profile Picture" />
                        </div>
                        <h3 class="pt-3 text-lg font-medium text-slate-700 dark:text-navy-100">
                            {{ $user->name }}
                        </h3>
                        <p class="text-xs+">{{ $user->email }}</p>
                        <div class="inline-space mt-3 flex grow flex-wrap items-start">
                            <a href="#"
                                class="tag rounded-full bg-success/10 text-success hover:bg-success/20 focus:bg-success/20 active:bg-success/25">
                                Portfolio Balance
                            </a>
                            <a href="#"
                                class="tag rounded-full bg-success/10 text-success hover:bg-success/20 focus:bg-success/20 active:bg-success/25">
                                ${{ $user->balance }}
                            </a>
                        </div>
                        <div class="mt-6 grid w-full grid-cols-2 gap-2">
                            <a href="{{ route('admin.user', $user) }}"
                                class="btn space-x-2 bg-primary px-0 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4 shrink-0" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-width="2"
                                        d="M5 19.111c0-2.413 1.697-4.468 4.004-4.848l.208-.035a17.134 17.134 0 015.576 0l.208.035c2.307.38 4.004 2.435 4.004 4.848C19 20.154 18.181 21 17.172 21H6.828C5.818 21 5 20.154 5 19.111zM16.083 6.938c0 2.174-1.828 3.937-4.083 3.937S7.917 9.112 7.917 6.937C7.917 4.764 9.745 3 12 3s4.083 1.763 4.083 3.938z" />
                                </svg>
                                <span>Profile</span>
                            </a>
                            <form action="{{ route('admin.delete', $user) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this user?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="btn space-x-3 bg-slate-150 px-0 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4 shrink-0" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0h4m-7 4h10" />
                                    </svg>
                                    <span>Delete</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        {{-- <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3 lg:gap-6 xl:grid-cols-4">
            @foreach ($users as $user)
                <div class="card">
                    <div class="p-2 text-right">
                        <div x-data="usePopper({ placement: 'bottom-end', offset: 4 })" @click.outside="isShowPopper && (isShowPopper = false)"
                            class="inline-flex">
                        </div>
                    </div>
                    <div class="flex grow flex-col items-center px-4 pb-5 sm:px-5">
                        <div class="avatar size-20">
                            <img class="rounded-full"
                                src="{{ $user?->image ? asset('storage/' . $user->image) : asset('backend/images/avatar/avatar-20.jpg') }}"
                                alt="User Profile Picture" />
                        </div>
                        <h3 class="pt-3 text-lg font-medium text-slate-700 dark:text-navy-100">
                            {{ $user->name }}
                        </h3>
                        <p class="text-xs+">{{ $user->email }}</p>
                        <div class="inline-space mt-3 flex grow flex-wrap items-start">
                            <a href="#"
                                class="tag rounded-full bg-success/10 text-success hover:bg-success/20 focus:bg-success/20 active:bg-success/25">
                                Portifolio Balance
                            </a>
                            <a href="#"
                                class="tag rounded-full bg-success/10 text-success hover:bg-success/20 focus:bg-success/20 active:bg-success/25">
                                ${{ $user->balance }}
                            </a>

                        </div>

                    </div>
                </div>
            @endforeach

        </div> --}}
    </main>



</x-app-layout>
