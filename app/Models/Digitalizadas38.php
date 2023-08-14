<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Digitalizadas38 extends Model
{
    //use HasFactory;
    protected $connection = 'sqlsrv3';
    public static function Listar_Registros($oficialia,$libro,$categoria)
    {
        return DB::connection('sqlsrv3')->select("SET NOCOUNT ON; EXEC SP_ListaPartidas ?,?,?",array ($categoria,$oficialia,$libro));
    }
}
