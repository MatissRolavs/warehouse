<style>
    html, body {
        height: 90%;
    }
    .container {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
    }
    .card {
        background-color: #ffffff;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        padding: 20px;
        text-align: center;
        width: 600px; /* Bigger card width */
    }
    .bg-blue-500 {
        background-color: #3498db;
    }
    .bg-red-500 {
        background-color: #e74c3c;
    }
    .bg-green-500 {
        background-color: #2ecc71;
    }
    h1 {
        font-size: 36px;
    }
    p {
        font-size: 24px;
    }
    button, .button {
        width: 120px; /* Same size for all buttons */
        font-size: 24px;
        padding: 10px 20px;
    }
</style>
<x-app-layout>
    <div class="container mx-auto p-4">
        <div class="card mx-auto">
            <h1 class="text-2xl font-bold">{{ $product->name }}</h1>
            <p class="mt-2 font-bold">Quantity: {{ $product->quantity }}</p>
            <p class="mt-2 font-bold">Category: {{ $product->category }}</p>
            <p class="mt-2 font-bold">Price: {{ $product->price }}$</p>
            <p class="mt-2 font-bold">Total Price: {{ $product->quantity * $product->price }}$</p>
            <div class="flex justify-between mt-2">
                <div>
                    
                    <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button px-2 py-1 bg-red-500  text-white font-bold rounded">Delete</button>
                    </form>
                    <button class="button px-2 py-1 bg-blue-500  text-white font-bold rounded"><a href="{{ route('product.edit', $product->id) }}" class="button px-2 py-1 bg-blue-500 text-white font-bold rounded">Edit</a></button>
                </div>
                <button class="button px-2 py-1 bg-green-500  text-white font-bold rounded"> <a href="{{ route('product.buy', $product->id) }}" class="button px-2 py-1 bg-green-500 text-white font-bold rounded">Buy</a></button>
            </div>
        </div>
    </div>
</x-app-layout>



