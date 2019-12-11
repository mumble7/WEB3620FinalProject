<?php

namespace App\Http\Controllers;

use App\DemoFormSubmit;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class FormController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $var1 = 2;
        $var2 = 4;

        $coolioBeans = $var1 * $var2;

        return view('forms.test', ['test' => $coolioBeans]);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //This is the resource created
        $attributes = $request->validate([
            "demo_name" => ["required"],
            "email_address" => ["required", "email"],
            "phone_number" => ["required", "phone:US"],
        ]);

        DemoFormSubmit::create($attributes);

        $url = 'https://app.calldrip.com/api/newlead';

        $data = [
                'source_id' => 300101, 'fname' => $attributes["demo_name"], 'email' => $attributes["email_address"], 'phone' => $attributes["phone_number"],
                    'apikey' => "098f6bcd4621d373cade4e832627b4f6098f6bcd4621d", 'apiuser' => "test", 'apipass' => "calldrip123", 'notes' => null, 'whisper' => null];

//      From CALLDRIP - Forced Fix - Errors Found
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        curl_close($ch);

        session()->flash('formSubmitted', true);

        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
