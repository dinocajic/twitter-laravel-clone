<div>
    <div class="border border-gray-300 rounded-lg">
        @forelse($tweets as $tweet)
            @include('_tweet')
        @empty
            <p class="p-4">No Tweets Yet</p>
        @endforelse
    </div>

    <div class="my-4">
        {{ $tweets->links() }}
    </div>
</div>
