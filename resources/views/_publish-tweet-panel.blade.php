<div>
    <form action="/tweets" method="post">
        @csrf
        <textarea
            name="body"
            id="body"
            class="w-full border-none"
            placeholder="What's up doc?"
            required
        ></textarea>

        <hr class="m-4">

        <div class="mt-2 flex justify-between items-center">
            <img
                src="{{ auth()->user()->avatar }}"
                alt="Dino Cajic Avatar"
                class="rounded-full mr-2"
                width="40"
                height="40"
            >

            <button
                type="submit"
                class="bg-blue-400 rounded-full shadow py-2 px-6 text-sm text-white hover:bg-blue-500"
            >Tweet-a-roo</button>
        </div>
    </form>

    @error('body')
        <div class="mt-4 text-red-500 text-sm">
            {{ $message }}
        </div>
    @enderror
</div>
