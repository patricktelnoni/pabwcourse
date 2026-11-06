<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    //
    public function index()
    {
        // 1. eloquent
        $produks = Produk::orderBy('id', 'desc')->get(); // SELECT * FROM Produks;
        // 2. Raw Query
        // $produks = DB::select("SELECT * FROM Produks ORDER by id DESC");

        return view('barang.index', compact('produks'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function edit($id){
        // SELECT * FROM produks where id = $id;
        $detailBarang = Produk::findOrFail($id);
        return view('barang.edit', compact('detailBarang'));
    }

    public function trash($id){
        $produk = Produk::findOrFail($id);  
        $produk->delete();
    }

    public function show($id)
    {

        //$detailBarang = DB::select("SELECT * FROM produks WHERE id = ".$id."")[0];
        $detailBarang = Produk::findOrFail($id);
        return view('barang.detail', compact('detailBarang'));
    }

    public function update(Produk $produk){
        Produk::where('id',$id)->update(['nama_produk'=>'Updated title', 'deskripsi'=> '', 'harga'=>'', 'stok' => '']);
        return redirect('produks')->with(['success' => 'Data berhasil ditambah']);
    }

    public function store(Request $request)
    {
        /*DB::insert("INSERT INTO produks(nama_produk, deskripsi,harga, stok)
                    VALUES('".$request->nama_produk."',
                            '".$request->deskripsi."',
                            ".$request->harga.",
                            ".$request->stok.")");*/
         
        // rule
        
        $validator = Validator::make($request->all(),
            [
                'nama_produk'   => 'required|string|min:3',
                'deskripsi'     => 'required|string|min:10',
                'harga'         => 'required|numeric',
                'stok'          => 'required|numeric',
            ]);
        // Jika gagal validasi
        if ($validator->fails()) {
            return redirect('/produks/create')
                ->withErrors($validator)
                ->withInput();
        }
        // jika validasi input berhasil
        else{
            $validated = $validator->validated();

            Produk::create($validated);

            return redirect('produks')->with(['success' => 'Data berhasil ditambah']);
        }
    }
}
