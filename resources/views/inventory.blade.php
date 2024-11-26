<x-app-layout>
    <h1 class="text-center text-4xl">Inventory Dashboard</h1>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-row justify-between">
            <a href="/products" class="text-2xl font-semibold text-black p-4 bg-gray-200 rounded">
                Total Products: {{ $products->count() }}
            </a>
            <a href="/lowstock" class="text-2xl font-semibold text-black p-4 bg-gray-200 rounded">
                Low Stock Products: {{$lowstock->count()}}
            </a>
            <a href="/utilized" class="text-2xl font-semibold text-black p-4 bg-gray-200 rounded">
                Utilized Products: {{$utilizedProduct->count()}}
            </a>
        </div>
    </div>
</x-app-layout>

<style>
    a:hover {
        background-color: #8080802e;
    }
</style>


