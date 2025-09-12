<ul class="flex flex-wrap justify-center sm:justify-start gap-2 text-sm font-medium text-center text-gray-500">
                        <li class="flex-grow sm:flex-grow-0">
                            <a href="{{ route("dashboard") }}"
                               class="inline-block w-full px-4 py-2 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white' : 'bg-white border border-gray-200 text-gray-700' }}">All</a>
                        </li>
                           {{-- {{ $slot }} :- its hardcore written --}}
                        @forelse($categories as $category)
                            <li class="flex-grow sm:flex-grow-0">
                                <a href="{{ route("post.cat",$category) }}"
                                   class="inline-block w-full px-4 py-2 rounded-lg {{ request()->route('category') && request()->route('category')->id == $category->id ? 'bg-blue-600 text-white' : 'bg-white border border-gray-200 text-gray-700' }}">
                                    {{ $category->name }} 
                                </a>
                            </li>
                        @empty
                        {{ $slot }}
                        {{-- the NO CATER+GORY AVAILABLE SLOT will be used when there will be no category --}}
                        @endforelse
                        {{-- {{ $name }} this is used to use the variavle name whatever we write in index.blade wheneber we use this file --}}
                    </ul>
                    </ul>