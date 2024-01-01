<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Account;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\InviteUserEmail;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the users on basis of invite with status.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $users = Account::where('id', $id)->with('users')->get();
        return view('users/list',  ['users' => $users, 'id' => $id]);
    }

    /**
     * Show the form for inviting a new user through email.
     *
     * @return \Illuminate\Http\Response
     */
    public function invite($id)
    {
        $users = User::whereNot('id', auth()->user()->id)->get();
        return view('invite', ['users' => $users, 'id' => $id]);
    }

    /**
     * Send a newly invited user an invitation email
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function process_invites(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        $token = Str::random(16);
        $user->update(['verification_token' => $token]);
        $data = ([
            'email' => $user->email,
            'name'  => $request->get('name'),
            'verification_token' => $token
        ]);
        Mail::to($user->email)->send(new InviteUserEmail($data));
        return redirect('users/' . $request->account_id)->with('success', 'The Invite has been sent successfully');
    }

    public function verificationAction($token)
    {
        $user = User::where('verification_token', $token)->first();
        if (!$user) {
            return redirect('login')->with('error', 'User Not Found');
        } else {
            $user->update(['verification_token' => NULL]);
            return redirect('login')->with('status', 'User process has been done.You can login');
        }
    }
}
