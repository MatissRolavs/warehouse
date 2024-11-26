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

    <!-- Category Filter -->
    <form method="GET" action="{{ route('utilized.index') }}">
        <select name="category" id="category" onchange="this.form.submit()">
            <option value="">Select a category</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat }}" {{ $cat == $category ? 'selected' : '' }}>{{ $cat }}</option>
            @endforeach
        </select>
    </form>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Utilized Products') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Category') }}</th>
                                    <th>{{ __('Quantity') }}</th>
                                    <th>{{ __('Price') }}</th>
                                    <th>{{ __('Total Price') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($utilizedProducts as $utilizedProduct)
                                    <tr>
                                        <td>{{ $utilizedProduct->product->name }}</td>
                                        <td>{{ $utilizedProduct->category }}</td>
                                        <td>{{ $utilizedProduct->quantity }}</td>
                                        <td>{{ $utilizedProduct->price }}$</td>
                                        <td>{{ $utilizedProduct->price * $utilizedProduct->quantity }}$</td>
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
