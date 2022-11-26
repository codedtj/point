<template>
    <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">
        <div class="py-6">
            <img class="mx-auto h-14" src="/image/point-logo.svg"/>
        </div>
        <div class="flex py-4 pb-6">
            <h1 class="text-white text-3xl md:text-6xl mx-auto"><span class="font-bold">Total Cost:</span> 230TJS</h1>
        </div>
    </div>

    <div class="px-8 py-4">
        <form>
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500  " placeholder="Search for Products..." required>
                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
            </div>
        </form>
    </div>

    <div class="flex mx-auto bg-gray-50 grid grid-cols-1 lg:grid-cols-2">
        <div class="w-full overflow-y-scroll flex-none z-10" style="height: 450px">
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
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
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
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
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
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
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
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
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
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
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
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
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
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
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
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
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
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
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
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
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
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
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
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
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

        <div class="flex">
            <div class="flex h-28 gap-x-6 mx-auto px-16 mt-3">
                <div class="rounded-lg p-4 bg-purple-700 flex flex-col w-48">
                    <div>
                        <h5 class="text-white text-xl font-bold leading-none">
                            Tendered
                        </h5>
                        <span class="text-xs text-white leading-none">Lorem ipsum</span>
                    </div>
                    <div class="flex items-center">
                        <div class="text-lg text-white font-light">
                            <div>
                                <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full" placeholder="Somoni" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rounded-lg p-4 bg-amber-300 flex flex-col w-48">
                    <div>
                        <h5 class="text-white text-xl font-bold leading-none">
                            Last Sale
                        </h5>
                        <span class="text-xs text-white leading-none">Lorem ipsum</span>
                    </div>
                    <div class="flex items-center">
                        <div class="text-lg text-white font-light">
                            170TJS
                        </div>
                    </div>
                </div>
                <div class="rounded-lg p-4 bg-red-400 flex flex-col w-48">
                    <div>
                        <h5 class="text-white text-xl font-bold leading-none">
                            Change
                        </h5>
                        <span class="text-xs text-white leading-none">Lorem ipsum</span>
                    </div>
                    <div class="flex items-center">
                        <div class="text-lg text-white font-light">
                            30TJS
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Point"
}

</script>

<style scoped>
div::-webkit-scrollbar {
    display: none;
}
</style>
