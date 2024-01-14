<x-guest-layout>
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <div class="max-w-xl text-white">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                {{ __('Sources') }}
            </h2>
            <ul class="list-disc list-inside">
                <li><a href="{{ url('https://ehb.instructuremedia.com/embed/edeb8a9e-3e8f-4af3-85f9-8be5ae754e7d') }}" target="_blank">Video Source</a></li>
                <li><a href="{{ url('https://www.openai.com/gpt-3/') }}" target="_blank">ChatGPT</a></li>
                <li><a href="{{ url('https://laravel.com/docs/10.x') }}" target="_blank">Laravel Documentation</a></li>
                <li><a href="{{ url('https://www.lipsum.com/') }}" target="_blank">Lipsum Generator</a></li>
                <li><a href="{{ url('https://github.com/lucasdeknibber/laravel-first-and-last-project') }}" target="_blank">github</a></li>
            </ul>
            <!-- Add more sources as needed -->
        </div>
    </div>
</x-guest-layout>
