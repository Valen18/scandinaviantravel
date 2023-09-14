@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-4 flex justify-center">
        <div class="w-full">
            <h2 class="text-2xl font-semibold mb-4">Car list</h2>

            @if ($cars->count() > 0)
                <table class="min-w-full border-collapse table-auto">
                    <thead>
                        <tr>
                            <th class="border bg-gray-200 px-4 py-2 text-blue-800">Brand</th>
                            <th class="border bg-gray-200 px-4 py-2 text-blue-800">Model</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cars as $car)
                            <tr>
                                <td class="border px-4 py-2"><a href="{{ route('car.show', $car->id) }}" class="hover:underline">{{ $car->brand }}</a></td>
                                <td class="border px-4 py-2">{{ $car->model }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>There are no items yet.</p>
            @endif
        </div>
    </div>
@endsection

