<!-- component -->
<body class="antialiased font-sans bg-gray-200">
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">{{$tableName}}</h2>
            </div>
            <div class="my-2 flex sm:flex-row flex-col">
               {{$tools}}
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        {{$slot}}
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>