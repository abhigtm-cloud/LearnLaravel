{{-- <div class="space-y-6">
    @foreach ($post as $pos)
    <a href="#"
        class="flex items-center bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 transition md:max-w-3xl mx-auto">


        <div class="w-3/4 p-6">
            <h5 class="mb-2 text-2xl font-bold text-gray-900">
                {{ $pos->title ?? 'Omnis excepturi sint voluptas placeat accusantium voluptatem ut.' }}
            </h5>
            <p class="mb-3 text-gray-700 line-clamp-3">
                {{ $pos->excerpt ?? 'Ut vel architecto excepturi expedita neque laboriosam unde. Quos iste corporis est
                natus autem. Non corporis doloribus quia saepe omnis...' }}
            </p>
            <button
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition">
                Read more →
            </button>
        </div>


        <div class="h-full ">
            <img class="rounded-lg object-cover w-full h-auto "
                src="{{ $pos->image_url ?? 'https://flowbite.com/docs/images/blog/image-4.jpg' }}" alt="Post Image">
        </div>
    </a>
    @endforeach

    @if($post->isEmpty())
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg text-center p-6 mx-auto md:max-w-xl">
        <p class="text-gray-900">No posts found.</p>
    </div>
    @endif
</div> --}}


<a href="{{ route('post.show', [
    "username" => $post->user->username,
    "post" => $post->slug
])
                     }}"
    class="flex items-center bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 transition md:max-w-3xl mx-auto">


    <div class="w-3/4 p-6">
        <h5 class="mb-2 text-2xl font-bold text-gray-900">
            {{ $post->title }}
        </h5>
        <p class="mb-4 text-gray-700 line-clamp-3">
            {{$post->content }}
        </p>
        
        <!-- Date and Clap Button Container -->
        <div class="flex items-center justify-between mt-4">
            <!-- Date -->
            <span class="inline-flex items-center px-3 py-1 text-xs font-medium text-gray-600 bg-gray-100 rounded-full">
                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                </svg>
                {{ $post->created_at->format('M d, Y') }}
            </span>
            
            <!-- Clap Button -->
            <div class="flex items-center">
                <x-clap-button :post="$post"/>
            </div>
        </div>

    </div>


    <div class="h-full ">
        <img class="rounded-lg object-cover w-full h-auto "
            src="{{ Storage::url($post->image)     {{-- ?? 'https://flowbite.com/docs/images/blog/image-4.jpg'--}} }}"
            alt="Post Image">
    </div>
</a>