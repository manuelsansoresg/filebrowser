<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'user_id'
    ];

    public static function searchByYear($year)
    {
        $dir = "./facturas";
        $cont = 0;
        $files = array(); //*arreglo que contendran los resultados de la busqueda segun año
        if (is_dir($dir)) {
            // Recorremos Directorio
            $d = opendir($dir);
            while ($archivo = readdir($d)) {
                $cont = $cont + 1;
                
                if ($archivo != "." and $archivo != "..") {
                    if (is_dir($dir . '/' . $archivo)) { //* es directorio
                        if ($archivo == $year) {
                            $files = array_diff(scandir($dir. '/' . $archivo), array('.', '..'));
                            print_r($files);
                        }
                    }
                }
            }
        }
        return false;
    }
}
