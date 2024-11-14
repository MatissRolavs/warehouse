<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buy Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" action="{{ route('product.buyupdate', $product) }}">
    @csrf
    @method('PATCH')
    <div>
        <x-input-label for="quantity" :value="__('Quantity')" />
        <x-text-input id="quantity" name="quantity" type="number" class="mt-1 block w-full" value="{{ old('quantity', 1) }}" required autofocus autocomplete="quantity" />
        <x-input-error class="mt-2" :messages="$errors->get('quantity')" />
    </div>
    <div class="mt-4">
        <p>Price per item: {{ $product->price }}$</p>
        <p id="totalPrice">Total Price: {{ $product->price }}$</p>
    </div>

    <script>
        document.getElementById('quantity').addEventListener('input', function() {
            var quantity = parseInt(this.value) || 1;
            var pricePerItem = {{ $product->price }};
            var totalPrice = quantity * pricePerItem;
            document.getElementById('totalPrice').innerText = 'Total Price: ' + totalPrice + '$';
        });
    </script>
    <div class="flex items-center justify-end mt-4">
        <x-primary-button class="ml-4">
            {{ __('Buy') }}
        </x-primary-button>
    </div>
                 
            </div>
        </div>
    </div>
</x-app-layout>
