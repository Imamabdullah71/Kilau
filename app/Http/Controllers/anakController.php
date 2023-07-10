<?php

namespace App\Http\Controllers;

use App\Models\dataAnak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class anakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = dataAnak::orderBy('nama','desc')->paginate(2);
        return view('anak.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anak.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nama',$request->nama);
        Session::flash('gender',$request->gender);
        Session::flash('agama',$request->agama);
        Session::flash('tempatLahir',$request->tempatLahir);
        Session::flash('tanggalLahir',$request->tanggalLahir);
        Session::flash('anakKe',$request->anakKe);
        Session::flash('dariBersaudara',$request->dariBersaudara);
        Session::flash('statusCPB',$request->statusCPB);
        $request->validate([
            'nama'=>'required',
            'gender'=>'required',
            'agama'=>'required',
            'tempatLahir'=>'required',
            'tanggalLahir'=>'required',
            'anakKe'=>'required|numeric',
            'dariBersaudara'=>'required|numeric',
            'statusCPB'=>'required',
        ],[
            'nama.required'=> 'Nama wajib diisi',
            'gender.required'=> 'Jenis Kelamin wajib diisi',
            'agama.required'=> 'Agama wajib diisi',
            'tempatLahir.required'=> 'Tempat Lahir wajib diisi',
            'tanggalLahir.required'=> 'Tanggal Lahir wajib diisi',
            'anakKe.required'=> 'Anak Ke wajib diisi',
            'anakKe.numeric'=> 'Anak Ke wajib dalam bentuk angka',
            'dariBersaudara.required'=> 'Dari .. Bersaudara wajib diisi',
            'dariBersaudara.numeric'=> 'Dari .. Bersaudara wajib dalam bentuk angka',
            'statusCPB.required'=> 'Status CPB wajib diisi',
        ]);
        $data = [
            'nama' => $request->nama,
            'gender' => $request->gender,
            'agama' => $request->agama,
            'tempatLahir' => $request->tempatLahir,
            'tanggalLahir' => $request->tanggalLahir,
            'anakKe' => $request->anakKe,
            'dariBersaudara' => $request->dariBersaudara,
            'statusCPB' => $request->statusCPB,
        ];
        dataAnak::create($data);
        return redirect()->to('dataAnak')->with('success','Data Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
