<x-app-layout>
<style>
    .container {
        max-width: 960px;
        margin: 0 auto;
        padding: 20px;
    }
    .row {
        justify-content: center;
        align-items: center; /* Ensure vertical alignment */
    }
    
    .card {
        background-color: #ffffff;
        border: 1px solid #e0e0e0;
        border-radius: 8px; /* More rounded corners */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Softer shadow */
        overflow: hidden; /* Ensures children are clipped */
    }
    .card-header {
        background-color: #f5f5f5;
        border-bottom: 1px solid #e0e0e0;
        padding: 12px 16px;
        font-size: 20px;
        font-weight: 600;
        color: #333333;
    }
    .card-body {
        padding: 16px;
        color: #555555;
    }
    .alert {
        padding: 12px;
        margin-bottom: 16px;
        border: 1px solid transparent;
        border-radius: 6px;
    }
    .alert-success {
        background-color: #e7f8e9;
        border-color: #cde8d0;
        color: #2e6c3e;
    }
    .table {
        width: 100%;
        margin-bottom: 24px;
        border-collapse: collapse;
    }
    .table th, .table td {
        padding: 12px;
        line-height: 1.6;
        border-top: 1px solid #e0e0e0;
        text-align: left;
    }
    select {
        width: 220px;
        margin: 12px auto;
        display: block;
        padding: 8px;
        border-radius: 4px;
        border: 1px solid #ccc;
        background-color: #fff;
    }
</style>
<form method="GET" action="{{ route('lowstock.index') }}">
    <select name="category" id="category" onchange="this.form.submit()">
        <option value="">Select a category</option>
        @foreach (array_unique($categoryLowstock->pluck('category')->toArray()) as $category)
            <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
        @endforeach
    </select>
</form>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Low Stock Products</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lowstock as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{$product->category}}</td>
                                        <td>
                                            @if ($product->quantity <= 10)
                                                <span style="color: red; animation: blink 1s infinite;">Low stock</span>
                                            @endif
                                        </td>
                                        
                                        <style>
                                            @keyframes blink {
                                                0% { color: red; }
                                                49% { color: red; }
                                                50% { color: white; }
                                                99% { color: white; }
                                                100% { color: red; }
                                            }
                                        </style>
                                        <td>
                                            <a class="btn btn-secondary" href="{{route('product.show', $product->id)}}">More info</a>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>