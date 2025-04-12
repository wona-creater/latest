<x-app-layout>

    <!-- Main Content Wrapper -->
    <main class="main-content w-full place-items-center px-[var(--margin-x)] pb-12">
        <div class="py-5 text-center lg:py-6">
            <p class="text-sm uppercase">Choose Your Signal Plan</p>
            <h3 class="mt-1 text-xl font-semibold text-slate-600 dark:text-navy-100">
                Subscribe to unlock premium trading signals
            </h3>
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
                                    Choose Plan
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </form>
    </main>
</x-app-layout>
