
    <x-app-layout>

        <!-- Main Content Wrapper -->
        <main class="main-content w-full place-items-center px-[var(--margin-x)] pb-12">
            <div class="py-5 text-center lg:py-6">
                <p class="text-sm uppercase">All Signal Plan</p>
                <h3 class="mt-1 text-xl font-semibold text-slate-600 dark:text-navy-100">
                    signals Details
                </h3>
                <div x-data="{ showModal: false }">
                    <button @click="showModal = true"
                        class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                        Add Your Signal Details Here
                    </button>
                    <template x-teleport="#x-teleport-target">
                        <div class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
                            x-show="showModal" role="dialog" @keydown.window.escape="showModal = false">
                            <div class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300"
                                @click="showModal = false" x-show="showModal" x-transition:enter="ease-out"
                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                x-transition:leave="ease-in" x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"></div>
                            <div class="relative w-full max-w-2xl origin-bottom rounded-lg bg-white pb-4 transition-all duration-300 dark:bg-navy-700"
                                x-show="showModal" x-transition:enter="easy-out"
                                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="easy-in" x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-95">
                                <div class="flex justify-between rounded-t-lg bg-slate-200 px-4 py-3 dark:bg-navy-800 sm:px-5">
                                    <h3 class="text-base font-medium text-slate-700 dark:text-navy-100">
                                        Add New Signal Plan
                                    </h3>
                                    <button @click="showModal = !showModal"
                                        class="btn -mr-1.5 size-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                                <form class="px-4 py-4 sm:px-5">
                                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                        <!-- Plan Name -->
                                        <div>
                                            <label for="name"
                                                class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                                Name
                                            </label>
                                            <input type="text" name="name" id="name" required
                                                class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 placeholder-slate-400 focus:border-primary focus:ring focus:ring-primary/20 dark:border-navy-500 dark:bg-navy-700 dark:text-navy-50 dark:placeholder-navy-300 dark:focus:border-accent"
                                                placeholder="Enter Name">
                                            @error('name')
                                                <span class="text-xs text-error">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Amount -->
                                        <div>
                                            <label for="amount"
                                                class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                               Monthly Price
                                            </label>
                                            <input type="text" name="monthly_price" id="name" required
                                            class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 placeholder-slate-400 focus:border-primary focus:ring focus:ring-primary/20 dark:border-navy-500 dark:bg-navy-700 dark:text-navy-50 dark:placeholder-navy-300 dark:focus:border-accent"
                                            placeholder=" Enter Monthly Price">
                                            @error('monthly_price')
                                                <span class="text-xs text-error">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- User Selection -->
                                        <div>
                                            <label for="user_id"
                                                class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                                Signal Count
                                            </label>
                                            <input type="text" name="signal_count" id="name" required
                                            class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 placeholder-slate-400 focus:border-primary focus:ring focus:ring-primary/20 dark:border-navy-500 dark:bg-navy-700 dark:text-navy-50 dark:placeholder-navy-300 dark:focus:border-accent"
                                            placeholder="Enter  Interest Rate">
                                            @error('signal_count')
                                                <span class="text-xs text-error">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="user_id"
                                                class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                                Time Frames
                                            </label>
                                            <input type="text" name="timeframes" id="name" required
                                            class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 placeholder-slate-400 focus:border-primary focus:ring focus:ring-primary/20 dark:border-navy-500 dark:bg-navy-700 dark:text-navy-50 dark:placeholder-navy-300 dark:focus:border-accent"
                                            placeholder="Enter  Rime Frames">
                                            @error('timeframes')
                                                <span class="text-xs text-error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="user_id"
                                                class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                                Alert Types
                                            </label>
                                            <input type="text" name="alert_types" id="name" required
                                            class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 placeholder-slate-400 focus:border-primary focus:ring focus:ring-primary/20 dark:border-navy-500 dark:bg-navy-700 dark:text-navy-50 dark:placeholder-navy-300 dark:focus:border-accent"
                                            placeholder="Enter Alert types">
                                            @error('alert_types')
                                                <span class="text-xs text-error">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                    <!-- Submit Button -->
                                    <div class="mt-6 text-center">
                                        <button type="submit"
                                            class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                            Save Loan Details
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <input type="text" name="name">
            @error('name')
                <span class="error">{{ $message }}</span>
            @enderror

            <form action="{{ route('signal.store') }}" method="POST">
                @csrf
                <div class="grid max-w-4xl grid-cols-1 gap-4 sm:grid-cols-3 sm:gap-5 lg:gap-6">
                    @foreach ($signals as $signal)
                        <div class="rounded-xl bg-gradient-to-br from-pink-500 to-rose-500 p-1">
                            <div class="rounded-xl bg-slate-50 p-4 text-center dark:bg-navy-900 sm:p-5">
                                <div class="mt-8">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="inline size-16 text-secondary dark:text-secondary-light" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <div class="mt-5">
                                    <h4 class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                                        Plan
                                    </h4>
                                    <p>{{ $signal->name }}</p>
                                </div>
                                <div class="mt-5">
                                    <span
                                        class="text-4xl tracking-tight text-secondary dark:text-secondary-light">${{ $signal->monthly_price }}</span>/month
                                </div>
                                <div class="mt-8 space-y-4 text-left">
                                    <div class="flex items-start space-x-3">
                                        <div class="flex size-6 shrink-0 items-center justify-center rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <span class="font-medium"> Signal Count <b>{{ $signal->signal_count }}</b> </span>
                                    </div>
                                    <div class="flex items-start space-x-3">
                                        <div class="flex size-6 shrink-0 items-center justify-center rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <span class="font-medium"> Time Frame <b>{{ $signal->timeframes }}</b> </span>
                                    </div>
                                    <div class="flex items-start space-x-3">
                                        <div class="flex size-6 shrink-0 items-center justify-center rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <span class="font-medium"> Alert Medium <b>{{ $signal->alert_types }}</b> </span>
                                    </div>
                                </div>
                                <div class="mt-8">
                                    <button type="submit" name="signal_id" value="{{ $signal->id }}"
                                        class="btn rounded-full bg-secondary font-medium text-white hover:bg-secondary-focus focus:bg-secondary-focus active:bg-secondary-focus/90">
                                        Delete Plan
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </form>
        </main>
    </x-app-layout>



