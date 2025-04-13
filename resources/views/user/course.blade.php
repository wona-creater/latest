<x-app-layout>

    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="py-5 text-center lg:py-6">
            <p class="text-sm uppercase">Crypto Education Courses</p>
            <h3 class="mt-1 text-xl font-semibold text-slate-600 dark:text-navy-100">
                Learn to trade, invest, and master blockchain
            </h3>
        </div>

        @error('name')
            <span class="error">{{ $message }}</span>
        @enderror

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3 lg:gap-6 xl:grid-cols-4">
            @foreach ($courses as $course)
                <input type="hidden" name="course_id" value="{{ $course->id }}">
                <div class="card grow items-center p-4 sm:p-5">
                    <h3 class="pt-3 text-lg font-medium text-slate-700 dark:text-navy-100">Title</h3>
                    <p class="text-xs+">{{ $course->title }}</p>

                    <h3 class="pt-3 text-lg font-medium text-slate-700 dark:text-navy-100">Instructor</h3>
                    <p class="text-xs+">{{ $course->instructor }}</p>

                    <h3 class="pt-3 text-lg font-medium text-slate-700 dark:text-navy-100">Rating</h3>
                    <p class="text-xs+">{{ $course->rating }}</p>

                    <h3 class="pt-3 text-lg font-medium text-slate-700 dark:text-navy-100">No. of Student</h3>
                    <p class="text-xs+">{{ $course->student_count }}</p>

                    <div class="my-4 h-px w-full bg-slate-200 dark:bg-navy-500"></div>

                    <h3 class="pt-3 text-lg font-medium text-slate-700 dark:text-navy-100">Price</h3>
                    <p class="text-xs+">${{ number_format($course->price, 2) }}</p>

                    <h3 class="pt-3 text-lg font-medium text-slate-700 dark:text-navy-100">Duration</h3>
                    <p class="text-xs+">{{ $course->duration }}</p>

                    <h3 class="pt-3 text-lg font-medium text-slate-700 dark:text-navy-100">Category</h3>
                    <p class="text-xs+">{{ $course->category }}</p>
                    <form action="{{ route('course.store') }}" method="POST" class="w-full mt-5">
                        @csrf
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        <div class="flex justify-center">
                            <button type="submit"
                                class="btn mt-5 space-x-2 rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                <span>Buy Course</span>
                            </button>
                        </div>


                    </form>
                </div>
            @endforeach
        </div>
        </form>
    </main>


    @push('scripts')
        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    Swal.fire({
                        icon: 'success',
                        text: "{{ addslashes(session('success')) }}",
                        timer: 3000,
                        showConfirmButton: false,
                        background: '#f0fdf4',
                        iconColor: '#10B981',
                        customClass: {
                            popup: 'rounded-xl'
                        }
                    });
                });
            </script>
        @endif
        @if (session('error'))
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    Swal.fire({
                        icon: 'error',
                        text: "{{ addslashes(session('error')) }}",
                        timer: 3000,
                        showConfirmButton: false,
                        background: '#fef2f2',
                        iconColor: '#EF4444',
                        customClass: {
                            popup: 'rounded-xl'
                        }
                    });
                });
            </script>
        @endif
    @endpush


</x-app-layout>
