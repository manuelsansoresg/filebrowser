<?php

namespace App\Http\Controllers;

use App\Mail\EmailSendFiles;
use App\Models\EmailsFiles;
use App\Models\SendEmail;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use View;

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

    public function sendSelectFiles(Request $request)
    {
        $name_file    = $request->name_file;
        $year_file    = $request->name_year;
        $to        = $request->email;

        //*guardado para poder descargar todos los archivos en zip
        $send_email = new SendEmail(['user_id' => Auth::user()->id, 'correo' => $to]);
        $send_email->save();

        for ($i=0; $i < count($name_file); $i++) { 
            $data_files = array(
                'email_id' => $send_email->id,
                'path' => $year_file[$i],
                'file' => $name_file[$i]
            );
            $save_files = new EmailsFiles($data_files);
            $save_files->save();
        }

        $path = "facturas";
        $data_email = ['from' => 'contacto@xpertsystems.com.mx', 'subject' => 'Envio de archivos',
        'path' => $path, 'email_id' => $send_email->id,
        'name_file' => $name_file, 'year_file' => $year_file, 'cc' => ''];
        Mail::to($to)->send(new EmailSendFiles($data_email));
    }

    public function downloadSelect($email_id)
    {
        $email = SendEmail::find($email_id);
        if ($email != null) {
            EmailsFiles::createZip($email->id);
        }
        return redirect('home');
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
