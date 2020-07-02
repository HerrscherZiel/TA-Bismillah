<?php

namespace App\Http\Controllers;

use App\Dosen;
use App\Mahasiswa;
use App\ProfilMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//    public function __construct()
//    {
//        $this->middleware('auth:mahasiswa');
//        $this->middleware('auth:dosen');
//    }

    public function indexMahasiswa()
    {
        //
        if(Auth::guard('mahasiswa')->check()){
            
            $id = Auth::guard('mahasiswa')->user()->id_mahasiswa;

            $profil = Mahasiswa::join('profilmahasiswa', 'mahasiswa_id', '=', 'id_mahasiswa')
                               ->where('id_mahasiswa', '=', $id)
                               ->get();

    //    dd($id);

            return view('mahasiswa.profile.index')->with('profil', $profil);
        }

        else{
            return view('errors.403');

        }

//        return view('mahasiswa.profile.index');

    }

    public  function  indexDosen()
    {
        if(Auth::guard('dosen')->check()){

            $id = Auth::guard('dosen')->user()->id_dosen;

        $profil = Dosen::where('id_dosen', '=', $id)->get();

//        dd($profil);

        return view('dosen.profile.index')->with('profil', $profil);
        }

        else{
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
//        dd($request);
        if(Auth::guard('mahasiswa')->check()) {

            $proMhs = ProfilMahasiswa::findOrFail($request->id_profilMahasiswa);

            if($request->fileFoto == NULL){
                $proMhs->update($request->all());
            }

            else{

                $file = $request->file('fileFoto');

                $nama_file = time()."_".$file->getClientOriginalName();
                $tujuan_upload = 'data_profilmhs';
                $file->move($tujuan_upload, $nama_file);
                $proMhs->fileFoto = $nama_file;

                $proMhs->save();
            
            }
            // $proMhs->update($request->all());

            return back();
        }

        if(Auth::guard('dosen')->check()){
            $proDos = Dosen::findOrFail($request->id_dosen);
            $proDos->update($request->all());

            return back();
        }

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
    }
}
