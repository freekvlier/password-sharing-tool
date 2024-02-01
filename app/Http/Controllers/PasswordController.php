<?php

namespace App\Http\Controllers;

use App\Models\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\PasswordRequest;

class PasswordController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(PasswordRequest $request)
    {
        $guid = Str::uuid();
        $decryptionKey = Str::random(32);
        $encryptedPassword = Crypt::encryptString($request->password, $decryptionKey);

        Password::create([
            'password' => $encryptedPassword,
            'guid' => $guid,
            'max_views' => $request->max_views,
            'expiration_time' => $request->expiration_time,
        ]);

        $link = route('show', ['guid' => $guid, 'key' => $decryptionKey]);

        return redirect()->route('create')->with('success', [
            'message' => 'Password stored successfully!',
            'link' => $link,
        ]);
    }

    public function show($guid, $key)
    {
        $password = Password::where('guid', $guid)->firstOrFail();
        $password->increment('view_count');

        // Check if the maximum number of views has been reached
        if ($password->view_count > $password->max_views) {
            $password->delete();
            return redirect()->route('create')->withErrors(['error' => 'The link has expired']);
        }

        // Check if the password has expired
        if ($password->expiration_time && now() > $password->expiration_time) {
            $password->delete();
            return redirect()->route('create')->withErrors(['error' => 'The link has expired']);
        }

        $decrypted_password = Crypt::decryptString($password->password, $key);

        return view('show', compact('decrypted_password'));
    }
}
