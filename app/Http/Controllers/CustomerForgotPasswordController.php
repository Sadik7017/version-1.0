<?php
namespace App\Http\Controllers;


use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use App\Http\Controllers;

class CustomerForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('customer.auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::broker('customers')->sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
}
