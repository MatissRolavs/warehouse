
    <div class="container mx-auto p-4">
        <h1 class="text-4xl font-bold">{{ $product->name }}</h1>
        <p class="mt-4">Quantity:{{ $product->quantity }}</p>
        <p class="mt-4">Category:{{ $product->category }}</p>
        <p class="mt-4 font-bold">Price: {{ $product->price }}$</p>
        <img src="{{ asset('storage/' . $product->image) }}" class="w-full mt-4">
        <div class="mt-4">
            <a href="{{ route('product.edit', $product->id) }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded">Edit</a>
            <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white font-bold rounded">Delete</button>
            </form>
            
        </div>
    </div>

