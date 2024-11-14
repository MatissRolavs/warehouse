<x-app-layout>
<div class="h-screen flex justify-center items-center">
    <div class="w-50vw sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form method="post" action="{{ route('products.update', $product) }}">
                    @csrf
                    @method('patch')

                    <div class="text-center text-2xl font-bold">
                        {{ __('Update Product') }}
                    </div>

                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full text-lg" :value="old('name', $product->name)" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="price" :value="__('Price')" />
                        <x-text-input id="price" name="price" type="number" class="mt-1 block w-full text-lg" :value="old('price', $product->price)" required autofocus autocomplete="price" />
                        <x-input-error class="mt-2" :messages="$errors->get('price')" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="category" :value="__('Category')" />
                        <x-text-input id="category" name="category" type="text" class="mt-1 block w-full text-lg" :value="old('category', $product->category)" required autofocus autocomplete="category" />
                        <x-input-error class="mt-2" :messages="$errors->get('category')" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="quantity" :value="__('Quantity')" />
                        <x-text-input id="quantity" name="quantity" type="number" class="mt-1 block w-full text-lg" :value="old('quantity', $product->quantity)" required autofocus autocomplete="quantity" />
                        <x-input-error class="mt-2" :messages="$errors->get('quantity')" />
                    </div>

                    <div class="flex items-center justify-center mt-4">
                        <x-primary-button class="bg-blue-500 text-white font-bold py-2 px-4 rounded text-lg">
                            {{ __('Update') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

</x-app-layout>

