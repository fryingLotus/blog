@props(['comment'])
<x-panel class="bg-gray-50">
    <article class="flex bg-gray-10 space-x-4">
        <div class="flex-shrink-0">
            <img src="{{ asset('storage/thumbnails/' . $comment->author->profile_image) }}" alt="" width="60" height="60" class="rounded-xl">
        </div>

        <div>
            <header class="mb-4">
                <h3 class="font-bold">{{$comment->author->username}}</h3>

                <p class="text-xs">
                    Posted
                    <time>{{$comment->created_at->format("F j, Y, g:i a")}}</time>
                </p>
            </header>

            {{$comment->body}}

            @if(auth()->user()->is_admin)
                <!-- Display delete button for admin -->
                <form action="{{ route('comments.destroy', ['post' => $post, 'comment' => $comment]) }}" method="post">

                    @csrf
                    @method('delete')

                    <button type="submit" class="text-red-500 hover:text-red-700">Delete Comment</button>
                </form>
                
            @endif
        </div>
    </article>
</x-panel>
