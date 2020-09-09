<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Laporan;
use App\MahasiswaProyek;
use App\Proyek;
use App\KelompokProyek;
use App\Milestone;


class MilestoneController extends Controller
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
            'milestone' => 'required',
            'statusMilestone' => 'required',
            'tglTarget' => 'required',
            'tglPerkiraan' => 'required',
        ],
        [ 'tglTarget.required' => 'Kolom Tanggal Target tidak boleh kosong.',
        'tglPerkiraan.required' => 'Kolom Tanggal Perkiraan tidak boleh kosong.'
        ]);
        Milestone::create($request->all());

        return back()->with('success', 'Berhasil menambah milestone');
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
        $this->validate($request, [
            'milestone' => 'required',
            'statusMilestone' => 'required',
            'tglTarget' => 'required',
            'tglPerkiraan' => 'required',
        ],
        [ 'tglTarget.required' => 'Kolom Tanggal Target tidak boleh kosong.',
        'tglPerkiraan.required' => 'Kolom Tanggal Perkiraan tidak boleh kosong.'
        ]);
        $milestone                    = Milestone::findOrFail($request->id_milestone);
        $milestone->milestone             = $request->milestone;
        $milestone->statusMilestone           = $request->statusMilestone;
        $milestone->tglTarget           = $request->tglTarget;
        $milestone->tglPerkiraan           = $request->tglPerkiraan;

        $milestone->save();

        return back()->with('success', 'Berhasil mengubah milestone');
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
        $milestone = Milestone::findOrFail($id);
        $milestone->delete();

        return back()->with('success', 'Berhasil menghapus milestone');
    }
}
