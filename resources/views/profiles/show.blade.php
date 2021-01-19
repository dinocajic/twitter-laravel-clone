@extends('layouts.app')

@section('content')
    <header class="mb-4">
        <div class="relative">
            <img
                src="/img/banner.jpg"
                alt="Profile Banner"
                class="rounded-lg mb-2"
            >

            <img
                src="{{ $user->avatar }}"
                alt="Dino Cajic Avatar"
                class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
                style="left: 50%"
                width="150"
            >
        </div>

        <div class="flex justify-between items-center mb-4">
            <div style="max-width: 250px;">
                <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>

            <div class="flex">

                @can('edit', $user)
                    <a href="{{ route('profiles.edit', $user) }}" class="rounded-full shadow p-2 text-black text-xs mr-2">Edit Profile</a>
                @endcan

                <x-follow-button :user="$user" />
            </div>
        </div>

        <p class="text-sm">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit obcaecati, rem! Dicta dolore hic nisi
            nulla numquam quidem quod quos ratione, recusandae rerum sapiente sunt tempore ullam velit voluptas voluptatem.
        </p>

    </header>

    @include('_timeline', [
        'tweets' => $tweets
    ])
@endsection
