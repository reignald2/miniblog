<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Post
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('posts.update', $post) }}">
                    @csrf
                    @method('PUT')

                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Title
                        </label>
                        <input type="text" name="title" id="title"
                               value="{{ old('title', $post->title) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                      focus:border-indigo-500 focus:ring-indigo-500
                                      dark:bg-gray-700 dark:text-gray-200 sm:text-sm" required>
                    </div>

                    <!-- Content -->
                    <div class="mt-4">
                        <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Content
                        </label>
                        <textarea name="content" id="content" rows="6"
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                         focus:border-indigo-500 focus:ring-indigo-500
                                         dark:bg-gray-700 dark:text-gray-200 sm:text-sm" required>{{ old('content', $post->content) }}</textarea>
                    </div>

                    <!-- Actions -->
                    <div class="mt-6 flex items-center justify-between">
                        <a href="{{ route('posts.index') }}"
                           class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                            Cancel
                        </a>

                        <button type="submit"
                                class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                            Update Post
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
