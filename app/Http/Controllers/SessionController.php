<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success','Goodbye');
    }
    public function create()
    {
        return view('sessions.create');
    }
    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (auth()->attempt($attributes))
        {
            session()->regenerate(); // prevent session fixation attack
            return redirect('/')->with('success','Welcome Back');
        }
        // if auth failed return errors
        throw ValidationException::withMessages([
            'email' => 'Your providded crediential is not verified'
        ]);
        // return back()
        // ->withInput()
        // ->withErrors(['email' => 'Your providded crediential is not verified']);
    }
}
