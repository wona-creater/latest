<x-app-layout>

    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                User Details
            </h2>
            <div class="hidden h-full py-1 sm:flex">
                <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
            </div>

        </div>

        <div class="grid place-items-center">
            <div class="card mt-20 w-full max-w-xl p-4 sm:p-5" x-data="pages.initCreditCard">
                <div
                    class="relative mx-auto -mt-20 h-40 w-72 rounded-lg text-white shadow-xl transition-transform hover:scale-110 lg:h-48 lg:w-80">
                    <div class="h-full w-full rounded-lg" :class="creditCardUI"></div>
                    <div class="absolute top-0 flex h-full w-full flex-col justify-between p-4 sm:p-5">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-xs+ font-light">Balance</p>
                                <p class="text-xs+ font-light">${{ $user->balance }}</p>
                                <p class="font-medium uppercase tracking-wide">{{ $user->name }}</p>
                            </div>
                            <div>
                                <p class="text-xs+ font-light">Home Address</p>
                                <p class="text-xs+ font-light">{{ $user->address ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <p class="text-xs+ font-light">Phone Number</p>
                                <p class="text-xs+ font-light">{{ $user->phone ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <div>
                                <p class="text-xs+ font-light">Kyc Status</p>
                                <p class="text-xs+ font-light">{{ $user->kyc_status ?? 'Pending' }}</p>
                            </div>
                            <div>
                                <p class="text-xs+ font-light">Country</p>
                                <p class="text-xs+ font-light">{{ $user->country ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{ route('admin.update_balance', $user->id) }}" method="POST">
                    @csrf
                    <div class="space-y-4">
                        <label class="block">
                            <span>User Balance</span>
                            <input name="balance"
                                class="form-input mt-1.5 w-full rounded-lg bg-slate-150 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                                placeholder="Input Balance" type="number" step="0.01" value="{{ $user->balance }}"
                                x-model.debounce="cardNumber"  />
                            @error('balance')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </label>

                        <div class="flex justify-center space-x-2 pt-4">
                            <button type="button"
                                class="btn min-w-[7rem] border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
                                onclick="window.history.back()">
                                Cancel
                            </button>
                            <button type="submit"
                                class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                Save Details
                            </button>
                        </div>
                    </div>
                </form>
                {{-- <form action="">
                    <div class="space-y-4">
                        <label class="block">
                            <span>User Balance</span>
                            <input
                                class="form-input mt-1.5 w-full rounded-lg bg-slate-150 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                                placeholder="Input Balance" type="name" value="{{ $user->balance }}"
                                x-model.debounce="cardNumber" x-input-mask="creditCardInput" />
                        </label>

                        <div class="flex justify-center space-x-2 pt-4">
                            <button
                                class="btn min-w-[7rem] border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                                Cancel
                            </button>
                            <button
                                class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                Save Details
                            </button>
                        </div>
                    </div>
                </form> --}}
            </div>
        </div>
    </main>




</x-app-layout>
