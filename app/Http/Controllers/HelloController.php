<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController
{
    public function __invoke(Request $request)
    {
//        dd($request->all());
        return view('welcome', ['name' => $request->input('name')])
            ->with('event', 'name:provided');
        // we kunnen de sessie gebruiken om events te js triggeren
        // deze truc zag ik in https://youtu.be/vNiZyFVmoOI?t=1393

    }
}
