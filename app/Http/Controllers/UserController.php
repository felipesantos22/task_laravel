<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Handle an authentication attempt.
     */

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function login()
    {
        return view('login');
    }

    public function home()
    {
        $name = "Felipe";
        return view('home', compact('name'));
    }

    public function error()
    {
        return view('error');
    }

    public function store(Request $request)
    {
        $user = $this->user->create($request->all());
        return $user;
    }

    public function index()
    {
        $user = $this->user->all();
        return $user;
    }


    public function auth(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        } else {
            return redirect()->intended('error');
        }

        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ])->onlyInput('email');
    }
}
