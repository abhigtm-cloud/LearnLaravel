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
            </div>  --}}
 
             
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
