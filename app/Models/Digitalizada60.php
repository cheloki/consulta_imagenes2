<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Digitalizada60 extends Model
{
     //
    
   // protected $table = 'Image';
   protected $connection2 = 'sqlsrv2';
   // protected $table2 = 'ExceptionImage';

   

 public static function buscar_L($depto,$oficialia,$libro,$categoria)
    {
        return DB::connection('sqlsrv2')->select("EXEC IMAGENES_60_L ?,?,?,?",array ($depto,$oficialia,$libro,$categoria));
    }

    public static function buscar_L_RCB($depto,$rcb)
    {
        return DB::connection('sqlsrv2')->select("EXEC IMAGENES_60_L_RCB ?,?",array ($depto,$rcb));
    }
    public static function detalle_L($depto,$oficialia,$libro,$categoria)
    {
        return DB::connection('sqlsrv2')->select("EXEC detalle_60_L ?,?,?,?",array ($depto,$oficialia,$libro,$categoria));
    }
}
