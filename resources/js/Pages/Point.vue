<template>
    <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">
        <div class="py-8">
            <img class="mx-auto h-14" src="/image/point-logo.svg"/>
        </div>
        <div class="flex py-16">
            <h1 class="text-white text-3xl md:text-6xl mx-auto"><span class="font-bold">Total Cost:</span> 230TJS</h1>
        </div>
    </div>

    <div class="flex">
        <div class="w-full lg:w-3/6 overflow-y-scroll" style="height: 430px">
            <div class="bg-white rounded">
                <table class="min-w-max w-full table-auto">
                    <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-xs leading-normal">
                        <th class="py-3 px-6 text-left">Product</th>
                        <th class="py-3 px-6 text-left">Units</th>
                        <th class="py-3 px-6 text-center">Discount %</th>
                        <th class="py-3 px-6 text-center">Price</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                        <th class="py-3 px-6 text-center"></th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <h1 class="font-medium">Картошка</h1>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <h1>2кг</h1>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    <h1>0</h1>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">20TJS</span>
                            </td>
                            <td class="px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <div class="flex flex-wrap">
                                        <div class="flex">
                                            <button
                                                class="transform hover:bg-purple-500 text-white text-center text-md font-semibold rounded-tl-md rounded-bl-md px-3 bg-gray-800 focus:bg-gray-600 focus:outline-none border border-gray-800 focus:border-gray-600">
                                                +
                                            </button>
                                        </div>
                                        <div class="flex">
                                            <input type="text" value="7"
                                                   class="bg-white text-sm text-gray-900 text-center focus:outline-none border border-gray-800 focus:border-gray-600 w-12">
                                        </div>
                                        <div class="flex">
                                            <button
                                                class="transform hover:bg-purple-500 text-white text-center text-md font-semibold rounded-tr-md rounded-br-md px-3 bg-gray-800 focus:bg-gray-600 focus:outline-none border border-gray-800 focus:border-gray-600">
                                                -
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 px-1 text-center">
                                <div class=" w-6 mr-2 transform hover:text-purple-500 hover:scale-110 text-red-600">
                                    <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                          stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <h1 class="font-medium">Картошка</h1>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <h1>2кг</h1>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    <h1>0</h1>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">20TJS</span>
                            </td>
                            <td class="px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <div class="flex flex-wrap">
                                        <div class="flex">
                                            <button
                                                class="transform hover:bg-purple-500 text-white text-center text-md font-semibold rounded-tl-md rounded-bl-md px-3 bg-gray-800 focus:bg-gray-600 focus:outline-none border border-gray-800 focus:border-gray-600">
                                                +
                                            </button>
                                        </div>
                                        <div class="flex">
                                            <input type="text" value="7"
                                                   class="bg-white text-sm text-gray-900 text-center focus:outline-none border border-gray-800 focus:border-gray-600 w-12">
                                        </div>
                                        <div class="flex">
                                            <button
                                                class="transform hover:bg-purple-500 text-white text-center text-md font-semibold rounded-tr-md rounded-br-md px-3 bg-gray-800 focus:bg-gray-600 focus:outline-none border border-gray-800 focus:border-gray-600">
                                                -
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 px-1 text-center">
                                <div class=" w-6 mr-2 transform hover:text-purple-500 hover:scale-110 text-red-600">
                                    <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                          stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <h1 class="font-medium">Картошка</h1>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <h1>2кг</h1>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    <h1>0</h1>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">20TJS</span>
                            </td>
                            <td class="px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <div class="flex flex-wrap">
                                        <div class="flex">
                                            <button
                                                class="transform hover:bg-purple-500 text-white text-center text-md font-semibold rounded-tl-md rounded-bl-md px-3 bg-gray-800 focus:bg-gray-600 focus:outline-none border border-gray-800 focus:border-gray-600">
                                                +
                                            </button>
                                        </div>
                                        <div class="flex">
                                            <input type="text" value="7"
                                                   class="bg-white text-sm text-gray-900 text-center focus:outline-none border border-gray-800 focus:border-gray-600 w-12">
                                        </div>
                                        <div class="flex">
                                            <button
                                                class="transform hover:bg-purple-500 text-white text-center text-md font-semibold rounded-tr-md rounded-br-md px-3 bg-gray-800 focus:bg-gray-600 focus:outline-none border border-gray-800 focus:border-gray-600">
                                                -
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 px-1 text-center">
                                <div class=" w-6 mr-2 transform hover:text-purple-500 hover:scale-110 text-red-600">
                                    <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                          stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <h1 class="font-medium">Картошка</h1>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <h1>2кг</h1>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    <h1>0</h1>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">20TJS</span>
                            </td>
                            <td class="px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <div class="flex flex-wrap">
                                        <div class="flex">
                                            <button
                                                class="transform hover:bg-purple-500 text-white text-center text-md font-semibold rounded-tl-md rounded-bl-md px-3 bg-gray-800 focus:bg-gray-600 focus:outline-none border border-gray-800 focus:border-gray-600">
                                                +
                                            </button>
                                        </div>
                                        <div class="flex">
                                            <input type="text" value="7"
                                                   class="bg-white text-sm text-gray-900 text-center focus:outline-none border border-gray-800 focus:border-gray-600 w-12">
                                        </div>
                                        <div class="flex">
                                            <button
                                                class="transform hover:bg-purple-500 text-white text-center text-md font-semibold rounded-tr-md rounded-br-md px-3 bg-gray-800 focus:bg-gray-600 focus:outline-none border border-gray-800 focus:border-gray-600">
                                                -
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 px-1 text-center">
                                <div class=" w-6 mr-2 transform hover:text-purple-500 hover:scale-110 text-red-600">
                                    <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                          stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <h1 class="font-medium">Картошка</h1>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <h1>2кг</h1>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    <h1>0</h1>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">20TJS</span>
                            </td>
                            <td class="px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <div class="flex flex-wrap">
                                        <div class="flex">
                                            <button
                                                class="transform hover:bg-purple-500 text-white text-center text-md font-semibold rounded-tl-md rounded-bl-md px-3 bg-gray-800 focus:bg-gray-600 focus:outline-none border border-gray-800 focus:border-gray-600">
                                                +
                                            </button>
                                        </div>
                                        <div class="flex">
                                            <input type="text" value="7"
                                                   class="bg-white text-sm text-gray-900 text-center focus:outline-none border border-gray-800 focus:border-gray-600 w-12">
                                        </div>
                                        <div class="flex">
                                            <button
                                                class="transform hover:bg-purple-500 text-white text-center text-md font-semibold rounded-tr-md rounded-br-md px-3 bg-gray-800 focus:bg-gray-600 focus:outline-none border border-gray-800 focus:border-gray-600">
                                                -
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 px-1 text-center">
                                <div class=" w-6 mr-2 transform hover:text-purple-500 hover:scale-110 text-red-600">
                                    <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                          stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <h1 class="font-medium">Картошка</h1>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <h1>2кг</h1>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    <h1>0</h1>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">20TJS</span>
                            </td>
                            <td class="px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <div class="flex flex-wrap">
                                        <div class="flex">
                                            <button
                                                class="transform hover:bg-purple-500 text-white text-center text-md font-semibold rounded-tl-md rounded-bl-md px-3 bg-gray-800 focus:bg-gray-600 focus:outline-none border border-gray-800 focus:border-gray-600">
                                                +
                                            </button>
                                        </div>
                                        <div class="flex">
                                            <input type="text" value="7"
                                                   class="bg-white text-sm text-gray-900 text-center focus:outline-none border border-gray-800 focus:border-gray-600 w-12">
                                        </div>
                                        <div class="flex">
                                            <button
                                                class="transform hover:bg-purple-500 text-white text-center text-md font-semibold rounded-tr-md rounded-br-md px-3 bg-gray-800 focus:bg-gray-600 focus:outline-none border border-gray-800 focus:border-gray-600">
                                                -
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 px-1 text-center">
                                <div class=" w-6 mr-2 transform hover:text-purple-500 hover:scale-110 text-red-600">
                                    <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                          stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <h1 class="font-medium">Картошка</h1>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <h1>2кг</h1>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    <h1>0</h1>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">20TJS</span>
                            </td>
                            <td class="px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <div class="flex flex-wrap">
                                        <div class="flex">
                                            <button
                                                class="transform hover:bg-purple-500 text-white text-center text-md font-semibold rounded-tl-md rounded-bl-md px-3 bg-gray-800 focus:bg-gray-600 focus:outline-none border border-gray-800 focus:border-gray-600">
                                                +
                                            </button>
                                        </div>
                                        <div class="flex">
                                            <input type="text" value="7"
                                                   class="bg-white text-sm text-gray-900 text-center focus:outline-none border border-gray-800 focus:border-gray-600 w-12">
                                        </div>
                                        <div class="flex">
                                            <button
                                                class="transform hover:bg-purple-500 text-white text-center text-md font-semibold rounded-tr-md rounded-br-md px-3 bg-gray-800 focus:bg-gray-600 focus:outline-none border border-gray-800 focus:border-gray-600">
                                                -
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 px-1 text-center">
                                <div class=" w-6 mr-2 transform hover:text-purple-500 hover:scale-110 text-red-600">
                                    <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                          stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <h1 class="font-medium">Картошка</h1>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <h1>2кг</h1>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    <h1>0</h1>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">20TJS</span>
                            </td>
                            <td class="px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <div class="flex flex-wrap">
                                        <div class="flex">
                                            <button
                                                class="transform hover:bg-purple-500 text-white text-center text-md font-semibold rounded-tl-md rounded-bl-md px-3 bg-gray-800 focus:bg-gray-600 focus:outline-none border border-gray-800 focus:border-gray-600">
                                                +
                                            </button>
                                        </div>
                                        <div class="flex">
                                            <input type="text" value="7"
                                                   class="bg-white text-sm text-gray-900 text-center focus:outline-none border border-gray-800 focus:border-gray-600 w-12">
                                        </div>
                                        <div class="flex">
                                            <button
                                                class="transform hover:bg-purple-500 text-white text-center text-md font-semibold rounded-tr-md rounded-br-md px-3 bg-gray-800 focus:bg-gray-600 focus:outline-none border border-gray-800 focus:border-gray-600">
                                                -
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 px-1 text-center">
                                <div class=" w-6 mr-2 transform hover:text-purple-500 hover:scale-110 text-red-600">
                                    <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                          stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <h1 class="font-medium">Картошка</h1>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <h1>2кг</h1>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    <h1>0</h1>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">20TJS</span>
                            </td>
                            <td class="px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <div class="flex flex-wrap">
                                        <div class="flex">
                                            <button
                                                class="transform hover:bg-purple-500 text-white text-center text-md font-semibold rounded-tl-md rounded-bl-md px-3 bg-gray-800 focus:bg-gray-600 focus:outline-none border border-gray-800 focus:border-gray-600">
                                                +
                                            </button>
                                        </div>
                                        <div class="flex">
                                            <input type="text" value="7"
                                                   class="bg-white text-sm text-gray-900 text-center focus:outline-none border border-gray-800 focus:border-gray-600 w-12">
                                        </div>
                                        <div class="flex">
                                            <button
                                                class="transform hover:bg-purple-500 text-white text-center text-md font-semibold rounded-tr-md rounded-br-md px-3 bg-gray-800 focus:bg-gray-600 focus:outline-none border border-gray-800 focus:border-gray-600">
                                                -
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 px-1 text-center">
                                <div class=" w-6 mr-2 transform hover:text-purple-500 hover:scale-110 text-red-600">
                                    <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                          stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div>

    </div>
</template>

<script>
export default {
    name: "Point"
}

</script>

<style scoped>

</style>
