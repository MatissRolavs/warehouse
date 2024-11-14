<x-app-layout>
<form method="GET" action="{{ route('product.index') }}">
    <select name="category" id="category" onchange="this.form.submit()">
        <option value="">Select a category</option>
        @foreach (array_unique($categoryProducts->pluck('category')->toArray()) as $category)
            <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
        @endforeach
    </select>
</form>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Products</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Category</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
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