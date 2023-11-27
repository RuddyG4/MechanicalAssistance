<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function showWorkshopLogin()
    {
        return view('auth.workshop-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if (!Auth::validate($credentials)) {
            return back()->withErrors(['failedAuth' => 'El correo y/o contraseña son incorrectos, verifique e intente nuevamente']);
        }
        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        if ($request['loginType'] == 'workshop') {
            $workshops = $user->client->workshops;
            $workshopCount = $workshops->count();

            if ($workshopCount <= 0) {
                return back()->withErrors(['failedAuth' => 'No se puedo verificar sus credenciales, verifique e intente nuevamente']);
            }

            Auth::login($user);
            if ($workshops->count() == 1) {
                //add the workshop id to the session
                $request->session()->put('workshop_id', $workshops[0]->id);
                return redirect(route('workshop-home'));
            }
        } else {
            Auth::login($user);
            return redirect()->intended('/');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect()->to('/login');
    }
}
