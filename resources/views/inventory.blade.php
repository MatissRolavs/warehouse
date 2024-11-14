<x-app-layout> 
 <a href="/products" class="text-xl font-semibold text-black">
                Total Products: {{ $products->count() }}
 </a>
            <br>
            <a href="/lowstock" class="text-xl font-semibold text-black">
            Low Stock Products: {{$lowstock->count()}}
            </a>

</x-app-layout>