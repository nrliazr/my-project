@section('title', 'Home')

<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="bg-white rounded-lg min-w-fit min-h-full mx-4 p-4 sm:py-8 sm:px-6 lg:px-8">

        @if (session()->has('message'))
            <div role="alert" id="alert-message" class="rounded-xl bg-white shadow-md p-4 my-4">
                <div class="flex items-start gap-4">
                    <span class="text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </span>

                    <div class="flex-1">
                        <strong class="block font-medium title-color">{{ session()->get('message') }}</strong>
                    </div>

                    <button class="title-color transition hover:text-gray-600">
                        <span class="sr-only">Dismiss popup</span>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <script>
                setTimeout(function() {
                    document.getElementById('alert-message').style.display = 'none';
                }, 5000); // hide the message after 3 seconds
            </script>
        @endif


        @foreach ($posts as $post)
            <article class="mb-4 rounded-lg shadow-md">
                <div class=" rounded-lg p-4 sm:p-6">
                    <div class="grid grid-cols-1 gap-2 lg:grid-cols-3 lg:gap-8">
                        <div class="h-56 rounded-lg bg-gray-200">
                            <img alt="" src="{{ asset('images/' . $post->image_path) }}"
                                class="h-56 w-full object-cover rounded-lg" alt="" />
                        </div>
                        <div class="h-56 rounded-lg lg:col-span-2">
                            <div class=" flex gap-1 justify-between">
                                <h3 class="mt-0.5 text-xl font-extrabold title-color">{{ $post->title }}</h3>
                                <dt class="text-xs font-thin text-gray-600">
                                    <a href="/post/{{ $post->id }}"
                                        class="group mt-2 inline-flex items-center gap-1 text-base font-medium detail-link hover:text-blue-800 sm:text-sm md:text-base">
                                        Find out more
                                        <span aria-hidden="true"
                                            class="block transition-all group-hover:ms-0.5 rtl:rotate-180">
                                            &rarr;
                                        </span>
                                    </a>
                                </dt>
                            </div>

                            <div class="my-2 text-justify line-clamp-5 text-sm/relaxed font-medium text-color"
                                style="white-space: normal;">
                                {!! strip_tags(nl2br(e($post->description))) !!}
                            </div>

                            <dl class="mt-2 flex gap-4 sm:gap-6">
                                <div class="flex flex-col-reverse">
                                    <dt class="text-sm font-medium text-gray-600">Time</dt>
                                    <dd class="text-xs text-gray-500">{{ date('g:i A', strtotime($post->time)) }}</dd>
                                </div>

                                <div class="flex flex-col-reverse">
                                    <dt class="text-sm font-medium text-gray-600">Date</dt>
                                    <dd class="text-xs text-gray-500">{{ date('d F Y', strtotime($post->date)) }}</dd>
                                </div>

                                <div class="flex flex-col-reverse">
                                    <dt class="text-sm font-medium text-gray-600">Location</dt>
                                    <dd class="text-xs text-gray-500">{{ $post->location }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
</x-app-layout>
