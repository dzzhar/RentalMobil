<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merk;

class MerkController extends Controller
{
    function index()
    {
        $merkData = Merk::get();
        return view('pages.merk.index', ['merkData' => $merkData]);
    }

    function create()
    {
        return view('pages.merk.create');
    }

    function store(Request $request)
    {
        $merkData = new Merk;
        $merkData->merk = $request->merk;
        $merkData->save();

        return redirect()->to('/merk')->with('Success', 'Data Merk sukses disimpan');
    }

    function edit($id)
    {
        $merkData = Merk::find($id); //SELECT * FROM merks WHERE id = $id
        return view('pages.merk.edit', ['merkData' => $merkData]);
    }

    function update($id, Request $request)
    {
        $merkData = Merk::find($id);
        $merkData->merk = $request->merk; //$request sama seperti $_POST
        $merkData->save();

        return redirect()->to('/merk')->with('Success', 'Data Merk berhasil di-update'); //Mengalihkan halaman setelah berhasil disimpan
    }

    function delete($id)
    {
        $merkData = Merk::find($id);
        $merkData->delete(); //Data akan dihapus

        return redirect()->to('/merk')->with('Success', 'Data Merk berhasil dihapus');
    }
}