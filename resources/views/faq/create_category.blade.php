<!-- resources/views/faq/create_category.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Create FAQ Category') }}
        </h2>
    </x-slot>

    <section class="mt-6">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <form method="post" action="{{ route('faq.category.store') }}" class="space-y-4">
                @csrf

                <div>
                    <x-input-label for="name" :value="__('Category Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 w-full" required />
                    <x-input-error :messages="$errors->faqCategory->get('name')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>{{ __('Create Category') }}</x-primary-button>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
