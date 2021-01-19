<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index()
    {
        return view('tweets.index', [
            'tweets' => auth()->user()->timeline(),
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $this->validateRequest($request);

        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body'],
        ]);

        return redirect( route('dashboard') );
    }

    public function validateRequest(Request $request)
    {
        return $this->validate($request, [
            'body' => ['required', 'max:255']
        ]);
    }
}
