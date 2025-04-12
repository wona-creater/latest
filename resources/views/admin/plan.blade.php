{{-- <x-app-layout>
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                Investment Plans
            </h2>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($investmentplans as $investmentplan)
                <div class="card" x-data="{
                    amount: '',
                    minAmount: {{ $investmentplan->min_amount ?? 0 }},
                    maxAmount: {{ $investmentplan->max_amount ?? 0 }},
                    profitPercentage: {{ $investmentplan->profit_percentage ?? 0 }},
                    duration: {{ $investmentplan->duration ?? 0 }},
                    expectedProfit: '',
                    startDate: '',
                    endDate: '',
                    calculateValues() {
                        if (this.amount && this.amount >= this.minAmount && this.amount <= this.maxAmount) {
                            this.expectedProfit = ((this.amount * this.profitPercentage) / 100).toFixed(2);
                            const today = new Date();
                            this.startDate = today.toISOString().split('T')[0];
                            const end = new Date(today);
                            end.setDate(today.getDate() + parseInt(this.duration));
                            this.endDate = end.toISOString().split('T')[0];
                        } else {
                            this.expectedProfit = '';
                            this.startDate = '';
                            this.endDate = '';
                        }
                    }
                }">
                    <div class="rounded-t-lg bg-primary p-4 text-center dark:bg-accent sm:p-5">
                        <p class="mt-3 text-indigo-100">Plan</p>
                        <p class="text-xl font-medium text-white mb-5">{{ $investmentplan->name }}</p>
                        <p class="mt-3 text-5xl font-semibold text-white">{{ $investmentplan->profit_percentage }}</p>
                        <p class="mt-3 text-indigo-100">Percentage</p>
                    </div>
                    <div class="p-4 sm:p-5">
                        <form action="{{ route('user.invests') }}" method="POST">
                            @csrf
                            <input type="hidden" name="plan_id" value="{{ $investmentplan->id }}">
                            <div class="mt-3 space-y-4 text-left">
                                <div class="flex items-start space-x-3">
                                    <div class="flex size-6 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary dark:bg-accent/10 dark:text-accent-light">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </div>
                                    <span class="font-medium">Min_Amount <b>${{ $investmentplan->min_amount }}</b></span>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <div class="flex size-6 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary dark:bg-accent/10 dark:text-accent-light">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </div>
                                    <span class="font-medium">Max_Amount <b>${{ $investmentplan->max_amount }}</b></span>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <div class="flex size-6 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary dark:bg-accent/10 dark:text-accent-light">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </div>
                                    <span class="font-medium">Duration <b>{{ $investmentplan->duration }} days</b></span>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <div class="flex size-6 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary dark:bg-accent/10 dark:text-accent-light">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </div>
                                    <span class="font-medium">
                                        <input
                                            class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="amount" type="number" name="amount"
                                            x-model="amount" @input="calculateValues" />
                                    </span>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <div class="flex size-6 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary dark:bg-accent/10 dark:text-accent-light">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </div>
                                    <span class="font-medium">
                                        <label class="block">
                                            <input
                                                class="form-input w-full rounded-lg bg-transparent px-3 py-2 placeholder:text-slate-400/70 disabled:pointer-events-none disabled:select-none disabled:bg-zinc-100 dark:disabled:bg-navy-600"
                                                placeholder="Expected Profit" type="text" name="expected_profit"
                                                x-model="expectedProfit" readonly />
                                        </label>
                                    </span>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <div class="flex size-6 shrink-0 items-center justify-center rounded-full bg-warning/10 text-warning">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </div>
                                    <span class="font-medium">
                                        <label class="block">
                                            <input
                                                class="form-input w-full rounded-lg bg-transparent px-3 py-2 placeholder:text-slate-400/70 disabled:pointer-events-none disabled:select-none disabled:bg-zinc-100 dark:disabled:bg-navy-600"
                                                placeholder="Start Date" type="text" name="start_date"
                                                x-model="startDate" readonly />
                                        </label>
                                    </span>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <div class="flex size-6 shrink-0 items-center justify-center rounded-full bg-warning/10 text-warning">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </div>
                                    <span class="font-medium">
                                        <label class="block">
                                            <input
                                                class="form-input w-full rounded-lg bg-transparent px-3 py-2 placeholder:text-slate-400/70 disabled:pointer-events-none disabled:select-none disabled:bg-zinc-100 dark:disabled:bg-navy-600"
                                                placeholder="End Date" type="text" name="end_date"
                                                x-model="endDate" readonly />
                                        </label>
                                    </span>
                                </div>
                            </div>
                            <div class="mt-8">
                                <button
                                    class="btn w-full h-10 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                    Choose Plan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Optionally display user's current investments -->

    </main>

    @push('scripts')
        <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @endpush


</x-app-layout>

 --}}
