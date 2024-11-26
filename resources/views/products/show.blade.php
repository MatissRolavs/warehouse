<x-app-layout>
    <div class="h-screen flex justify-center items-center px-4">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
            <div class="text-center">
                <h1 class="text-2xl font-bold mb-4">{{ $product->name }}</h1>
                <p class="text-lg mb-2">Quantity: {{ $product->quantity }}</p>
                <p class="text-lg mb-2">Category: {{ $product->category }}</p>
                <p class="text-lg mb-2">Price: {{ $product->price }}$</p>
                <p class="text-lg mb-4">Total Price: {{ $product->quantity * $product->price }}$</p>

                <!-- Button Row (horizontal) -->
                <div class="flex justify-between gap-4 mt-6">
                    <!-- Delete Button (form) -->
                    <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="w-full">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full bg-red-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-red-400 focus:outline-none">
                            Delete
                        </button>
                    </form>

                    <!-- Edit Button (anchor) -->
                    <a href="{{ route('product.edit', $product->id) }}" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg text-center hover:bg-blue-400 focus:outline-none">
                        Edit
                    </a>

                    <!-- Buy Button (anchor) -->
                    <a href="{{ route('product.buy', $product->id) }}" class="w-full bg-green-500 text-white font-bold py-2 px-4 rounded-lg text-center hover:bg-green-400 focus:outline-none">
                        Buy
                    </a>

                    <!-- Utilize Button (form) -->
                    <form action="{{ route('utilized.store', $product->id) }}" method="POST" class="w-full">
                        @csrf
                        <button type="submit" class="w-full bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-yellow-400 focus:outline-none">
                            Utilize
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
