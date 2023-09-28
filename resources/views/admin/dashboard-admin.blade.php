<x-admin-layout>
    <div class="mt-4">
        <div class="flex flex-wrap -mx-6">
            <div class="w-full px-6 sm:w-1/2 xl:w-1/3">
                <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                    <div class="p-3 bg-indigo-600 bg-opacity-75 rounded-full">
                        <i class="fa-solid fa-users fa-lg text-white"></i>
                    </div>

                    <div class="mx-5">
                        <h4 class="text-2xl font-semibold text-gray-700">{{$users}}</h4>
                        <div class="text-gray-500">Total Users</div>
                    </div>
                </div>
            </div>

            <div class="w-full px-6 mt-6 sm:w-1/2 xl:w-1/3 sm:mt-0">
                <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                    <div class="p-3 bg-orange-600 bg-opacity-75 rounded-full">
                        <i class="fa-solid fa-clipboard fa-2xl text-white"></i>
                    </div>

                    <div class="mx-5">
                        <h4 class="text-2xl font-semibold text-gray-700">{{$posts}}</h4>
                        <div class="text-gray-500">Total Posts</div>
                    </div>
                </div>
            </div>

            <div class="w-full px-6 mt-6 sm:w-1/2 xl:w-1/3 xl:mt-0">
                <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                    <div class="p-3 bg-pink-600 bg-opacity-75 rounded-full">
                        
                    </div>

                    <div class="mx-5">
                        <h4 class="text-2xl font-semibold text-gray-700">215,542</h4>
                        <div class="text-gray-500">Available Products</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
  


