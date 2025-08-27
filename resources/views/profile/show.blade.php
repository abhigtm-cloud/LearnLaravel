<x-app-layout>
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Hero Profile Section -->
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden mb-12">
                <!-- Cover Background -->
                <div class="h-48 bg-gradient-to-r from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-800 relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 to-purple-600/10 dark:from-blue-400/5 dark:to-purple-400/5"></div>
                </div>
                
                <div class="relative px-8 pb-8">
                    <!-- Profile Avatar (overlapping cover) -->
                    <div class="flex flex-col items-center -mt-16">
                        <div class="relative mb-8">
                            <x-user-avatar :user="$user" size="w-32 h-32" class="ring-4 ring-white dark:ring-gray-800 shadow-xl bg-white dark:bg-gray-800" />
                          
                        </div>
                        
                        <!-- Name and Title -->
                        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4 tracking-tight">{{ $user->name }}</h1>
                        
                        <!-- Stats -->
                        <div class="flex items-center gap-6 text-gray-600 dark:text-gray-300 text-sm mb-8">
                            <div class="flex items-center gap-2">
                                <span x-text="followersCount" class="font-medium text-gray-900 dark:text-white">0</span>
                                <span>followers</span>
                            </div>
                            <div class="w-1 h-1 bg-gray-400 rounded-full"></div>
                            <div class="flex items-center gap-2">
                                <span class="font-medium text-gray-900 dark:text-white">{{ $post->count() }}</span>
                                <span>stories</span>
                            </div>
                        </div>
                        
                        @if($user->bio)
                        <p class="text-lg text-gray-600 dark:text-gray-300 leading-relaxed max-w-2xl mb-10 text-center">{{ $user->bio }}</p>
                        @endif
                        
                        @if (auth()->user() && auth()->user()->id !== $user->id)
                        <div class="flex items-center gap-4 mt-6">
                            <button @click="follow()" 
                                class="inline-flex items-center px-6 py-2 font-medium text-sm rounded-full transition-all duration-200 transform hover:scale-105"
                                x-text="following ? 'Following' : 'Follow'"
                                :class="following ? 
                                    'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600' : 
                                    'bg-gray-900 dark:bg-white text-white dark:text-gray-900 hover:bg-gray-800 dark:hover:bg-gray-100'">
                            </button>
                            
                            <button class="inline-flex items-center gap-2 px-4 py-2 text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white font-medium text-sm hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-all duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                                Message
                            </button>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Stories Section -->
            <div class="mt-12">
                <div class="flex items-center gap-4 mb-10">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Stories</h2>
                    <div class="flex-1 h-px bg-gray-200 dark:bg-gray-700"></div>
                </div>

                @forelse ($post as $p)
                    <div class="mb-8 transform transition-all duration-200 hover:scale-[1.01]">
                        <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-lg border border-gray-200 dark:border-gray-700 hover:shadow-xl transition-all duration-200">
                            <x-post-item :post="$p"></x-post-item>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-24 bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700">
                        <div class="w-16 h-16 bg-gray-100 dark:bg-gray-700 rounded-full mx-auto mb-8 flex items-center justify-center">
                            <svg class="w-8 h-8 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white mb-4">No Stories Yet</h3>
                        <p class="text-gray-600 dark:text-gray-400">This writer is preparing something amazing!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>