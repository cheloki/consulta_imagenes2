<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Digitalizada61 extends Model
{
    protected $connection = 'sqlsrv';
    public static function buscar_RCB_1($depto,$oficialia,$libro,$categoria)
    {
        return DB::connection('sqlsrv')->select("EXEC IMAGENES_61 ?,?,?,?",array ($depto,$oficialia,$libro,$categoria));
    }
    public static function buscar_RCB_2($depto,$rcb)
    {
        return DB::connection('sqlsrv')->select("EXEC IMAGENES_61_2 ?,?",array ($depto,$rcb)); 
    }
    public static function buscar($depto,$image)
  {
    return DB::connection('sqlsrv')->select("EXEC IMAGENES_61_B ?,?",array ($depto,$image)); 
  }

  public static function buscar_E($depto,$image)
  {
  return DB::connection('sqlsrv')->select("EXEC IMAGENES_61_E ?,?",array ($depto,$image)); 
  }
  public static function buscar_una()
  {
    return DB::connection('sqlsrv')->select("select TOP 1 * FROM [IKonSAPBeni].[dbo].[Image]"); 
  }
  public static function imagen_id($id)
  {
    return DB::connection('sqlsrv')->select("select B.BatchCode,I.ImageData,I.BatchId,I.ImageId from [IKonSAP2].[dbo].[Batch] B
    inner join [IKonSAP2].[dbo].[Image] I on I.BatchId=B.BatchId
    where I.ImageId=?", [$id]); 
  }
  public static function imagen_excepciones_id($id)
  {
    return DB::connection('sqlsrv')->select("select B.BatchCode,I.ImageData,I.BatchId,I.ImageId from [IKonSAP2].[dbo].[Batch] B
    inner join [IKonSAPExceptions].[dbo].[ExceptionImage] I on I.BatchId=B.BatchId
    where I.ImageId=?", [$id]); 
  }
  public static function listar_imagen($rcb,$depto,$oficialia,$libro,$partida,$categoria,$opcion)
  {
    return DB::connection('sqlsrv')->select("SET NOCOUNT ON; EXEC SP_LISTAR_IMAGEN_MODULO ?,?,?,?,?,?,?",array($rcb,$depto,$oficialia,$libro,$partida,$categoria,$opcion)); 
 //   return DB::connection('sqlsrv')->select('CALL SP_LISTAR_IMAGEN (?,?,?,?,?,?,?)', array($rcb,$depto,$oficialia,$libro,$partida,$categoria,$opcion)); 
  }
  public static function mostrar_imagen($depto,$nro,$batchid)
  {
    return DB::connection('sqlsrv')->select("SET NOCOUNT ON; EXEC MOSTRAR_IMAGEN ?,?,?",array($depto,$nro,$batchid)); 
 //   return DB::connection('sqlsrv')->select('CALL SP_LISTAR_IMAGEN (?,?,?,?,?,?,?)', array($rcb,$depto,$oficialia,$libro,$partida,$categoria,$opcion)); 
  }
  public static function datos_RCB($depto,$rcb)
  {
    return DB::connection('sqlsrv')->select(" EXEC SP_DatosRCB ?,?",array($depto,$rcb)); 
 //   return DB::connection('sqlsrv')->select('CALL SP_LISTAR_IMAGEN (?,?,?,?,?,?,?)', array($rcb,$depto,$oficialia,$libro,$partida,$categoria,$opcion)); 
  }
  public static function ACTUALIZAR_ESTADO_IMAGEN($depto,$batchid,$order)
  {
    return DB::connection('sqlsrv')->select(" EXEC SP_ACTUALIZAR_ESTADO_IMAGEN ?,?,?",array($depto,$batchid,$order)); 
 //   return DB::connection('sqlsrv')->select('CALL SP_LISTAR_IMAGEN (?,?,?,?,?,?,?)', array($rcb,$depto,$oficialia,$libro,$partida,$categoria,$opcion)); 
  }
}
