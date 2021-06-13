<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use DB;
use App\Models\Pengarang;
use Illuminate\Support\Facades\Redirect;

class PengarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_pengarang = DB::table('pengarang')
            ->get();

        return view('pengarang.index', compact('ar_pengarang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengarang.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!empty($request->foto)) {
            $request->validate(
                ['foto' => 'image|mimes:png,jpg|max:2048']
            );
            $fileName = $request->nama . '.' . $request->foto->extension();
            $request->foto->move(public_path('img'), $fileName);
        } else {
            $fileName = '';
        }

        DB::table('pengarang')->insert(
            [
                'nama' => $request->nama,
                'email' => $request->email,
                'hp' => $request->hp,
                'foto' => $fileName,
            ]
        );

        return redirect('/pengarang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ar_pengarang = DB::table('pengarang')->where('pengarang.id', $id)->get();

        return view('pengarang.show', compact('ar_pengarang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('pengarang')->where('id', $id)->get();

        return view('pengarang.form_edit', compact('data'));
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
        DB::table('pengarang')->where('id', $id)->update(
            [
                'nama' => $request->nama,
                'email' => $request->email,
                'hp' => $request->hp,
                'foto' => $request->foto,
            ]
        );

        return redirect('/pengarang' . '/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('pengarang')->where('id', $id)->delete();

        return redirect('/pengarang');
    }
}