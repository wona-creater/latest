<x-app-layout>


    <main class="main-content w-full place-items-center px-[var(--margin-x)] pb-12">
        <div class="py-5 text-center lg:py-6">
            <p class="text-sm uppercase">All Loan</p>
            <h3 class="mt-1 text-xl font-semibold text-slate-600 dark:text-navy-100">
                Loans Details
            </h3>

            <div x-data="{ showModal: false }">
                <button @click="showModal = true"
                    class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                    Add Your Loan Details Here
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
                            <div
                                class="flex justify-between rounded-t-lg bg-slate-200 px-4 py-3 dark:bg-navy-800 sm:px-5">
                                <h3 class="text-base font-medium text-slate-700 dark:text-navy-100">
                                    Add Loan Plan
                                </h3>
                                <button @click="showModal = !showModal"
                                    class="btn -mr-1.5 size-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            <form class="px-4 py-4 sm:px-5" action="{{ route('admin.store') }}" method="POST">
                                @csrf
                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                    <!-- Loan Amount -->
                                    <div>
                                        <label for="amount"
                                            class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                            Loan Amount
                                        </label>
                                        <input type="number" step="0.01" name="amount" id="amount" required
                                            class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 placeholder-slate-400 focus:border-primary focus:ring focus:ring-primary/20 dark:border-navy-500 dark:bg-navy-700 dark:text-navy-50 dark:placeholder-navy-300 dark:focus:border-accent"
                                            placeholder="Enter Loan Amount" value="{{ old('amount') }}">
                                        @error('amount')
                                            <span class="text-xs text-error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Repayment Period -->
                                    <div>
                                        <label for="repayment_period"
                                            class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                            Repayment Period
                                        </label>
                                        <input type="number" name="repayment_period" id="repayment_period" required
                                            class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 placeholder-slate-400 focus:border-primary focus:ring focus:ring-primary/20 dark:border-navy-500 dark:bg-navy-700 dark:text-navy-50 dark:placeholder-navy-300 dark:focus:border-accent"
                                            placeholder="Enter Repayment Period (months)"
                                            value="{{ old('repayment_period') }}">
                                        @error('repayment_period')
                                            <span class="text-xs text-error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Interest Rate -->
                                    <div>
                                        <label for="interest_rate"
                                            class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                            Interest Rate
                                        </label>
                                        <input type="number" step="0.01" name="interest_rate" id="interest_rate"
                                            required
                                            class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 placeholder-slate-400 focus:border-primary focus:ring focus:ring-primary/20 dark:border-navy-500 dark:bg-navy-700 dark:text-navy-100 dark:placeholder-navy-300 dark:focus:border-accent"
                                            placeholder="Enter Interest Rate (%)" value="{{ old('interest_rate') }}">
                                        @error('interest_rate')
                                            <span class="text-xs text-error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Loan Type -->
                                    <div>
                                        <label for="loan_type"
                                            class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                            Loan Type
                                        </label>
                                        <input type="text" name="loan_type" id="loan_type" required
                                            class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 placeholder-slate-400 focus:border-primary focus:ring focus:ring-primary/20 dark:border-navy-500 dark:bg-navy-700 dark:text-navy-50 dark:placeholder-navy-300 dark:focus:border-accent"
                                            placeholder="Enter Loan Type" value="{{ old('loan_type') }}">
                                        @error('loan_type')
                                            <span class="text-xs text-error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Monthly Repayment -->
                                    <div>
                                        <label for="monthly_repayment"
                                            class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                            Monthly Payment
                                        </label>
                                        <input type="number" step="0.01" name="monthly_repayment"
                                            id="monthly_repayment" required
                                            class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 placeholder-slate-400 focus:border-primary focus:ring focus:ring-primary/20 dark:border-navy-500 dark:bg-navy-700 dark:text-navy-50 dark:placeholder-navy-300 dark:focus:border-accent"
                                            placeholder="Enter Monthly Payment" value="{{ old('monthly_repayment') }}">
                                        @error('monthly_repayment')
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
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($loans as $loan)
                <div class="card p-4 text-center sm:p-5 relative bg-white dark:bg-navy-800 shadow-md rounded-lg">
                    <div class="absolute top-0 right-0 p-3">
                        <div class="badge rounded-full bg-info/10 text-info dark:bg-info/15">
                            Recommended
                        </div>
                    </div>
                    <div class="mt-8">
                        <i class="fa fa-plane text-6xl text-primary dark:text-accent-light"></i>
                    </div>
                    <div class="mt-5">
                        <h4 class="text-xl font-semibold text-slate-600 dark:text-navy-100">
                            {{ $loan->loan_type }}
                        </h4>
                    </div>
                    <div class="mt-5">
                        <span
                            class="text-4xl tracking-tight text-primary dark:text-accent-light">${{ number_format($loan->amount, 2) }}</span><br>
                        <b>/{{ $loan->repayment_period }} Months</b>
                    </div>
                    <div class="mt-8 space-y-4 text-left">
                        <div class="flex items-start space-x-3">
                            <div
                                class="flex size-6 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary dark:bg-accent/10 dark:text-accent-light">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <span class="font-medium">Interest Rate <b>{{ $loan->interest_rate }}%</b></span>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div
                                class="flex size-6 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary dark:bg-accent/10 dark:text-accent-light">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <span class="font-medium">Monthly Repayment
                                <b>${{ number_format($loan->monthly_repayment, 2) }}</b></span>
                        </div>
                    </div>
                    <div class="mt-8">

                        <form action="{{ route('admin.loans.delete', $loan->id) }}" method="POST"
                            class="w-full mt-5"
                            onsubmit="return confirm('Are you sure you want to delete this Loan Plan?');">
                            @csrf
                            @method('DELETE')
                            <div class="flex justify-center">
                                <button type="submit"
                                    class="btn mt-5 space-x-2 rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                    <span>Delete Loan</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500 dark:text-navy-300 col-span-full">No loan plans available.</p>
            @endforelse
        </div>
        </div>
    </main>

</x-app-layout>
