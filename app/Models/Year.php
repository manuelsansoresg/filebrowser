<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ZipArchive;

class Year extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'user_id'
    ];

    public static function searchByYear($year)
    {
        $dir = "./facturas";
        $path = "/facturas";
        $cont = 0;
        $files = array(); //*arreglo que contendran los resultados de la busqueda segun año
        if (is_dir($dir)) {
            // Recorremos Directorio
            $d = opendir($dir);
            while ($folder = readdir($d)) {
                $cont = $cont + 1;

                if ($folder != "." and $folder != "..") {
                    if (is_dir($dir . '/' . $folder)) { //* es directorio
                        if ($year != '') { //* filtrar por año
                            if ($folder == $year) {
                                $get_files = array_diff(scandir($dir . '/' . $folder), array('.', '..'));
                                foreach ($get_files as $file) {
                                    $files[] = array('file' => $path . '/' . $year . '/' . $file, 'name' => $file, 'anio' => $year);
                                }
                            }
                        } else {
                            $get_files = array_diff(scandir($dir . '/' . $folder), array('.', '..'));
                            foreach ($get_files as $file) {
                                $files[] = array('file' => $path . '/' . $folder . '/' . $file, 'name' => $file, 'anio' => $folder);
                            }
                        }
                    }
                }
            }
        }
        return $files;
    }

    public static function createZip($year)
    {
        $files = self::searchByYear($year);
        // Creamos un instancia de la clase ZipArchive
        $zip = new ZipArchive();
        // Creamos y abrimos un archivo zip temporal
        $zip->open("facturas.zip", ZipArchive::CREATE);
        // Añadimos un directorio
        $dir = 'facturas';
        $zip->addEmptyDir($dir);
        // Añadimos un archivo en la raid del zip.
        foreach ($files as $file) {
            $file_name = 'facturas/'.$file['anio'].'/'.$file['name'];
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

    public static function createZipFilesSelect($files, $years)
    {
        // Creamos un instancia de la clase ZipArchive
        $zip = new ZipArchive();
        // Creamos y abrimos un archivo zip temporal
        $zip->open("facturas.zip", ZipArchive::CREATE);
        // Añadimos un directorio
        $dir = 'facturas';
        $zip->addEmptyDir($dir);
        // Añadimos un archivo en la raid del zip.
        for ($i=0; $i < count($files); $i++) {
            $file_name = 'facturas/'.$years[$i].'/'.$files[$i];
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
