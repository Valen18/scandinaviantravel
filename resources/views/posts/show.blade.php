@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-4 flex justify-center">
        <div class="w-full">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-xl mb-4">Image Gallery for Posts: {{ $post->model }}</h2>
                </div>
                <div class="flex text-right">
                    <a href="{{ route('posts.index') }}" class="flex" title="back to posts list">
                        <div class="w-10 h-10 flex items-center justify-center">
                            <div class="w-6 h-6 flex items-center justify-center bg-blue-600 rounded-full transition duration-300 transform-gpu hover:bg-blue-600 hover:text-white hover:scale-105">
                                <i class="fa fa-arrow-left text-white text-sm hover:text-white"></i> 
                            </div>
                        </div> 
                        <div class="mt-1 pt-1 text-sm">Back to Posts List</div>
                    </a>
                </div>
            </div>

            <livewire:image-gallery :instance="$post" />
            
        </div>
    </div>
@endsection
