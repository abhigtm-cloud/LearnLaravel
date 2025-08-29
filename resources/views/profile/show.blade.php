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
                            <div class="absolute -bottom-2 -right-2 bg-green-400 w-8 h-8 rounded-full border-4 border-white dark:border-gray-800 shadow-lg flex items-center justify-center">
                              
                            </div>
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
            @if($post->count() > 0)
            <div class="mt-12">
                <div class="flex items-center gap-4 mb-10">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Stories</h2>
                    <div class="flex-1 h-px bg-gray-200 dark:bg-gray-700"></div>
                </div>

                @foreach ($post as $p)
                    <div class="mb-8 transform transition-all duration-200 hover:scale-[1.01]">
                        <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-lg border border-gray-200 dark:border-gray-700 hover:shadow-xl transition-all duration-200">
                            <x-post-item :post="$p"></x-post-item>
                        </div>
                    </div>
                @endforeach
            </div>
            @else
            <!-- Compact Centered Empty State -->
            <div class="flex justify-center mt-12 px-4">
                <div class="max-w-sm w-full bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 text-center mx-4">
                    <!-- Small Icon -->
                    <div class="w-14 h-14 bg-gray-100 dark:bg-gray-700 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    
                    <!-- Compact Title -->
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">No Stories Yet</h3>
                    
                    <!-- Short Description -->
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-5">
                        {{ $user->name }} hasn't published any stories yet.
                    </p>
                    
                    <!-- Compact Actions -->
                                      <!-- Compact Actions -->
                    @guest
                    <div class="f">
                        <a href="{{ route('login') }}" class="flex flex-col items-center space-y-2 py-2.5 px-4 bg-gray-900 dark:bg-white text-white dark:text-gray-900 text-sm font-medium rounded-lg hover:bg-gray-800 dark:hover:bg-gray-100 transition-all duration-200 text-center">
                            Sign in to follow
                        </a>
                        &nbsp;
                        <a href="{{ route('register') }}" class="flex flex-col items-center space-y-2 py-2.5 px-4 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200 text-center">
                            Join Medium
                        </a>
                    
                    @endguest
                    
                    @auth
                    <div class="flex justify-center">
                        <a href="{{ route('dashboard') }}" class="w-full py-2.5 px-4 bg-gray-900 dark:bg-white text-white dark:text-gray-900 text-sm font-medium rounded-lg hover:bg-gray-800 dark:hover:bg-gray-100 transition-all duration-200 text-center">
                            Explore Stories
                        </a>
                    </div>
                    @endauth
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>