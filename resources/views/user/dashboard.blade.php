<x-app-layout>
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <div class="col-span-12 lg:col-span-8">
                <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
                    <div :class="$store.breakpoints.smAndUp && 'card px-5 pb-3'">
                        <div class="flex items-center justify-between sm:py-3">
                            <h3 class="text-base font-medium text-slate-800 dark:text-navy-50">
                                Statistics
                            </h3>

                            <div class="flex space-x-4 font-inter text-slate-700 dark:text-navy-100"
                                x-data="{ activeTab: '12hr' }">
                                <div
                                    class="hidden w-full justify-between space-x-4 font-inter text-slate-700 dark:text-navy-100 sm:flex">
                                    <button @click="activeTab = '1wk'" class="font-medium tracking-wide"
                                        :class="activeTab === '1wk' && 'text-primary dark:text-accent-light'">
                                        1 Wk
                                    </button>

                                    <button @click="activeTab = '5days'" class="font-medium tracking-wide"
                                        :class="activeTab === '5days' && 'text-primary dark:text-accent-light'">
                                        5 days
                                    </button>

                                    <button @click="activeTab = '1days'" class="font-medium tracking-wide"
                                        :class="activeTab === '1days' && 'text-primary dark:text-accent-light'">
                                        1 days
                                    </button>

                                    <button @click="activeTab = '12hr'" class="font-medium tracking-wide"
                                        :class="activeTab === '12hr' && 'text-primary dark:text-accent-light'">
                                        12 Hr
                                    </button>

                                    <button @click="activeTab = '1hr'" class="font-medium tracking-wide"
                                        :class="activeTab === '1hr' && 'text-primary dark:text-accent-light'">
                                        1 Hr
                                    </button>
                                </div>


                            </div>
                        </div>
                        <div>
                            <div x-init="$nextTick(() => {
                                $el._x_chart = new ApexCharts($el, pages.charts.cryptoCandlestick);
                                $el._x_chart.render()
                            });"></div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 sm:order-first sm:grid-cols-4 sm:gap-5 lg:gap-6">
                        <div class="rounded-lg border border-slate-150 p-3 dark:border-navy-700">
                            <div class="flex justify-between space-x-1">
                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                                    ${{ number_format($user->balance)  }}
                                </p>
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-8 text-warning" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <p class="mt-1 text-xs+ line-clamp-1"><b>Balance</b></p>
                        </div>
                        <div class="rounded-lg border border-slate-150 p-3 dark:border-navy-700">
                            <div class="flex justify-between">
                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                                    ${{ number_format($withdrawals, 2) }}
                                </p>
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-8 text-warning" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <p class="mt-1 text-xs+ line-clamp-1"><b>Total Withdrawal</b></p>
                        </div>
                        <div class="rounded-lg border border-slate-150 p-3 dark:border-navy-700">
                            <div class="flex justify-between">
                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                                    ${{ number_format($deposits, 2) }}
                                </p>
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-8 text-warning" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <p class="mt-1 text-xs+ line-clamp-1"><b>Total Deposit</b></p>
                        </div>

                    </div>

                </div>
            </div>
            <div class="col-span-12 lg:col-span-4">
                <div class="grid grid-cols-2 gap-4 sm:grid-cols-4 sm:gap-5 lg:grid-cols-2 lg:gap-6">
                    <div
                        class="rounded-lg bg-primary p-4 transition-shadow duration-300 hover:shadow-lg hover:shadow-primary/50 dark:bg-accent dark:shadow-accent/50 dark:hover:shadow-accent/50">
                        <div class="flex size-10 items-center justify-center rounded-lg bg-white/90">
                            <i class="fa-brands fa-btc text-xl text-primary dark:text-accent"></i>
                        </div>
                        <p class="mt-3 text-base font-medium text-white">Bitcoin</p>
                        <div class="mt-8">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>

                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-single-quote.js" async>
                                    {
                                        "symbol": "MARKETSCOM:BITCOIN",
                                        "width": "100%",
                                        "isTransparent": true,
                                        "colorTheme": "light",
                                        "locale": "en"
                                    }
                                </script>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>
                    </div>
                    <div
                        class="rounded-lg bg-warning p-4 transition-shadow duration-300 hover:shadow-lg hover:shadow-warning/50">
                        <div class="flex size-10 items-center justify-center rounded-lg bg-white/90">
                            <i class="fa-solid fa-litecoin-sign text-xl text-warning"></i>
                        </div>
                        <p class="mt-3 text-base font-medium text-white">Litecoin</p>
                        <div class="mt-8">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>

                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-single-quote.js" async>
                                    {
                                        "symbol": "COINBASE:LTCUSD",
                                        "width": "100%",
                                        "isTransparent": true,
                                        "colorTheme": "light",
                                        "locale": "en"
                                    }
                                </script>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>
                    </div>
                    <div
                        class="rounded-lg bg-info p-4 transition-shadow duration-300 hover:shadow-lg hover:shadow-info/50">
                        <div class="flex size-10 items-center justify-center rounded-lg bg-white/90">
                            <i class="fa-brands fa-ethereum text-xl text-info"></i>
                        </div>
                        <p class="mt-3 text-base font-medium text-white">Ethereum</p>
                        <div class="mt-8">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-single-quote.js" async>
                                    {
                                        "symbol": "COINBASE:ETHUSD",
                                        "width": "100%",
                                        "isTransparent": true,
                                        "colorTheme": "light",
                                        "locale": "en"
                                    }
                                </script>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>
                    </div>
                    <div
                        class="rounded-lg bg-secondary p-4 transition-shadow duration-300 hover:shadow-lg hover:shadow-secondary/50">
                        <div class="flex size-10 items-center justify-center rounded-lg bg-white/90">
                            <i class="fa-solid fa-bitcoin-sign text-xl text-secondary"></i>
                        </div>
                        <p class="mt-3 text-base font-medium text-white">
                            Bitcoin Cash
                        </p>
                        <div class="mt-8">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>

                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-single-quote.js" async>
                                    {
                                        "symbol": "KRAKEN:BCHUSD",
                                        "width": "100%",
                                        "isTransparent": true,
                                        "colorTheme": "light",
                                        "locale": "en"
                                    }
                                </script>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </main>
    </div>



</x-app-layout>
