@unless( auth()->user()->is($user) )
    <form action="{{ route('follow', $user) }}" method="post">
        @csrf
        <button
            type="submit"
            class="bg-blue-500 rounded-full shadow p-2 text-white text-xs"
        >
            {{ auth()->user()->following($user) ? 'Unfollow' : 'Follow' }}
        </button>
    </form>
@endunless
