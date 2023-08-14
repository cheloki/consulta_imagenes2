<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Digitalizada extends Model
{
 //   use HasFactory;
 /*
 protected $connection = 'sqlsrv';
 public static function buscar_una($RCB)
  {
    return DB::connection('sqlsrv')->select("select I.ImageId,I.Data,I.BatchId from [IkonCapture].[dbo].[Batch] B
    inner join [IkonCapture].[dbo].[BatchImage] I
    on I.BatchId=B.BatchId
    where B.BarCode=?", [$RCB]); 
  }
  public static function buscar_cabecera($oficialia,$libro,$categoria)
  {
    return DB::connection('sqlsrv')->select("  select I.ImageId,I.Data,I.BatchId from [IkonCapture].[dbo].[Batch] B
    inner join [IkonCapture].[dbo].[BatchImage] I
    on I.BatchId=B.BatchId
	where B.[Metadata].value('(/Document/RegistryOffice[1]/text())[1]', 'varchar(50)') =? and B.[Metadata].value('(/Document/OldCode[1]/text())[1]', 'varchar(50)') =?
	and B.[Metadata].value('(/Document/RecordType[1]/text())[1]', 'varchar(50)') =?", [$oficialia,$libro,$categoria]); 
  }
  */
}
