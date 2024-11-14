<x-app-layout> 
 <a href="/products" class="text-xl font-semibold text-black dark:text-white">
                Total Products: {{ $products->count() }}
 </a>
            <br>
            <a href="/lowstock" class="text-xl font-semibold text-black dark:text-white">
            Low Stock Products: {{$lowstock->count()}}
            </a>

</x-app-layout>