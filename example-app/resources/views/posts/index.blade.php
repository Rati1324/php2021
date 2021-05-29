@extends('layout.app')
@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <form action="{{ route('posts') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body cols="30" rows="4" 
                    class="bg-gray-100" border-2 w-full p-4 rounded-lg
                    @error('body') border-red-500 @enderror" placeholder="body"></textarea>

                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                 <div>
                     <button type="submit" class="bg-blue-500 text0white px-4 py-2 rounded font-medium">
                        Post
                     </button>
                 </div>
            </form>

            @if ($posts->count())
                @foreach($posts as $p)
                    <div class="mb-4">
                        <a href="" class="font-bold">{{ $p->user->username }} <span class="text-gray-600
                            text-small">{{ $p->created_at->diffForHumans() }}</span>
                            <p clsas="mb-2">{{ $p->body }}</p>
                        </a>
                    </div>

                    <div class="flex items-center">
                        <form action="" method="POST" class="mr-1">
                            @csrf
                            <button style="submit" class="text-blue-500">Like</button>
                        </form>
                        <form action="" method="POST" clsas="mr-1">
                            @csrf
                            <button style="submit" class="text-blue-500">UnLike</button>
                        </form>
                    </div>
                @endforeach
                {{ $posts  -> links() }}
            @else
                <p>No posts</p>
            @endif
        </div>
    </div>
@endsection
