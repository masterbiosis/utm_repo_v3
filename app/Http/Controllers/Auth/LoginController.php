<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function validateLogin(\Illuminate\Http\Request $request)
{
    $request->validate([
        $this->username() => 'required|string',
        'password' => 'required|string|min:8',
    ], [
        // Mensajes personalizados para los campos vacíos
        $this->username() . '.required' => 'El campo de correo electrónico es obligatorio.',
        'password.required' => 'Por favor, introduce tu contraseña.',
        'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
    ]);
}
}
