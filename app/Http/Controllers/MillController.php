<?php

namespace App\Http\Controllers;

use App\Mill;
use Illuminate\Http\Request;

class MillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mills = mill::paginate(25);
        return view('mills.index', compact('mills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $mills = mill::all();
        return view('mills.create', compact('mills'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mill  $mill
     * @return \Illuminate\Http\Response
     */
    public function show(Mill $mill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mill  $mill
     * @return \Illuminate\Http\Response
     */
    public function edit(Mill $mill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mill  $mill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mill $mill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mill  $mill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mill $mill)
    {
        //
    }
}
