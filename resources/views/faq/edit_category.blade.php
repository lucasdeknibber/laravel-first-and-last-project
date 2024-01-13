<!-- resources/views/faq/edit_category.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit FAQ Category') }}
        </h2>
    </x-slot>

    <section class="mt-6">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <form method="post" action="{{ route('faq.category.update', $category->id) }}" class="space-y-4">
                @csrf
                @method('put')

                <div>
                    <x-input-label for="name" :value="__('Category Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 w-full" value="{{ $category->name }}" required />
                    <x-input-error :messages="$errors->faqCategory->get('name')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>{{ __('Update Category') }}</x-primary-button>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
