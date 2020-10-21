<?php

namespace App\Http\Controllers;

use App\KelasProyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class KelasProyekController extends Controller
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

        $klsPro = KelasProyek::all();
        return view('admin.kelasProyek.index')->with('kelasproyek', $klsPro);

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
            'namaKelasProyek' => 'required',
            'deskripsi' => 'required',
            'maksAnggota' => 'required | unique_with:kelasproyek,namaKelasProyek,maksAnggota',
            'status' => 'required',
        ];

        $customMessages = [
            'unique_with' => 'Data yang ditambah sudah memiliki data yang sama'
        ];

        $this->validate($request,$rules, $customMessages);

        KelasProyek::create($request->all());

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
            'namaKelasProyek' => 'required',
            'deskripsi' => 'required',
            'maksAnggota' => 'required',
            'status' => 'required',
        ];


        $this->validate($request,$rules);
        $klsPro = KelasProyek::findOrFail($request->id_kelasProyek);
        $klsPro->update($request->all());

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
        $klsPro = KelasProyek::findOrFail($id);
        $klsPro->delete();

        return back()->with('success', 'Berhasil menghapus data');
    
    }
}
