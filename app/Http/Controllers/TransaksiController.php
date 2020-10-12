<?php

namespace App\Http\Controllers;

use App\Saldo;
use App\Transaksi;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['saldos'] = Saldo::all();
        $this->data['transaksis'] = Transaksi::all();
        return view('transaksi', $this->data);
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
        $saldo = Saldo::findOrFail($params['saldo_id']);
        $saldo->timestamps = false;
        Transaksi::insert($params);

        if ($params['jenis'] == 'debet') {
            $saldo['saldo'] =  $saldo['saldo'] + $params['nominal'];
        } elseif ($params['jenis'] == 'kredit') {
            $saldo['saldo'] =  $saldo['saldo'] - $params['nominal'];
        }
        $saldo->save();
        return redirect()->route('transaksi.index');
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
        $this->data['transaksi'] = Transaksi::findOrFail($id);
        $this->data['saldos'] = Saldo::all();
        return view('transaksi_edit', $this->data);
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
        $transaksi = Transaksi::findOrFail($id);
        $params = $request->except('_token');
        $saldo = Saldo::findOrFail($transaksi['saldo_id']);
        $saldo->timestamps = false;
        $transaksi->timestamps = false;


        if ($params['jenis'] == 'debet') {
            $saldo['saldo'] = $saldo['saldo'] - $transaksi['nominal'];
            $saldo['saldo'] =  $saldo['saldo'] + $params['nominal'];
        } elseif ($params['jenis'] == 'kredit') {
            $saldo['saldo'] = $saldo['saldo'] + $transaksi['nominal'];
            $saldo['saldo'] =  $saldo['saldo'] - $params['nominal'];
        }
        $saldo->save();
        $transaksi->update($params);
        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $saldo = Saldo::findOrFail($transaksi['saldo_id']);
        $saldo->timestamps = false;
        if ($transaksi['jenis'] == 'debet') {
            $saldo['saldo'] = $saldo['saldo'] - $transaksi['nominal'];
        } elseif ($transaksi['jenis'] == 'kredit') {
            $saldo['saldo'] = $saldo['saldo'] + $transaksi['nominal'];
        }
        $saldo->save();
        $transaksi->delete();
        return redirect()->route('transaksi.index');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'transaksi.xlsx');
    }
}
