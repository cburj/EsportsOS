<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Database\QueryException;


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

            return redirect('/admin/users')->with('successMessage', 'Action Successful!');

        }
        catch (QueryException $e) {
            return redirect('/admin/users');
        }
    }
}
