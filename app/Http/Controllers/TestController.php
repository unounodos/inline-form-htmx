<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class TestController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        $isEditing = false;

        return view('test.show', compact('user', 'isEditing'));
    }

    public function edit()
    {
        $user = auth()->user();
        $isEditing = true;

        return view('test.show', compact('user', 'isEditing'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'bio' => 'required|string|max:1000',
            'location' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return view('test.show')
                ->with(['isEditing'=> true, 'user'=> auth()->user()])
                ->withErrors($validator, 'updateProfile');
        }
        auth()->user()->update($request->all());

        return redirect()->route('profile.show');
    }
}
