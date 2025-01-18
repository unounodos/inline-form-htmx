<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{
    public function show()
    {
        return view('test.show', [
            'user' => auth()->user(),
            'isEditing' => false,
        ]);
    }

    public function edit()
    {
        return view('test.show', [
            'user' => auth()->user(),
            'isEditing' => true,
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'bio' => 'required|string|max:1000',
            'location' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            // just return the full view with the errors
            // if htmx is disabled, a page refresh is done, otherwise hx-select will pick
            // the relevant content from the response
            return view('test.show')
                ->with(['isEditing'=> true, 'user'=> auth()->user()])
                ->withErrors($validator, 'updateProfile');
        }
        auth()->user()->update($request->all());

        return redirect()->route('profile.show');
    }
}
