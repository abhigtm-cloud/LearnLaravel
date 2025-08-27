<x-app-layout>
    <div class="py-8 bg-gray-50 dark:bg-gray-900 transition-colors duration-500">
        <div class="max-w-4xl mx-auto px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg p-10">
                <h1 class="text-4xl md:text-5xl font-extrabold mb-6 text-center text-gray-900 dark:text-white">{{ $post->title }}</h1>

                <!-- User Avatar and Info -->
                <div class="flex items-center gap-4 mb-8">
                    <x-user-avatar :user="$post->user" class="w-12 h-12 rounded-full" />
                    <div>
                        <div class="flex items-center gap-2">
                            <a href="{{route("profile.show",$post->user)}}" class="hover:underline text-gray-900 dark:text-white font-medium">
                                {{ $post->user->name }}
                            </a>
                            <button class="text-indigo-600 dark:text-indigo-400 text-sm font-medium">
                                Follow
                            </button>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400">
                            <span>{{ $post->readTime() }} min read</span>
                            <span class="text-gray-400 dark:text-gray-600">·</span>
                            <span>{{ $post->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Clap Section -->
                <div class="mb-8">
                    <x-clap-button />
                </div>

                <!-- Featured Image -->
                @if($post->image)
                <div class="mt-8">
                    <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}" class="w-full rounded-xl shadow-lg">
                </div>
                @endif
                
                <!-- Content Section -->
                <div class="mt-16 text-gray-800 dark:text-gray-200 leading-relaxed text-lg">
                    {!! nl2br(e($post->content)) !!}
                </div>

                <div class="mt-10">
                    <span class="inline-block px-5 py-2 bg-indigo-100 dark:bg-indigo-900 rounded-full text-sm font-semibold text-indigo-700 dark:text-indigo-300">
                        {{ $post->category->name }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
