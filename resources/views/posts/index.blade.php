<x-app-layout>
    <div class="max-w-4xl mx-auto py-8">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-gray-800">📚 All Posts</h1>
            <a href="{{ route('posts.create') }}"
               class="px-4 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700">
                ➕ New Post
            </a>
        </div>

        @if (session('success'))
            <div class="mb-4 p-4 rounded bg-green-100 text-green-700">
                {{ session('success') }}
            </div>
        @endif

        @forelse ($posts as $post)
            <div class="mb-6 p-6 rounded-lg border border-gray-200 shadow-sm bg-white">
                <h2 class="text-2xl font-semibold text-gray-900">
                    <a href="{{ route('posts.show', $post) }}" class="hover:text-indigo-600">
                        {{ $post->title }}
                    </a>
                </h2>
                <p class="mt-2 text-gray-700">
                    {{ Str::limit($post->content, 150) }}
                </p>
                <div class="mt-4 flex items-center justify-between text-sm text-gray-500">
                    <span>By {{ $post->user->name }} • {{ $post->created_at->diffForHumans() }}</span>
                    @if(auth()->check() && auth()->id() === $post->user_id)
                        <div class="flex space-x-3">`
                            <a href="{{ route('posts.edit', $post) }}"
                               class="text-indigo-600 hover:underline">Edit</a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST"
                                  onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <p class="text-gray-600">No posts yet. Why not <a href="{{ route('posts.create') }}" class="text-indigo-600 hover:underline">create one</a>?</p>
        @endforelse
    </div>
</x-app-layout>
