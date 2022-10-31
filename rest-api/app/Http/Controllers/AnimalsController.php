<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AnimalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $animal;
    public function __construct()
    {
        $this->animal = ['Ayam', 'Ikan', 'Kambing', 'Kelinci', 'Kucing'];
    }


    public function index()
    {

        $hewan = $this->animal;
        $response = [
            'message' => 'Menampilkan Data Animal',
            'data' => $hewan,
        ];

        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->animal[] = $request->nama;

        $hewan = $this->animal;
        $response = [
            'message' => 'Data Hewan Berhasil Di Tambahkan',
            'data' => $hewan,
        ];

        return response()->json($response);
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
        $this->animal[$id] = $request->nama;

        $hewan = $this->animal;
        return response()->json([
            "success" => true,
            "message" => "Data Hewan Berhasil Di Update",
            "data" => $hewan,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        unset($this->animal[$id]);

        $hewan = $this->animal;

        return response()->json([
            "success" => true,
            "message" => "Data Hewan Telah Di Hapus",
            "data" => $hewan,
        ]);

    }



}
