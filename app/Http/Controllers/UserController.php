<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Notifications\InviteEmailNotification;

class UserController extends Controller
{
    public function index($id)
    {
        $users = Account::findOrFail($id)->users;
        return view('users/list',  ['users' => $users, 'id' => $id]);
    }

    public function invite()
    {
        $users = User::whereNotIn('id', [auth()->user()->id])->get();
        return view('invite', ['users' => $users]);
    }

    public function create($id)
    {
        $users = Account::findOrFail($id)->users()->get();
        // $users = User::whereNotIn('id', [auth()->user()->id])->get();
        dd($users);
        // return view('users/list',  ['users' => $users]);
    }

    public function process_invites(Request $request)
    {
        $user = Validator::make([
            'email' => 'required|email|unique:users,email'
        ]);
        $user->after(function ($validator) use ($request) {
            if (User::where('email', $request->input('email'))->exists()) {
                $validator->errors()->add('email', 'There exists an invite with this email!');
            }
        });
        if ($user->fails()) {
            return redirect(route('invite'))
                ->withErrors($user)
                ->withInput();
        }
        // do {
        //     $token = Str::random(20);
        // } while (Invite::where('token', $token)->first());
        // Invite::create([
        //     'token' => $token,
        //     'email' => $request->input('email')
        // ]);
        // $url = URL::temporarySignedRoute(

        //     'registration',
        //     now()->addMinutes(300),
        //     ['token' => $token]
        // );
        $user = User::where('email', $request->input('email'))->exists();
        $user->notify(new InviteEmailNotification($user));
        return $user;
        // return redirect('invite')->with('success', 'The Invite has been sent successfully');
    }
}
