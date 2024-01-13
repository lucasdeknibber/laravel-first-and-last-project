<!-- resources/views/faq.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Frequently Asked Questions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @foreach($faqCategories as $category)
                        <h3 class="text-lg font-semibold mb-4">{{ $category->name }}</h3>
                        <ul>
                            @foreach($category->faqItems as $item)
                                <li>
                                    <strong>Q: {{ $item->question }}</strong>
                                    <p>A: {{ $item->answer }}</p>
                                </li>
                            @endforeach
                        </ul>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
