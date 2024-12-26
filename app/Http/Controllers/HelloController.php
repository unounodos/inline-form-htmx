<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController
{
    public function __invoke(Request $request)
    {
//        dd($request->all());
        return view('welcome', ['name' => $request->input('name')]);
    }
}
