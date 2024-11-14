
    <div class="container mx-auto p-4">
        <h1 class="text-4xl font-bold">{{ $product->name }}</h1>
        <p class="mt-4">{{ $product->quantity }}</p>
        <p class="mt-4">{{ $product->category }}</p>
        <p class="mt-4 font-bold">Price: {{ $product->price }}$</p>
        <img src="{{ asset('storage/' . $product->image) }}" class="w-full mt-4">
    </div>

