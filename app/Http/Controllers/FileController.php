<?php

namespace App\Http\Controllers;

use App\Models\Year;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $years = Year::all();
        $search_file = null;
        $query = null;
        if ($_GET) {
            $year_file = $request->year;
            $query = Year::searchByYear($year_file);
        }
        return view('file', compact('years', 'query'));
    }

    public function searchFile(Request $request)
    {
        $year_file = $request->year_file;
        $search_file = Year::searchByYear($year_file);
        return response()->json($search_file);
    }

    public function exporFiles(Request $request)
    {
        $year_file = $request->year;
        Year::createZip($year_file);
    }

    public function exporSelectFiles(Request $request)
    {
        $name_file = $request->name_file;
        $year_file = $request->name_year;

        Year::createZipFilesSelect($name_file, $year_file);
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
    public function update(Request $request, $id)
    {
        //
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
