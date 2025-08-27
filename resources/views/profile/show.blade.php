<x-app-layout>
    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen font-sans antialiased text-gray-900 dark:text-gray-100 transition-colors duration-500">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="p-8 bg-white dark:bg-gray-800 shadow-xl rounded-xl">
                <!-- Main Grid Layout -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                    <!-- Left Column: User Posts -->
                    <div class="md:col-span-2">
                        <h1 class="text-4xl md:text-5xl font-extrabold mb-8 text-gray-900 dark:text-white">
                            {{ $user->name }}
                        </h1>
                        <div class="space-y-8">
                            @forelse ($post as $p)
                                <x-post-item :post="$p"></x-post-item>
                            @empty
                                <div class="text-center text-gray-400 py-16">
                                    <p class="text-lg">No posts found.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Right Column: User Info -->
                    <div class="md:col-span-1 p-6 bg-gray-50 dark:bg-gray-700 rounded-lg shadow-inner sticky top-8 h-fit">
                        <div class="flex flex-col items-center text-center">
                            <x-user-avatar :user="$user" size="w-24 h-24" class="rounded-full shadow-lg" />
                            <h3 class="text-2xl font-bold mt-4">{{ $user->name }}</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                <span x-text="followersCount"></span> followers
                            </p>
                            <p class="mt-4 text-gray-600 dark:text-gray-300 leading-relaxed">
                                {{ $user->bio }}
                            </p>
                            @if (auth()->user() && auth()->user()->id !== $user->id)
                                <div class="mt-6">
                                    <button @click="follow()"
                                        class="rounded-full px-6 py-2 text-white font-semibold shadow-md transition-all duration-300 transform hover:scale-105"
                                        x-text="following ? 'Unfollow' : 'Follow'"
                                        :class="following ? 'bg-rose-600 hover:bg-rose-700' : 'bg-emerald-600 hover:bg-emerald-700'">
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
