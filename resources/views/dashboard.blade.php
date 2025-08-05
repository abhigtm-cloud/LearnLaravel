<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Category Navigation --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-category-tabs name="Abhi">

                    </x-category-tabs>
                    {{-- i can use another variable in the component the way i write above and if i want to use the variable in space of name , just need to add : before variable --}}
                </div>
            </div>
           <div class="space-y-6" >
@forelse ($post as $po )
    <x-post-item :post="$po"></x-post-item>
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
