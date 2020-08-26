<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\AnggotaProyek;


class AnggotaKelompokController extends Controller
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

        $rules = [
            'kelompokProyek_id' => 'required',
            'mahasiswaProyek_id' => 'required | unique_with :anggotakelompok,kelompokProyek_id',
        ];

        $customMessages = [
            'unique_with' => 'Data yang ditambahkan sudah memiliki data yang sama'
        ];

        $this->validate($request,$rules, $customMessages);

            AnggotaProyek::create($request->all());
            return back()->with('success', 'Berhasil mengundang anggota');


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
    public function update(Request $request, $id)
    {
        //
        // dd($request);
        if($request->id_anggotaKelompok == NULL){
            $anggota                    = AnggotaProyek::findOrFail($id);
            $anggota->statusAnggota = "Aktif";
            $anggota->save();
            }
        else{
            $anggota                    = AnggotaProyek::findOrFail($request->id_anggotaKelompok);
            $anggota->statusAnggota = "Aktif";
            $anggota->save();
        }
        return back()->with('success', 'Berhasil bergabung dengan kelompok');;
    }

    public function reject($id)
    {
        //
        // dd($id);
        $anggota = AnggotaProyek::findOrFail($id);
        $anggota->delete();

        return back()->with('success', 'Berhasil menolak undangan kelompok');
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

        $anggota = AnggotaProyek::findOrFail($id);
        $anggota->delete();

        return back()->with('success', 'Berhasil menghapus data anggota');
    }
}
