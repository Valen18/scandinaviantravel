@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-4 flex justify-center">
        <div class="w-full">
            <h2 class="text-2xl font-semibold mb-4">Posts list</h2>

            @if ($posts->count() > 0)
                <table class="min-w-full border-collapse table-auto">
                    <thead>
                        <tr>
                            <th class="border bg-gray-200 px-4 py-2 text-blue-800">Title</th>
                            <th class="border bg-gray-200 px-4 py-2 text-blue-800">Slug</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td class="border px-4 py-2"><a href="{{ route('post.show', $post->id) }}" class="hover:underline">{{ $post->title }}</a></td>
                                <td class="border px-4 py-2">{{ $post->slug }}</td>
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

