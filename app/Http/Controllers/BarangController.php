<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Jenis;
use App\Models\Kondisi;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        $jeniss = Jenis::all();
        $kondisis = Kondisi::all();
        return view('barang.index', compact('barangs', 'jeniss', 'kondisis'));
    }

    public function create()
    {
        $jeniss = Jenis::all();
        $kondisis = Kondisi::all();
        return view('barang.create', compact('jeniss', 'kondisis'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'jenis' => 'gt:0',
                'kondisi' => 'gt:0',
                'keterangan' => 'required',
                'jumlah' => 'required|numeric',
                'gambar' => 'required|mimes:jpg,jpeg,png'
            ],
            [
                'jenis.gt' => 'Pilih jenis barang!',
                'kondisi.gt' => 'Pilih kondisi barang!',
                'keterangan.required' => 'Masukkan keterangan barang!',
                'jumlah.required' => 'Masukkan jumlah barang!',
                'jumlah.numeric' => 'Jumlah barang harus numerik!',
                'gambar.required' => 'Masukkan gambar barang!',
                'gambar.mimes' => 'Ekstensi gambar hanya boleh .jpg, .jpeg, atau .png!'
            ]
        );

        $file_gambar = $request->file('gambar');
        if ($file_gambar != NULL) {
            $file_ext = $file_gambar->extension();
            $file_new = date('ymdhis') . "." . $file_ext;
            $file_gambar->storeAs('public/foto-barang', $file_new);

            if ($request->kecacatan != NULL){
                Barang::create([
                    'jenis_id' => $request->jenis,
                    'kondisi_id' => $request->kondisi,
                    'keterangan' => $request->keterangan,
                    'kecacatan' => $request->kecacatan,
                    'jumlah' => $request->jumlah,
                    'gambar' => $file_new
                ]);
            }
            else {
                Barang::create([
                    'jenis_id' => $request->jenis,
                    'kondisi_id' => $request->kondisi,
                    'keterangan' => $request->keterangan,
                    'kecacatan' => NULL,
                    'jumlah' => $request->jumlah,
                    'gambar' => $file_new
                ]);
            }
        }

        return redirect('/barang');
    }

    public function show($id)
    {
        $barangs = Barang::findOrFail($id);
        $jeniss = Jenis::all();
        $kondisis = Kondisi::all();
        return view('barang.show', compact('barangs', 'jeniss', 'kondisis'));
    }

    public function edit($id)
    {
        $barangs = Barang::findOrFail($id);
        $jeniss = Jenis::all();
        $kondisis = Kondisi::all();
        return view('barang.edit', compact('barangs', 'jeniss', 'kondisis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'jenis' => 'gt:0',
                'kondisi' => 'gt:0',
                'keterangan' => 'required',
                'jumlah' => 'required|numeric',
                'gambar' => 'mimes:jpg,jpeg,png'
            ],
            [
                'jenis.gt' => 'Pilih jenis barang!',
                'kondisi.gt' => 'Pilih kondisi barang!',
                'keterangan.required' => 'Masukkan keterangan barang!',
                'jumlah.required' => 'Masukkan jumlah barang!',
                'jumlah.numeric' => 'Jumlah barang harus numerik!',
                'gambar.mimes' => 'Ekstensi gambar hanya boleh .jpg, .jpeg, atau .png!'
            ]
        );

        $file_gambar = $request->file('gambar');
        if ($file_gambar != NULL) {
            $file_ext = $file_gambar->extension();
            $file_new = date('ymdhis') . "." . $file_ext;
            $file_gambar->storeAs('public/foto-barang', $file_new);

            if ($request->kecacatan != NULL){
                Barang::findOrFail($id)->update([
                    'jenis_id' => $request->jenis,
                    'kondisi_id' => $request->kondisi,
                    'keterangan' => $request->keterangan,
                    'kecacatan' => $request->kecacatan,
                    'jumlah' => $request->jumlah,
                    'gambar' => $file_new
                ]);
            }
            else {
                Barang::findOrFail($id)->update([
                    'jenis_id' => $request->jenis,
                    'kondisi_id' => $request->kondisi,
                    'keterangan' => $request->keterangan,
                    'kecacatan' => NULL,
                    'jumlah' => $request->jumlah,
                    'gambar' => $file_new
                ]);
            }
        }
        else {
            if ($request->kecacatan != NULL){
                Barang::findOrFail($id)->update([
                    'jenis_id' => $request->jenis,
                    'kondisi_id' => $request->kondisi,
                    'keterangan' => $request->keterangan,
                    'kecacatan' => $request->kecacatan,
                    'jumlah' => $request->jumlah
                ]);
            }
            else {
                Barang::findOrFail($id)->update([
                    'jenis_id' => $request->jenis,
                    'kondisi_id' => $request->kondisi,
                    'keterangan' => $request->keterangan,
                    'kecacatan' => NULL,
                    'jumlah' => $request->jumlah
                ]);
            }
        }
        
        return redirect('/barang');
    }

    public function destroy($id)
    {
        Barang::findOrFail($id)->delete();
        return redirect('/barang');
    }
}
