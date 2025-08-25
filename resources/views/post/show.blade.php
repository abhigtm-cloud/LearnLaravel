<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <article class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg p-8">
                <!-- Post Title -->
                <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 dark:text-gray-100 mb-4 leading-tight">
                    {{ $post->title }}
                </h1>

                <!-- User and Post Metadata -->
                <div class="flex items-start gap-4 text-gray-500 dark:text-gray-400 mb-6">
                    <!-- User Avatar -->
                    <x-user-avatar :user="$post->user" />
                    
                    <div>
                        {{-- User Name --}}
                        <a href="#" class="font-semibold text-gray-900 dark:text-white hover:underline transition-colors duration-200 block">
                            {{ $post->user->name }}
                        </a>
                        
                        {{-- Post Info --}}
                        <div class="flex items-center gap-2 text-sm mt-1">
                            <span>{{ $post->readTime() }} min read</span>
                            &middot;
                            <span>{{ $post->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                </div>

                {{-- Edit/Delete Buttons for Post Owner --}}
                @if ($post->user_id === Auth::id())
                    <div class="flex gap-4 items-center py-4 my-8 border-t border-b border-gray-200 dark:border-gray-700">
                        <a href="#" class="inline-flex items-center px-6 py-2 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Edit Post
                        </a>
                        <form action="#" method="post" class="inline-block">
                            @csrf
                            @method('delete')
                            <button type="submit" class="inline-flex items-center px-6 py-2 text-sm font-semibold text-white bg-red-600 rounded-lg hover:bg-red-700 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                Delete Post
                            </button>
                        </form>
                    </div>
                @endif
                
                <!-- Clap Section (Top) -->
                <div class="mb-8">
                    <x-clap-button :post="$post" />
                </div>

                <!-- Post Content and Image -->
                <div class="prose dark:prose-invert max-w-none text-gray-700 dark:text-gray-300">
                    <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}" class="w-full h-auto max-h-[500px] object-cover rounded-lg shadow-md mb-8">
                    <div class="post-content leading-relaxed text-lg font-serif break-words">
                        {{ $post->content }}
                    </div>
                </div>

                <!-- Post Category Tag -->
                <div class="mt-8">
                    <span class="inline-block px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-full font-medium text-sm">
                        {{ $post->category->name }}
                    </span>
                </div>

                <!-- Clap Section (Bottom) -->
                <div class="mt-8 pt-8 border-t border-gray-200 dark:border-gray-700">
                    <x-clap-button :post="$post" />
                </div>
            </article>
        </div>
    </div>
</x-app-layout>
