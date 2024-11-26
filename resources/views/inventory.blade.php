<x-app-layout>
    <h1 class="text-center text-4xl">inventory dashboard</h1>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <br>
        <div class="flex flex-row justify-between">
            <a href="/products" class="text-2xl font-semibold text-black p-4 bg-gray-200 rounded">
                total products: {{ $products->count() }}
            </a>
            <a href="/lowstock" class="text-2xl font-semibold text-black p-4 bg-gray-200 rounded">
                low stock products: {{$lowstock->count()}}
            </a>
            <a href="/utilized" class="text-2xl font-semibold text-black p-4 bg-gray-200 rounded">
                utilized products: {{$utilizedProduct->count()}}
            </a>
        </div>
    </div>
</x-app-layout>

<style>
    a:hover {
        background-color: #8080802e;
    }
</style>

