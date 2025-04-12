<x-app-layout>
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                Investment
            </h2>
            <div class="hidden h-full py-1 sm:flex">
                <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
            </div>
            <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                <li class="flex items-center space-x-2">
                    <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                        href="#">History
                    </a>
                </li>
            </ul>
        </div>

        <!-- Full Width Zebra Table -->
        <div class="card pb-4">
            <div class="my-3 flex h-8 items-center justify-between px-4 sm:px-5">
                <h2 class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
                    Investment History Details
                </h2>
            </div>
            <div>
                <div class="mt-5">
                    <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                        <table class="is-zebra w-full text-left">
                            <thead>
                                <tr>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        #
                                    </th>

                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        Amount
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        Roi
                                    </th>

                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        Status
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                       Start Date
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                       End Date
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($investments as $investment)
                                <tr>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5"> {{$investment->id}}</td>
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                       {{$investment->amount}}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                       {{$investment->expected_profit}}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                       {{$investment->status}}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        {{$investment->start_date}}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        {{$investment->end_date}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="code-wrapper hidden px-4 pt-4 sm:px-5">
                <pre class="is-scrollbar-hidden max-h-96 overflow-auto rounded-lg" x-init="hljs.highlightElement($el)">
            <code class="language-html" x-ignore>
&lt;div class=&quot;is-scrollbar-hidden min-w-full overflow-x-auto&quot;&gt;&#13;&#10;    &lt;table class=&quot;is-zebra w-full text-left&quot;&gt;&#13;&#10;      &lt;thead&gt;&#13;&#10;        &lt;tr&gt;&#13;&#10;          &lt;th&#13;&#10;            class=&quot;whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5&quot;&#13;&#10;          &gt;&#13;&#10;            #&#13;&#10;          &lt;/th&gt;&#13;&#10;          &lt;th&#13;&#10;            class=&quot;whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5&quot;&#13;&#10;          &gt;&#13;&#10;            Name&#13;&#10;          &lt;/th&gt;&#13;&#10;          &lt;th&#13;&#10;            class=&quot;whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5&quot;&#13;&#10;          &gt;&#13;&#10;            Job&#13;&#10;          &lt;/th&gt;&#13;&#10;          &lt;th&#13;&#10;            class=&quot;whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5&quot;&#13;&#10;          &gt;&#13;&#10;            Favorite Color&#13;&#10;          &lt;/th&gt;&#13;&#10;        &lt;/tr&gt;&#13;&#10;      &lt;/thead&gt;&#13;&#10;      &lt;tbody&gt;&#13;&#10;        &lt;tr&gt;&#13;&#10;          &lt;td class=&quot;whitespace-nowrap px-4 py-3 sm:px-5&quot;&gt;1&lt;/td&gt;&#13;&#10;          &lt;td class=&quot;whitespace-nowrap px-4 py-3 sm:px-5&quot;&gt;Cy Ganderton&lt;/td&gt;&#13;&#10;          &lt;td class=&quot;whitespace-nowrap px-4 py-3 sm:px-5&quot;&gt;&#13;&#10;            Quality Control Specialist&#13;&#10;          &lt;/td&gt;&#13;&#10;          &lt;td class=&quot;whitespace-nowrap px-4 py-3 sm:px-5&quot;&gt;Blue&lt;/td&gt;&#13;&#10;        &lt;/tr&gt;&#13;&#10;        &lt;tr&gt;&#13;&#10;          &lt;td class=&quot;whitespace-nowrap px-4 py-3 sm:px-5&quot;&gt;2&lt;/td&gt;&#13;&#10;          &lt;td class=&quot;whitespace-nowrap px-4 py-3 sm:px-5&quot;&gt;Hart Hagerty&lt;/td&gt;&#13;&#10;          &lt;td class=&quot;whitespace-nowrap px-4 py-3 sm:px-5&quot;&gt;&#13;&#10;            Desktop Support Technician&#13;&#10;          &lt;/td&gt;&#13;&#10;          &lt;td class=&quot;whitespace-nowrap px-4 py-3 sm:px-5&quot;&gt;Purple&lt;/td&gt;&#13;&#10;        &lt;/tr&gt;&#13;&#10;        &lt;tr&gt;&#13;&#10;          &lt;td class=&quot;whitespace-nowrap px-4 py-3 sm:px-5&quot;&gt;3&lt;/td&gt;&#13;&#10;          &lt;td class=&quot;whitespace-nowrap px-4 py-3 sm:px-5&quot;&gt;Brice Swyre&lt;/td&gt;&#13;&#10;          &lt;td class=&quot;whitespace-nowrap px-4 py-3 sm:px-5&quot;&gt;Tax Accountant&lt;/td&gt;&#13;&#10;          &lt;td class=&quot;whitespace-nowrap px-4 py-3 sm:px-5&quot;&gt;Red&lt;/td&gt;&#13;&#10;        &lt;/tr&gt;&#13;&#10;        &lt;tr&gt;&#13;&#10;          &lt;td class=&quot;whitespace-nowrap px-4 py-3 sm:px-5&quot;&gt;4&lt;/td&gt;&#13;&#10;          &lt;td class=&quot;whitespace-nowrap px-4 py-3 sm:px-5&quot;&gt;Marjy Ferencz&lt;/td&gt;&#13;&#10;          &lt;td class=&quot;whitespace-nowrap px-4 py-3 sm:px-5&quot;&gt;&#13;&#10;            Office Assistant I&#13;&#10;          &lt;/td&gt;&#13;&#10;          &lt;td class=&quot;whitespace-nowrap px-4 py-3 sm:px-5&quot;&gt;Crimson&lt;/td&gt;&#13;&#10;        &lt;/tr&gt;&#13;&#10;      &lt;/tbody&gt;&#13;&#10;    &lt;/table&gt;&#13;&#10;  &lt;/div&gt;</code>
          </pre>
            </div>
        </div>
        </div>
    </main>
    </div>
    
</x-app-layout>
