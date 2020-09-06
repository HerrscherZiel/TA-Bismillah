<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ProyekPilihan;
use Illuminate\Support\Facades\Validator;
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

        // $data = $request->validate([
        //     "proyek_id"    => "required|array",
        //     "proyek_id.*"  => "required|distinct",
        //     "prioritas"    => "required|array",
        //     "prioritas.*"  => "required|distinct",
        // ]);

        $validator = Validator::make($request->all(), [
            "proyek_id"    => "required|array",
            "proyek_id.*"  => "required|distinct",
            "prioritas"    => "required|array",
            "prioritas.*"  => "required|distinct",
        ]);

        // check validation
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return back()->with('error','Proyek Pilihan atau Prioritas tidak boleh memiliki nilai yang sama');
        }

        $kels = $request->kelompokProyek_id;
        $pros = $request->proyek_id;
        $prio = $request->prioritas;

        $i =0;
        foreach($pros as $pro) {
            ProyekPilihan::create([
                'kelompokProyek_id' => $kels,
                'proyek_id' => $pro,
                'prioritas' => $prio[$i]
            ]);
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
        $validator = Validator::make($request->all(), [
            "proyek_id"    => "required|array",
            "proyek_id.*"  => "required|distinct",
            "prioritas"    => "required|array",
            "prioritas.*"  => "required|distinct",
        ]);

        // check validation
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return back()->with('error','Proyek Pilihan atau Prioritas tidak boleh memiliki nilai yang sama');
        }
        // dd($request);
        if(Auth::guard('mahasiswa')->check()) {

            $this->validate($request, [
                'kelompokProyek_id' => 'required',
            ]);
        
            $propil = $request->id_proyekPilihan;
            $kelpro = $request->kelompokProyek_id;
            $pro    = $request->proyek_id;
            $prio   = $request->prioritas;
            $idUsul = $request->id_usulMahasiswa;

            $i =0;

            $jumProPil = count($propil);
            $jumPro    = count($pro); 

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
                
            }


            elseif($jumProPil == 3 && $request->judulUsul != NULL){

                $loop = array(1, 2);
                foreach($loop as $for) {
                    $proyekpilihan                    = ProyekPilihan::findOrFail($propil[$i]);
                    $proyekpilihan->kelompokProyek_id = $kelpro[$i];
                    $proyekpilihan->proyek_id         = $pro[$i];
                    $proyekpilihan->prioritas         = $prio[$i];
                    $proyekpilihan->save();

                    $i++;                
                }
                
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

            elseif($jumProPil == 3 && $idUsul == NULL){
                foreach($propil as $pros) {

                    $proyekpilihan                    = ProyekPilihan::findOrFail($pros);
                    $proyekpilihan->kelompokProyek_id = $kelpro[$i];
                    $proyekpilihan->proyek_id         = $pro[$i];
                    $proyekpilihan->prioritas         = $prio[$i];
                    $proyekpilihan->save();

                    $i++;
                }
            }
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
