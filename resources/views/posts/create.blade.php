<x-app-layout>
    <div class="max-w-3xl mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">✍️ Create a New Post</h1>

        @if ($errors->any())
            <div class="mb-4 p-4 rounded bg-red-100 text-red-700">
                <ul class="list-disc pl-6">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title"
                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                       placeholder="Enter post title" required>
            </div>

            <div>
                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                <textarea name="content" id="content" rows="6"
                          class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                          placeholder="Write your post here..." required></textarea>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('posts.index') }}"
                   class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100">
                   Cancel
                </a>
                <button type="submit"
                        class="ml-3 px-4 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700">
                    Publish
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
