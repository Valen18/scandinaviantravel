@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-4 flex justify-center">
        <div class="w-full">
            <h2 class="text-2xl font-semibold mb-4">Authors list</h2>

            @if ($authors->count() > 0)
                <table class="min-w-full border-collapse table-auto">
                    <thead>
                        <tr>
                            <th class="border bg-gray-200 px-4 py-2 text-blue-800">Name</th>
                            <th class="border bg-gray-200 px-4 py-2 text-blue-800">Age</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($authors as $author)
                            <tr>
                                <td class="border px-4 py-2"><a href="{{ route('author.show', $author->id) }}" class="hover:underline">{{ $author->name }}</a></td>
                                <td class="border px-4 py-2">{{ $author->age }}</td>
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

