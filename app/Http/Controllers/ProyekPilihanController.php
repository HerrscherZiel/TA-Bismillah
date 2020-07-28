<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ProyekPilihan;
use App\UsulMahasiswa;
use App\Proyek;


class ProyekPilihanController extends Controller
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
        $kels = $request->kelompokProyek_id;
        $pros = $request->proyek_id;
        $prio = $request->prioritas;

        // dd($prio);
        $i =0;
        foreach($pros as $pro) {
            ProyekPilihan::create([
                'kelompokProyek_id' => $kels,
                'proyek_id' => $pro,
                'prioritas' => $prio[$i]
            ]);
            // dd($i);
            $i++;
        }

        if($i != 3){
        $usul = new UsulMahasiswa([
            'kelompokProyek_id'    => $request->get('kelompokProyek_id'),
            'judulUsul'             => $request->get('judulUsul'),
            'deskripsi'             => $request->get('deskripsi'),
            'statusUsul'            => 'Menunggu Persetujuan'
        ]);
        $usul->save();
        }

        
        return back()->with('success', 'Berhasil memilih proyek');

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
        if(Auth::guard('mahasiswa')->check()) {

            $this->validate($request, [
                'kelompokProyek_id' => 'required',
            ]);
        
            $propil = $request->id_proyekPilihan;
            // dd($propil);
            $kelpro = $request->kelompokProyek_id;
            // dd($kelpro);
            $pro    = $request->proyek_id;
            // dd($pro);
            $prio   = $request->prioritas;
            // dd($prio);
            $idUsul = $request->id_usulMahasiswa;
            // dd($idUsul);

            $i =0;

            // dd(count($propil));

            $jumProPil = count($propil);
            $jumPro    = count($pro); 

            //Jika jumlah propil lebih sedikit, tambah propil hapus usul
            if($jumProPil < $jumPro){
                $loop = array(1, 2);
                foreach($loop as $for) {
                    $proyekpilihan                    = ProyekPilihan::findOrFail($propil[$i]);
                    $proyekpilihan->kelompokProyek_id = $kelpro[$i];
                    $proyekpilihan->proyek_id         = $pro[$i];
                    $proyekpilihan->prioritas         = $prio[$i];
                    $proyekpilihan->save();
                    $i++;                
                }

                ProyekPilihan::create([
                    'kelompokProyek_id' => $kelpro[0],
                    'proyek_id' => $pro[2],
                    'prioritas' => $prio[2]
                ]);

                $usulJudul                = UsulMahasiswa::findOrFail($idUsul);
                $usulJudul->delete();
                
            // dd($i);
            }

            //Jika jumlah propil sama dengan jumlah proyek dan ada id usul, tambah usul hapus propil
            //Save 2 propil atas, hapus propil 3, save usul
            elseif($jumProPil == 3 && $request->judulUsul != NULL){
                // $x="salah";
                // dd($x);

                //save 2 atas
                $loop = array(1, 2);
                foreach($loop as $for) {
                    $proyekpilihan                    = ProyekPilihan::findOrFail($propil[$i]);
                    $proyekpilihan->kelompokProyek_id = $kelpro[$i];
                    $proyekpilihan->proyek_id         = $pro[$i];
                    $proyekpilihan->prioritas         = $prio[$i];
                    $proyekpilihan->save();

                    $i++;                
                }
                
                //hapus pilihan 3
                $pilihan3             = ProyekPilihan::findOrFail($propil[2]);
                $pilihan3->delete();

                //simpan usul
                UsulMahasiswa::create([
                    'kelompokProyek_id'     => $kelpro[0],
                    'judulUsul'             => $request->judulUsul,
                    'deskripsi'             => $request->deskripsi,
                    'statusUsul'            => 'Menunggu Persetujuan'
                ]);

            }
            //Jika jumlah propil sama dengan jumlah proyek dan id usul null, edit propil full
            //clear
            elseif($jumProPil == 3 && $idUsul == NULL){

                // $x="yes";
                // dd($x);

                foreach($propil as $pros) {

                    $proyekpilihan                    = ProyekPilihan::findOrFail($pros);
                    $proyekpilihan->kelompokProyek_id = $kelpro[$i];
                    $proyekpilihan->proyek_id         = $pro[$i];
                    $proyekpilihan->prioritas         = $prio[$i];
                    $proyekpilihan->save();

                    $i++;
                }
                
            }
            // $proyekpilihan->update($request->all());
            //Jika jumlah propil sama dengan 2 dan id usul tidak null, edit 2 propil edit usul
            //clear
            elseif($jumProPil == 2 && $idUsul != NULL){
                foreach($propil as $pros) {

                    $proyekpilihan                    = ProyekPilihan::findOrFail($pros);
                    $proyekpilihan->kelompokProyek_id = $kelpro[$i];
                    $proyekpilihan->proyek_id         = $pro[$i];
                    $proyekpilihan->prioritas         = $prio[$i];
                    $proyekpilihan->save();

                    $i++;
                }

                $usulJudul                    = UsulMahasiswa::findOrFail($idUsul);
                $usulJudul->kelompokProyek_id = $kelpro[0];
                $usulJudul->judulUsul         = $request->judulUsul;
                $usulJudul->deskripsi         = $request->deskripsi;
                $usulJudul->save();

            }
            return back()->with('success', 'Berhasil mengubah pilihan proyek');
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
