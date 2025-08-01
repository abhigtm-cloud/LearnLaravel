<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Category Navigation --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <ul class="flex flex-wrap justify-center sm:justify-start gap-2 text-sm font-medium text-center text-gray-500">
                        <li class="flex-grow sm:flex-grow-0">
                            <a href="#"
                               class="inline-block w-full px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition">All</a>
                        </li>
                        @foreach ($categories as $category)
                            <li class="flex-grow sm:flex-grow-0">
                                <a href="#"
                                   class="inline-block w-full px-4 py-2 rounded-lg bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 hover:text-gray-900 transition">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            
@forelse ($post as $pos )
     <a href="#"
                       class="flex items-center bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 transition md:max-w-3xl mx-auto">

                        {{-- Text section (left) --}}
                        <div class="w-3/4 p-6">
                            <h5 class="mb-2 text-2xl font-bold text-gray-900">
                                {{ $pos->title ?? 'Omnis excepturi sint voluptas placeat accusantium voluptatem ut.' }}
                            </h5>
                            <p class="mb-3 text-gray-700 line-clamp-3">
                                {{ $pos->excerpt ?? 'Ut vel architecto excepturi expedita neque laboriosam unde. Quos iste corporis est natus autem. Non corporis doloribus quia saepe omnis...' }}
                            </p>
                            <button class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition">
                                Read more →
                            </button>
                        </div>

                        {{-- Image section (right, small) --}}
                        <div class="h-full ">
                            <img class="rounded-lg object-cover w-full h-auto "
                                 src="{{ $pos->image_url ?? 'https://flowbite.com/docs/images/blog/image-4.jpg' }}"
                                 alt="Post Image">
                        </div>
                    </a>
@empty
    <div>NO POST AVAILABLE</div>
@endforelse
            {{-- Posts Section --}}
            {{-- <div class="space-y-6" >
                @foreach ($post as $pos)
                    <a href="#"
                       class="flex items-center bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 transition md:max-w-3xl mx-auto">


                        <div class="w-3/4 p-6">
                            <h5 class="mb-2 text-2xl font-bold text-gray-900">
                                {{ $pos->title ?? 'Omnis excepturi sint voluptas placeat accusantium voluptatem ut.' }}
                            </h5>
                            <p class="mb-3 text-gray-700 line-clamp-3">
                                {{ $pos->excerpt ?? 'Ut vel architecto excepturi expedita neque laboriosam unde. Quos iste corporis est natus autem. Non corporis doloribus quia saepe omnis...' }}
                            </p>
                            <button class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition">
                                Read more →
                            </button>
                        </div>

                        
                        <div class="h-full ">
                            <img class="rounded-lg object-cover w-full h-auto "
                                 src="{{ $pos->image_url ?? 'https://flowbite.com/docs/images/blog/image-4.jpg' }}"
                                 alt="Post Image">
                        </div>
                    </a>
                @endforeach

                @if($post->isEmpty())
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg text-center p-6 mx-auto md:max-w-xl">
                        <p class="text-gray-900">No posts found.</p>
                    </div>
                @endif
            </div> --}}
            <div style="margin-top: 5%;">
                 {{ $post->onEachSide(1)->links() }} 
                {{--add the link of the styling file inside vendor folder for using different style--}} 
            </div>
        </div>
        
           
        
    </div>
</x-app-layout>
