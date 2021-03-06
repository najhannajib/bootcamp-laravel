<?php

namespace App\Http\Controllers;

use App\Models\telefon;
use Illuminate\Http\Request;

use App\Mail\TelefonBaru;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Http;

class TelefonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $telefons = Telefon::all();

        $response = Http::get('https://swapi.dev/api/planets');
        $response->json();

        return view('telefons.index',[
            'telefons'=>$telefons,
            'starwars'=>$response['results']
        ]);
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
        //
        $telefon = new telefon;

        $telefon->nama = $request->nama;
        $telefon->jenama = $request->jenama;
        $telefon->no_model = $request->no_model;
        $telefon->no_serial = $request->no_serial;
        $telefon->harga = $request->harga;
        $telefon->kedai_id = $request->kedai_id;

        $telefon->save();
        $recipient=["najhan.mnajib@gmail.com", "israasaifullah@gmail.com"];
        Mail::to($recipient)->send(new TelefonBaru());
        return redirect('/telefons/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\telefon  $telefon
     * @return \Illuminate\Http\Response
     */
    public function show(telefon $telefon)
    {
        //
        return view('telefons.show',[
            'telefon'=>$telefon
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\telefon  $telefon
     * @return \Illuminate\Http\Response
     */
    public function edit(telefon $telefon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\telefon  $telefon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, telefon $telefon)
    {
        //
        $telefon->nama = $request->nama;
        $telefon->jenama = $request->jenama;
        $telefon->no_model = $request->no_model;
        $telefon->no_serial = $request->no_serial;
        $telefon->harga = $request->harga;
        $telefon->kedai_id = $request->kedai_id;

        $telefon->save();
        return redirect('/telefons/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\telefon  $telefon
     * @return \Illuminate\Http\Response
     */
    public function destroy(telefon $telefon)
    {
        //
    }
}
