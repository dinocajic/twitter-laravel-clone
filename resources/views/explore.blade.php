<x-app>
    <div>
        @foreach($users as $user)
            <a class="flex items-center mb-2" href="{{ route('profile', $user) }}">
                <img
                    src="{{ $user->avatar }}"
                    alt=""
                    class="w-20 rounded-full mr-2"
                >

                <div>
                    <h4 class="font-bold">{{ '@' . $user->username }}</h4>
                </div>
            </a>
        @endforeach

        {{ $users->links() }}
    </div>
</x-app>
