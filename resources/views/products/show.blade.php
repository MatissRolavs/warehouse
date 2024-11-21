<style>
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 20px;
    }

    .card {
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        width: 100%;
        max-width: 600px;
        padding: 20px;
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
    }

    .card h1 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .card p {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .button-row {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .button-row button, .button-row a {
        padding: 10px 16px;
        font-size: 12px;
        border-radius: 5px;
        text-align: center;
        cursor: pointer;
        transition: background-color 0.3s ease;
        width: 25%;
    }

    .button-row button[type="submit"], .button-row a.bg-red {
        background-color: #e74c3c;
        color: white;
    }

    .button-row a.bg-blue {
        background-color: #3498db;
        color: white;
    }

    .button-row a.bg-green {
        background-color: #2ecc71;
        color: white;
    }

    .button-row a.bg-yellow {
        background-color: #f1c40f;
        color: white;
    }

    .button-row button:hover, .button-row a.bg-blue:hover, .button-row a.bg-red:hover, .button-row a.bg-green:hover, .button-row a.bg-yellow:hover {
        opacity: 0.8;
    }

    .button-row form button[type="submit"] {
        background-color: #3498db;
        color: white;
        width: 100%;
    }

    .button-row form button[type="submit"]:hover {
        background-color: #2980b9;
    }

    .button-row form button[type="submit"].edit, .button-row form button[type="submit"].buy {
        font-size: 10px;
    }
</style>

<x-app-layout>
    <div class="container">
        <div class="card">
            <h1>{{ $product->name }}</h1>
            <p>Quantity: {{ $product->quantity }}</p>
            <p>Category: {{ $product->category }}</p>
            <p>Price: {{ $product->price }}$</p>
            <p>Total Price: {{ $product->quantity * $product->price }}$</p>

            <!-- Button Row (horizontal) -->
            <div class="button-row">
                <!-- Delete Button (form) -->
                <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red" style="background-color: red;">Delete</button>
                </form>

                <!-- Edit Button (anchor) -->
                <a href="{{ route('product.edit', $product->id) }}" class="bg-blue edit">Edit</a>

                <!-- Buy Button (anchor) -->
                <a href="{{ route('product.buy', $product->id) }}" class="bg-green buy">Buy</a>

                <!-- Utilize Button (form) -->
                <form action="{{ route('utilized.store', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red" style="background-color: red;">Utilize</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

