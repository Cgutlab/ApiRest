<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Subscription::create($request->all());
            $message = 'Record added successfully!';
        } catch (\Exception $e) {
            $message = 'An error occurred, please try again!';
        }
        return response()->json([
            'message' => $message
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            Subscription::where('client', $request->client)->delete();
            $message = 'Record deleted successfully!';
        } catch (\Exception $e) {
            $message = 'An error occurred, please try again!';
        }
        return response()->json([
            'message' => $message
        ], 200);
    }
}
