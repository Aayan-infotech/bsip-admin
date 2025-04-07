<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }
    
    public function login(Request $request)
    {        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => 'required',
        ]);

        
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
        ]);

        $result = $response->json();

        
        if (!$result['success'] || $result['score'] < 0.5) {
            return response()->json(['error' => 'reCAPTCHA verification failed!'], 422);
        }

        $credentials = $request->only('email', 'password');
        $user = \App\Models\User::where('email', $credentials['email'])->first();

        if ($user && !$user->status) {
            // return redirect()->back()->withErrors(['email' => 'Your account is blocked. Please contact the administrator.']);
            return response()->json(['error' => 'Your account is blocked. Please contact the administrator.'], 401);
        }
        
        if (Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Login successful!', 'redirect' => url('/')]);
        } else {
            return response()->json(['error' => 'Invalid credentials!'], 401);
        }
    }

    
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}

?>