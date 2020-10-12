<?php

namespace App\Http\Controllers;

use App\Saldo;
use Illuminate\Http\Request;

class SaldoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['saldos'] = Saldo::all();
        return view('saldo', $this->data);
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
        $params = $request->except('_token');
        $saldo = Saldo::insertGetId($params);
        $saldo = Saldo::findOrFail($saldo);
        $saldo->timestamps = false;
        $saldo['unique_id'] = 'ID-' . $saldo['id'];
        $saldo->save();
        return redirect()->route('saldo.index');
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
        $this->data['saldo'] = Saldo::findOrFail($id);
        // return $this->data;
        return view('saldo_edit', $this->data);
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
        $params = $request->except('_token');
        $saldo = Saldo::findOrFail($id);
        $saldo->timestamps = false;
        $saldo->update($params);
        return redirect()->route('saldo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $saldo = Saldo::findOrFail($id);
        $saldo->delete();
        return redirect()->route('saldo.index');
    }
}
