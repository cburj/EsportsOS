<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class LogsController extends Controller
{
    /**
     * Function to handle the display of EOS Logs on the front end.
     */
    public function show(Request $request)
    {

        if(Auth::guest() || (!Auth::user()->isAdmin))
        {
            return redirect('/');
        }

        $filePath = storage_path(("logs/eos.log"));
        $data = [];

        if(File::exists($filePath))
        {
            $data = [
                'lastModified' => new Carbon(File::lastModified(($filePath))),
                'size' => File::size($filePath),
                'file' => File::get($filePath),
            ];
        }

        return view('logs.logs', compact('data'));
    }
}
