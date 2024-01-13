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

                    {{-- Add a button to link to the create page --}}
                    <a href="{{ route('faq.category.create') }}" class="text-blue-500 hover:underline mb-4 block">
                        {{ __('Create FAQ Category') }}
                    </a>

                    @foreach($faqCategories as $category)
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold mb-4">{{ $category->name }}</h3>
                            <div class="space-x-4">
                                <a href="{{ route('faq.category.edit', $category->id) }}" class="text-blue-500 hover:underline">
                                    {{ __('Edit Category') }}
                                </a>

                                <form method="post" action="{{ route('faq.category.destroy', $category->id) }}" class="inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure you want to delete this category?')">
                                        {{ __('Delete Category') }}
                                    </button>
                                </form>
                            </div>
                        </div>

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
