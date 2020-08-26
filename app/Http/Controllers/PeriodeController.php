<?php

namespace App\Http\Controllers;

use App\Periode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::guard('admin')->check()) {

        $periode = Periode::latest()->paginate(5);
        return view('admin.periode.index')->with('periode', $periode);

        }

        else {
            return view('errors.403');
        }

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
        $rules = [
            'tahunAjaran' => 'required',
            'semester' => 'required | unique_with:periode,tahunAjaran,semester',
        ];

        $customMessages = [
            'unique_with' => 'Data yang ditambahkan sudah memiliki data yang sama'
        ];

        $this->validate($request,$rules, $customMessages);

        Periode::create($request->all());

        return back()->with('success','Berhasil menambah data');
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
        
        $rules = [
            'tahunAjaran' => 'required',
            'semester' => 'required | unique_with:periode,tahunAjaran,semester',
        ];

        $customMessages = [
            'unique_with' => 'Data yang diubah sudah memiliki data yang sama'
        ];

        $this->validate($request,$rules, $customMessages);

        $periode = Periode::findOrFail($request->id_periode);
        $periode->update($request->all());

        return back()->with('success','Berhasil mengubah data');
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
        $periode = Periode::findOrFail($id);
        $periode->delete();

        return back()->with('success','Berhasil menghapus data');
    }
}
