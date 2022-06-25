<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ZipArchive;

class EmailsFiles extends Model
{
    use HasFactory;
    protected $fillable = [
        'email_id', 'path', 'file'
    ];

    public static function createZip($email_id)
    {
        $files = EmailsFiles::where('email_id', $email_id)->get();
        // Creamos un instancia de la clase ZipArchive
        $zip = new ZipArchive();
        // Creamos y abrimos un archivo zip temporal
        $zip->open("facturas.zip", ZipArchive::CREATE);
        // Añadimos un directorio
        $dir = 'facturas';
        $zip->addEmptyDir($dir);
        // Añadimos un archivo en la raid del zip.
        foreach ($files as $file) {
            $file_name = 'facturas/'.$file->path.'/'.$file->file;
            $zip->addFile($file_name);
        }
        // Una vez añadido los archivos deseados cerramos el zip.
        $zip->close();
        // Creamos las cabezeras que forzaran la descarga del archivo como archivo zip.
        header("Content-type: application/octet-stream");
        header("Content-disposition: attachment; filename=facturas.zip");
        // leemos el archivo creado
        readfile('facturas.zip');
        // Por último eliminamos el archivo temporal creado
        unlink('facturas.zip'); //Destruye el archivo temporal
    }
}
