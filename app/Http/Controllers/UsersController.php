<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

use App\Models\User;


class UsersController extends Controller
{
    public function showAdmins()
    {
        if (Auth::user() && Auth::user()->isAdmin)
        {
            $users = User::all();
            return view('admin.users')->with('users', $users);
        }
        else
        {
            return redirect('/');
        }
    }

    /**
     * Used to update a user to be an admin, or remove them as an admin.
     */
    public function adminModify(Request $request, $id)
    {
        try {
            $user = User::where('id', $request->id)->get();

            $user[0]->isAdmin = !($user[0]->isAdmin);
            $user[0]->save();

            //Log the action
            Log::channel('general')->info('USER_ID: ' . Auth::user()->id . '| ACTION: Changed admin status for ' . $user[0]->name . ' (ID: ' . $request->id . ')');

            return redirect('/admin/users')->with('successMessage', 'Action Successful!');

        }
        catch (QueryException $e) {
            return redirect('/admin/users');
        }
    }

    public function apiConfig()
    {
        $users = User::all();

        if (Auth::user() && Auth::user()->isAdmin)
        {
            return view('admin.apiconfig')->with('users', $users);
        }
        else
        {
            return redirect('/');
        }
    }

    public function regenerateApiToken(Request $request)
    {
        if(Auth::user() && Auth::user()->isAdmin)
        {
            $user = User::where('id', $request->user_id)->first();

            $new_token = Str::random(60);

            $user->api_token = $new_token;

            $user->save();

            //Log the action
            Log::channel('general')->info('USER_ID: ' . Auth::user()->id . '| ACTION: Generated API Token for USER ' . $request->user_id);

            return redirect('/api/config')->with('successMessage', 'New Token: ' . $new_token);
        }
        else
        {
            return redirect('/');
        }
    }

    public function revokeApiToken(Request $request)
    {
        if(Auth::user() && Auth::user()->isAdmin)
        {
            $user = User::where('id', $request->user_id)->first();

            $user->api_token = null;

            $user->save();

            //Log the action
            Log::channel('general')->info('USER_ID: ' . Auth::user()->id . '| ACTION: Revoked API Access/Token for USER ' . $request->user_id);

            return redirect('/api/config')->with('successMessage', 'API Access Revoked');
        }
        else
        {
            return redirect('/');
        }
    }
}
