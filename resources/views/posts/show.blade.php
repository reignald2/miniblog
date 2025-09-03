<x-app-layout>
    <div class="max-w-4xl mx-auto py-8">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800">{{ $post->title }}</h1>
        </div>
        <div class="p-6 rounded-lg border border-gray-200 shadow-sm bg-white dark:bg-gray-800">
            <p class="text-gray-700 dark:text-gray-300 whitespace-pre-line text-lg">
                {{ $post->content }}
            </p>
            <div class="mt-4 flex items-center justify-between text-sm text-gray-500 dark:text-gray-400">
                <span>
                    By {{ $post->user->name ?? 'Unknown' }} • {{ $post->created_at->diffForHumans() }}
                </span>
                <div class="flex space-x-3">
                    @can('update', $post)
                        <a href="{{ route('posts.edit', $post) }}"
                           class="text-indigo-600 hover:underline">Edit</a>
                    @endcan 
                    @can('delete', $post)
                        <form action="{{ route('posts.destroy', $post) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this post?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    @endcan
                </div>
            </div>
            <div class="mt-6">
                <a href="{{ route('posts.index') }}"
                   class="text-indigo-600 dark:text-indigo-400 hover:underline">
                    ← Back to all posts
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
