<title>{{ $post->title }}</title>

<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="bg-white shadow rounded-lg min-w-fit min-h-full mx-4 p-4 sm:py-8 sm:px-6 lg:px-8">
        <article class="group">
            <img alt="" src="{{ asset('images/' . $post->image_path) }}"
                class="h-64 w-full rounded-xl object-cover transition group-hover:grayscale-[50%]" />
            <div class="p-4 mt-4">
                <h2 class="font-semibold text-3xl title-color leading-tight">
                    {{ $post->title }}
                </h2>
                <div class="my-2 grid grid-cols-1 gap-4 lg:grid-cols-[1fr_240px] lg:gap-8">

                    <div class="h-fit rounded-lg">
                        <div class="mt-2 text-justify text-sm/relaxed font-medium text-color"
                            style="white-space: pre-line;">
                            {!! strip_tags(nl2br(e($post->description))) !!}
                        </div>
                    </div>
                    <div class="h-56 w-fit rounded-lg bg-white border shadow-md sm:h-56 sm:w-fit sm:px-2">
                        <div class="w-11/12 m-2 border-b-2 border-gray-900/10 pb-4">
                            <!-- straight grey line at the bottom -->
                            <div
                                class="rounded-lg p-4 shadow-red-100 sm:inline-flex sm:shrink-0 sm:items-center sm:gap-6">
                                <div
                                    class="h-20 w-20 justify-center items-center flex bg-white border border-stone-300 rounded-md object-cover md:h-16 md:w-16 sm:h-12 sm:w-12">
                                    <dl>
                                        <div class="text-base font-bold text-center sm:text-xs md:text-sm">
                                            {{ date('d', strtotime($post->date)) }}
                                        </div>
                                        <div class="text-base font-bold text-center sm:text-xs md:text-sm">
                                            {{ date('F', strtotime($post->date)) }}
                                        </div>
                                    </dl>
                                </div>
                                <div class="flex items-center gap-8 text-xs">
                                    <dl>
                                        <div>
                                            <dt class="sr-only">Day</dt>
                                            <dd class="text-base font-bold text-gray-900 sm:text-xs md:text-sm">
                                                {{ \Carbon\Carbon::parse($post->created_at)->format('l') }}</dd>
                                        </div>

                                        <div>
                                            <dt class="sr-only">Date</dt>
                                            <dd class="text-base font-bold text-gray-900 sm:text-xs md:text-sm">
                                                {{ date('d F Y', strtotime($post->date)) }}</dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="text-sm font-thin text-center">
                            {{ $post->location }}
                        </div>
                        <div class="flex items-center gap-8 text-xs">
                            <div class="mx-auto sm:inline-flex sm:justify-center sm:shrink-0 sm:items-center sm:gap-2">

                                @if (Auth::user()->userType == 'admin')
                                    <span
                                        class="float-right -space-x-px overflow-hidden rounded-md border bg-white shadow-sm my-4">
                                        <a
                                            class="inline-flex items-center px-4 py-2 bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 focus:bg-blue-800 active:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                            href="{{ route('post.attendance', ['post' => $post->id]) }}">
                                            View attendance list
                                        </a>
                                    </span>
                                @else
                                    @if (!$post->attendances()->where('user_id', Auth::id())->exists())
                                        <span
                                            class="float-right -space-x-px overflow-hidden rounded-md border bg-white shadow-sm my-4">
                                            <a class="inline-flex items-center px-4 py-2 bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 focus:bg-blue-800 active:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                                href="{{ route('post.join', ['post' => $post->id]) }}">
                                                Join
                                            </a>
                                        </span>
                                    @else
                                        <span
                                            class="float-right -space-x-px overflow-hidden rounded-md border bg-white shadow-sm my-4">
                                            <a class="inline-flex items-center px-4 py-2 bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest opacity-50 cursor-not-allowed hover:bg-blue-800 focus:bg-blue-800 active:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                                disabled>
                                                Joined
                                            </a>
                                        </span>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-8">
                    <div class="h-fit rounded-lg lg:col-span-2">
                        <div class="flex items-center justify-start gap-4 pt-4">
                            @if (Auth::user()->userType != 'admin')
                                <a href="/home"
                                    class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                                    Return </a>
                            @else
                                <a href="/admin/home"
                                    class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                                    Return </a>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </article>
    </div>
</x-app-layout>
