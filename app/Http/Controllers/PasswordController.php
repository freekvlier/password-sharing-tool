<?php

namespace App\Http\Controllers;

use App\Models\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;

class PasswordController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6',
            'max_views' => 'required|integer|min:1',
        ]);

        $guid = Str::uuid();
        $decryptionKey = Str::random(32);

        $encryptedPassword = Crypt::encryptString($request->password, $decryptionKey);

        Password::create([
            'password' => $encryptedPassword,
            'guid' => $guid,
            'max_views' => $request->max_views,
        ]);

        $link = route('show', ['guid' => $guid, 'key' => $decryptionKey]);

        return redirect()->route('create')->with('success', 'Password stored successfully! Shareable link: ' . $link);
    }

    public function show($guid, $key)
    {
        $password = Password::where('guid', $guid)->firstOrFail();

        $password->increment('view_count');

        // Check if the maximum number of views has been reached
        if ($password->view_count > $password->max_views) {
            $password->delete();
            return redirect()->route('create');
        }

        $decryptedPassword = Crypt::decryptString($password->password, $key);

        

        $password->decrypted_password = $decryptedPassword;

        return view('show', compact('password'));
    }
}
