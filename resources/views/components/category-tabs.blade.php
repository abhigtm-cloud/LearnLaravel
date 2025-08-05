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