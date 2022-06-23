<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.menus.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Back to Menus page</a>
            </div>
            <div class="m-2 p-2 bg-slate-100 rounded">
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                    <form method="POST" action="{{ route('admin.menus.update', $menu->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid gap-6 mb-6 lg:grid-cols-2">
                            <div class="sm:col-span-6">
                                <label for="name"
                                       class="block mb-2 text-sm font-medium">Name</label>
                                <input type="text"
                                       id="name"
                                       name="name"
                                       value="{{ $menu->name }}"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       placeholder="John" required="">
                            </div>

                            <div class="sm:col-span-6">
                                <label for="price"
                                       class="block mb-2 text-sm font-medium">Price</label>
                                <input type="number"
                                       id="price"
                                       name="price"
                                       min="0.00"
                                       max="10000.00"
                                       step="0.01"
                                       value="{{ $menu->price }}"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       placeholder="100" required="">
                            </div>

                            <div class="sm:col-span-6">
                                <label for="description"
                                       class="block mb-2 text-sm font-medium ">Description</label>
                                <textarea id="description"
                                          rows="4"
                                          name="description"
                                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                          placeholder="Leave a description...">{{ $menu->description }}</textarea>
                            </div>

                            <div class="sm:col-span-6">
                                <label for="categories"
                                       class="block mb-2 text-sm font-medium ">Categories</label>
                                    <select multiple
                                        id="categories"
                                        name="categories[]"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    >
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @selected($menu->categories->contains($category))>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="sm:col-span-6">
                                <label class="block mb-2 text-sm font-medium "
                                       for="image">Upload image</label>
                                <img class="max-h-32" src="{{ Storage::url($menu->image) }}" alt="image">
                                <input
                                    id="image"
                                    name="image"
                                    type="file"
                                    class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                     >
                            </div>

                            <div class="sm:col-span-6">
                                <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
