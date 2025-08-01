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
           <div class="space-y-6" >
@forelse ($post as $po )
    <x-post-item></x-post-item>
@empty
    <div>NO POST AVAILABLE</div>
@endforelse
           </div>
           
            <div style="margin-top: 5%;">
                 {{ $post->onEachSide(1)->links() }} 
                {{--add the link of the styling file inside vendor folder for using different style--}} 
            </div>
        </div>
        
           
        
    </div>
</x-app-layout>
