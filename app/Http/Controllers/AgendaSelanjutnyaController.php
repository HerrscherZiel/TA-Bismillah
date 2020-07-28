<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Laporan;
use App\MahasiswaProyek;
use App\AgendaSelanjutnya;


class AgendaSelanjutnyaController extends Controller
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
        //
        $this->validate($request, [
            'agendaSelanjutnya' => 'required',
            'deskripsi' => 'required',
        ]);
        AgendaSelanjutnya::create($request->all());

        return back()->with('success', 'Berhasil menambah agenda selanjutnya');
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
    public function update(Request $request)
    {
        //
        // dd($request);
        $this->validate($request, [
            'agendaSelanjutnya' => 'required',
            'deskripsi' => 'required',
        ]);
        $agenda                   = AgendaSelanjutnya::findOrFail($request->id_agendaSelanjutnya);
        $agenda->agendaSelanjutnya             = $request->agendaSelanjutnya;
        $agenda->deskripsi           = $request->deskripsi;
        $agenda->save();

        return back()->with('success', 'Berhasil mengubah agenda selanjutnya');;
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
        $agenda = AgendaSelanjutnya::findOrFail($id);
        $agenda->delete();

        return back()->with('success', 'Berhasil menghapus agenda selanjutnya');
    }
}
