<h3 class="font-bold text-xl mb-4 border border-gray-200">
    Following
</h3>

<ul>
    @forelse ( auth()->user()->follows as $user )
        <li>
            <a href="{{ route('profile', $user) }}" class="flex items-center text-small mb-2">
                <img
                    src="{{ $user->avatar }}"
                    alt="{{ $user->name }}'s Avatar"
                    class="rounded-full mr-2"
                    width="50"
                    height="50"
                >

                {{ $user->name }}
            </a>
        </li>
    @empty
        <li>No Friends Yet</li>
    @endforelse
</ul>
