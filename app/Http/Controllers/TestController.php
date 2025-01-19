<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
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
    public function update(ProfileUpdateRequest $request)
    {
        auth()->user()->update($request->validated());

        return redirect()->route('profile.show');
    }
}
