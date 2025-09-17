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
                            
                            @if (auth()->check() && auth()->user()->id !== $post->user->id)
                            <x-follow-ctr :user="$post->user">
                                <button @click="follow()" 
                                    class="px-3 py-1 text-sm font-medium rounded-full transition-all duration-200"
                                    x-text="following ? 'Following' : 'Follow'"
                                    :class="following ? 
                                        'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600' : 
                                        'bg-indigo-600 dark:bg-indigo-500 text-white hover:bg-indigo-700 dark:hover:bg-indigo-400'">
                                </button>
                            </x-follow-ctr>
                            @elseif (!auth()->check())
                            <a href="{{ route('login') }}" class="px-3 py-1 bg-indigo-600 text-white text-sm font-medium rounded-full hover:bg-indigo-700 transition-all duration-200">
                                Follow
                            </a>
                            @endif
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
                    <x-clap-button  :post="$post"/>
                </div>

                <!-- Edit and Delete Buttons -->
                @if(auth()->check() && auth()->user()->id === $post->user->id)
                <div class="flex gap-3 mb-8">
                    <a href="{{ route('post.edit',$post) }}" 
                       class="inline-flex items-center px-4 py-2 bg-blue-600 dark:bg-blue-500 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-blue-700 dark:hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition-all duration-200 ease-in-out transform hover:scale-105">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit Post
                    </a>
                    
                    <form method="POST" action="{{ route('post.destroy', $post) }}" class="inline-block" 
                          onsubmit="return confirm('Are you sure you want to delete this post? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="inline-flex items-center px-4 py-2 bg-red-600 dark:bg-red-500 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-red-700 dark:hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition-all duration-200 ease-in-out transform hover:scale-105">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Delete Post
                        </button>
                    </form>
                </div>
                @endif
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
