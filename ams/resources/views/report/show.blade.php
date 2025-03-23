<title>{{ $post->title }}</title>

<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="bg-white shadow rounded-lg min-w-fit min-h-full mx-4 p-4 sm:py-8 sm:px-6 lg:px-8">
        <div id="report-data">
            <div class="border-b-2 border-gray-900/10 pb-4"> <!-- straight grey line at the bottom -->
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $post->title }}
                </h2>
            </div>
            @if ($report)
                @if ($report->exists)
                    <article class="group">
                        <div class="p-4 mt-4">

                            <div class="flex items-center gap-8 text-xs">
                                <dl>
                                    <div>
                                        <dt class="sr-only">Day</dt>
                                        <dd class="text-base font-bold text-gray-900">
                                            {{ \Carbon\Carbon::parse($report->date)->format('l') }}</dd>
                                    </div>

                                    <div>
                                        <dt class="sr-only">Date</dt>
                                        <dd class="text-base font-bold text-gray-900">
                                            {{ date('d F Y', strtotime($report->date)) }}</dd>
                                    </div>
                                    <div>
                                        <dt class="sr-only">Location</dt>
                                        <dd class="text-base font-bold text-gray-900">
                                            {{ $report->location }}</dd>
                                    </div>
                                </dl>
                            </div>
                            <div class="mt-2 text-justify text-sm/relaxed text-gray-500" style="white-space: pre-line;">
                                {{ $report->description }}
                            </div>
                        </div>
                    </article>
                @else
                    <p class="text-center m-12 text-lg text-gray-500">No report available.</p>
                @endif
            @else
                <p class="text-center m-12 text-lg text-gray-500">No report available.</p>
            @endif
        </div>
        <div class="flex items-center justify-end m-4 gap-4 pt-4">
            <a href="/admin/reports"
                class="inline-flex items-center px-4 py-2 bg-slate-200 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-slate-100 focus:bg-slate-100 active:bg-slate-300 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Return
            </a>
            <button
                class="inline-flex items-center px-4 py-2 bg-blue-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 focus:bg-blue-800 active:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150"
                id="print-pdf-button">
                Print to PDF
            </button>
        </div>
    </div>
</x-app-layout>

<script>
    function initHtml2Pdf() {
        document.getElementById('print-pdf-button').addEventListener('click', function() {
            var reportHTML = document.getElementById('report-data');
            var html = reportHTML.outerHTML;

            var options = {
                margin: 1,
                filename: 'report.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'letter',
                    orientation: 'portrait'
                }
            };

            html2pdf().set(options).from(html).save();
        });
    }
    if (typeof html2pdf !== 'undefined') {
        initHtml2Pdf();
    } else {
        document.addEventListener('DOMContentLoaded', initHtml2Pdf);
    }
</script>
