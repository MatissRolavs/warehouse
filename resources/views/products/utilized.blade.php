<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Utilized Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">{{ __('Name') }}</th>
                                <th class="px-4 py-2">{{ __('Category') }}</th>
                                <th class="px-4 py-2">{{ __('Quantity') }}</th>
                                <th class="px-4 py-2">{{ __('Price') }}</th>
                                <th class="px-4 py-2">{{ __('Total Price') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($utilizedProducts as $utilizedProduct)
                                <tr>
                                    <td class="px-4 py-2">{{ $utilizedProduct->product->name }}</td>
                                    <td class="px-4 py-2">{{ $utilizedProduct->category }}</td>
                                    <td class="px-4 py-2">{{ $utilizedProduct->quantity }}</td>
                                    <td class="px-4 py-2">{{ $utilizedProduct->price }}$</td>
                                    <td class="px-4 py-2">{{ $utilizedProduct->price * $utilizedProduct->quantity }}$</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
