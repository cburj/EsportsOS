<?php

namespace App\Http\Controllers;

use DisputeMessages;
use Illuminate\Http\Request;
use App\Models\DisputeMessage;
use Illuminate\Support\Facades\Log;

class DisputeMessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $message = DisputeMessage::create([
            'content' => $request->message,
            'visible' => true,
            'matchup_id' => $request->matchup_id,
            'user_id'=> $request->user_id,
            ]);
            $status = "SUCCESS: Message Posted!";

            Log::channel('general')->info('USER_ID: ' . $request->user_id . '|| ACTION: DISPUTE_MESSAGE_POSTED || CONTENT: "' . $request->message . '"');
        }
        catch(\Illuminate\Database\QueryException $exception)
        {
            $status = $exception->errorInfo;
        }

        return response()->json(array('status' => $status), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function refreshDisputeMessages(Request $request)
    {
        try
        {
            $date_time = date("Y-m-d H:i:s", $request->last_request);

            $messages = DisputeMessage::where('matchup_id', $request->matchup_id)->where('created_at', '>', $date_time)->get();
            return response()->json(array('messages' => $messages), 200);
        }
        catch(\Illuminate\Database\QueryException $exception)
        {
            return response()->json(array('status' => $exception->errorInfo), 200);
        }
    }
}
