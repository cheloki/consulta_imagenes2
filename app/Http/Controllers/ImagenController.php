<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Digitalizada61;
use App\Models\Digitalizada60;
use App\Models\Digitalizadas38;

use Illuminate\Support\Facades\DB;
use SoapClient;

class ImagenController extends Controller
{
    //
    public function index()
    {
      return view('pantalla');
    }

    public function mostrar(Request $request)
    {
      $RCB_=$request->input('RCB');
      $contador=1;
      $id=[];
      $img=[];
      $batchid=[];
      $dato_nombre=[];
   //     echo $request->RCB;
        $data_RCB = Digitalizada::buscar_una($request->RCB);
        if ($data_RCB<>[]) 
        { 
                    foreach ($data_RCB as $datos)
                    {
                          $id[]=$datos->ImageId;
                          $img[]=$datos->Data;
                          $batchid[]=$datos->BatchId;   
                    }
                                for($i = 0; $i < sizeof($id);$i++)
                                { 
                                            $dato_nombre[$i]= $RCB_.'_'.$contador;  
                                            $decoded=base64_encode($img[$i]); 
                                            $Base64Img = base64_decode($decoded);
                                            $nombre="imagenes/".$dato_nombre[$i].".tiff";
                                            file_put_contents($nombre, $Base64Img);  
                                            $contador=$contador+1;
                                }
        }
        $contador=$contador-1;
      return view('inicio',compact('RCB_','contador'));
    }



    public function mostrar_oficialia(Request $request)
    {
      $RCB_=$request->input('RCB');
      $contador=1;
      $id=[];
      $img=[];
      $batchid=[];
      $dato_nombre=[];
      $oficialia=$request->input('oficialia');
      $libro=$request->input('libro');
      $categoria=$request->input('categoria');
      $data_RCB = Digitalizada::buscar_cabecera($oficialia,$libro,$categoria);
      if ($data_RCB<>[]) 
      { 
                  foreach ($data_RCB as $datos)
                  {
                        $id[]=$datos->ImageId;
                        $img[]=$datos->Data;
                        $batchid[]=$datos->BatchId;   
                  }
                              for($i = 0; $i < sizeof($id);$i++)
                              { 
                                          $dato_nombre[$i]= $RCB_.'_'.$contador;  
                                          $decoded=base64_encode($img[$i]); 
                                          $Base64Img = base64_decode($decoded);
                                          $nombre="imagenes/".$dato_nombre[$i].".tiff";
                                          file_put_contents($nombre, $Base64Img);  
                                          $contador=$contador+1;
                              }
      }
      $contador=$contador-1;
      return view('inicio',compact('RCB_','contador'));
    }




    public function mostrar_depto_RCB(Request $request)
    {
      $RCB=[];
      $id=[];
      $img=[];
      $batchid=[];
      $dato_nombre=[];
      $id_E=[];
      $img_E=[];
      $batchid_E=[];
      $dato_nombre_E=[];
      $dato_nombre_L=[];
      $depto_L=[];
      $RCB_L=[];
      $Oficilia_L=[];
      $Libro_L=[];
      $Categoria_L=[];
      $Partida_L=[];
      $Fecha_Ins_L=[];
      $detalle_L=[];
      $contador=1;
      $Depto=$request->input('departamento');
      $Oficilia=$request->input('oficialia');
      $Libro=$request->input('libro');
      $Categoria=$request->input('categoria');
      $RCB_=$request->input('RCB');
      if($RCB_<>'')
      {
        $data_RCB = Digitalizada61::buscar_RCB_2($Depto,$RCB_);
        foreach ($data_RCB as $datos)
        {
              $RCB[]=$datos->BatchId;
        }
        $data3 = Digitalizada60::buscar_L_RCB($Depto,$RCB_);
        if ($data3<>[])
        {
                              foreach ($data3 as $datos3)
                              {
                                  $RCB_L[]=$datos3->CodigoRCB;
                                  $depto_L[]=$datos3->IdDepartamento;
                                  $Oficilia_L[]=$datos3->Oficialia;
                                  $Libro_L[]=$datos3->CodigoLibro;
                                  $Categoria_L[]=$datos3->IdTipoPartida;
                                  $Partida_L[]=$datos3->NroPartidaRegistro;
                                  $Fecha_Ins_L[]=$datos3->Fecha;
                              }
                              for($i = 0; $i < sizeof($depto_L);$i++)
                              {
                                $this->imagen_60($depto_L[$i],$Oficilia_L[$i],$Libro_L[$i],$Categoria_L[$i],$Partida_L[$i],$Fecha_Ins_L[$i], $RCB_L[$i],$contador);
                                $contador=$contador+1;     
                                $RCB_=$RCB_L[$i];
                              }      
        }
        else
        { 
          $Cod_depto = 1;
            while ($Cod_depto <= 9) 
            {
                  $data3 = Digitalizada60::buscar_L_RCB($Cod_depto,$RCB_);
                  if ($data3<>[])
                  {
                        foreach ($data3 as $datos3)
                        {
                            $RCB_L[]=$datos3->CodigoRCB;
                            $depto_L[]=$datos3->IdDepartamento;
                            $Oficilia_L[]=$datos3->Oficialia;
                            $Libro_L[]=$datos3->CodigoLibro;
                            $Categoria_L[]=$datos3->IdTipoPartida;
                            $Partida_L[]=$datos3->NroPartidaRegistro;
                            $Fecha_Ins_L[]=$datos3->Fecha;
                        }
                        for($i = 0; $i < sizeof($depto_L);$i++)
                        {
                          $this->imagen_60($Cod_depto,$Oficilia_L[$i],$Libro_L[$i],$Categoria_L[$i],$Partida_L[$i],$Fecha_Ins_L[$i], $RCB_L[$i],$contador);
                          $contador=$contador+1;     
                          $RCB_=$RCB_L[$i];
                        }
                        $Cod_depto=10;
                  }
                  $Cod_depto=$Cod_depto+1;
            }
        }
      }
      else
      {
        $data_RCB = Digitalizada61::buscar_RCB_1($Depto,$Oficilia,$Libro, $Categoria);
        foreach ($data_RCB as $datos)
        {
              $RCB[]=$datos->BatchId;
        }
                              switch ($Categoria) {
                                case "1":
                                    $Tipo_Categoria=1;
                                    break;
                                case "2":
                                    $Tipo_Categoria=2;
                                    break;
                                case "3":
                                    $Tipo_Categoria=3;
                                    break;
                              }
                              $data3 = Digitalizada60::buscar_L($Depto,$Oficilia,$Libro,$Tipo_Categoria);
                              $detalle_L = Digitalizada60::detalle_L($Depto,$Oficilia,$Libro,$Tipo_Categoria);
                              if ($data3<>[])
                              {
                              foreach ($data3 as $datos3)
                              {
                                  $RCB_L[]=$datos3->CodigoRCB;
                                  $depto_L[]=$datos3->IdDepartamento;
                                  $Oficilia_L[]=$datos3->Oficialia;
                                  $Libro_L[]=$datos3->CodigoLibro;
                                  $Categoria_L[]=$datos3->IdTipoPartida;
                                  $Partida_L[]=$datos3->NroPartidaRegistro;
                                  $Fecha_Ins_L[]=$datos3->Fecha;
                              }
                                        for($i = 0; $i < sizeof($depto_L);$i++)
                                        {
                                          $this->imagen_60($depto_L[$i],$Oficilia_L[$i],$Libro_L[$i],$Categoria_L[$i],$Partida_L[$i],$Fecha_Ins_L[$i], $RCB_L[$i],$contador);
                                          $contador=$contador+1;     
                                          $RCB_=$RCB_L[$i];
                                        }
                                        
                              }
      }

      for($k = 0; $k < sizeof($RCB);$k++)
      {
        $data = Digitalizada61::buscar($Depto,$RCB[$k]);
        if ($data<>[]) 
        { 
                    foreach ($data as $datos)
                    {
                          $id[]=$datos->ImageId;
                          $img[]=$datos->ImageData;
                          $batchid[]=$datos->BatchId;   
                    }
                                for($i = 0; $i < sizeof($id);$i++)
                                { 
                                            $dato_nombre[$i]= $RCB_.'_'.$contador;  
                                            $decoded=base64_encode($img[$i]); 
                                            $Base64Img = base64_decode($decoded);
                                            $nombre="imagenes/".$dato_nombre[$i].".tiff";
                                            file_put_contents($nombre, $Base64Img);  
                                            $contador=$contador+1;
                                }
        }
        else
        {
                    $data2 = Digitalizada61::buscar_E($Depto,$RCB[$k]);
                            foreach ($data2 as $datos2)
                            {
                                  $id_E[]=$datos2->ImageId;
                                  $img_E[]=$datos2->ImageData;
                                  $batchid_E[]=$datos2->BatchId;
                            }
                                for($i = 0; $i < sizeof($img_E);$i++)
                                {
                                            $dato_nombre_E[$i]= $RCB_.'_'.$contador;                          
                                            $decoded=base64_encode($img_E[$i]); 
                                            $Base64Img = base64_decode($decoded);
                                            $nombre="imagenes/".$dato_nombre_E[$i].".tiff";
                                            file_put_contents($nombre, $Base64Img);  
                                            $contador=$contador+1;
                                }         
        }
      }

      $contador=$contador-1;
      if($contador==0)
      {
        return view('mensaje')->with('flash',"NO SE ENCONTRARON IMAGENES CON LOS DATOS PROPORCIONADOS, REALICE UNA NUEVA BUSQUEDA");
      }
      else
      {
        $data = [
          'success'=>true,
          'datos' => 
              array('RCB'=>$RCB_, 'contador'=>$contador)
 
     
      ];    
     
      return view('inicio',compact('RCB_','contador'));
      }

    }

    function imagen_60($depto,$oficialia,$libro,$categoria,$partida,$fecha_ins,$rcb,$contador)
    {
      $opts = array(
        'http' => array(
            'user_agent' => 'PHPSoapClient'
        )
    );
    $context = stream_context_create($opts);

    $wsdlUrl = 'http://10.100.15.88:3030/wsPartidaD.asmx?WSDL';

    $soapClientOptions = array(
        'stream_context' => $context,
        'cache_wsdl' => WSDL_CACHE_NONE
    );
    $client = new SoapClient($wsdlUrl,$soapClientOptions);
    $parametros = array(
        'depto' =>$depto,
        'pIdTipoPartida' => $categoria,
        'pCodigoLibro' =>$libro,
        'pNroPartidaRegistro' =>  $partida,
        'pOficialia' =>  $oficialia,
        'FechaInscripcion' => $fecha_ins
    );
    $resultado = $client->mostrarImagen($parametros);
    $muestra=$resultado->mostrarImagenResult;
    $decoded=base64_encode($muestra); 
    $Base64Img = base64_decode($decoded);
    $nombre="imagenes/".$rcb."_".$contador.".tiff";
    file_put_contents($nombre, $Base64Img);  
    }


    public function listar(Request $request)
    {
    $RCB_=$request->input('RCB_pantalla');
		$Depto=$request->input('depto_pantalla');
		$oficialia= "A";
		$libro= "A";
		$partida = 1;
		$categoria = 1;
		$opcion = 1;
    $data=Digitalizada61::listar_imagen($RCB_,$Depto,$oficialia,$libro,$partida,$categoria,$opcion);
    $data2=[];
    $data3=[];

    $data_RCB=Digitalizada61::datos_RCB($Depto,$RCB_);
    foreach($data_RCB as $dato)
        {
            $oficialia=$dato->Oficialia;
            $libro=$dato->Libro;
            $categoria= $dato->Categoria;
        }
    $data_Registros=Digitalizadas38::Listar_Registros($oficialia,$libro,$categoria);
    foreach($data as $dato)
        {
          $data2 = array(
            "Depto"=> $dato->Depto,
            "RCB"=> $RCB_,
            "BatchID"=> $dato->BatchId,
            "ImageOrder"=> $dato->NroPartidaRegistro,
            "Tipo"=> $dato->Tipo
          );
          array_push($data3,$data2 );
        }
       
    $data=json_encode($data3);
    $data_RCB=json_encode($data_RCB);
    $data_Registros=json_encode($data_Registros);
return view('pantalla',compact('data','data_RCB','data_Registros'));


//return response()->json($data);

    }

    public function mostrar_base64($depto,$RCB,$nro,$batchid)
    {
      $registro='';
    
      $data=Digitalizada61::mostrar_imagen($depto,$nro,$batchid);
    
      $cantidad=count($data);
  
      if ($cantidad>=1)
      {
        $columnas= array_column($data,'img');
     
        if ($columnas==[])
        {
        
          foreach($data as $dato)
          {
              $Depto=$dato->IdDepto;
              $TipoPartida=$dato->TipoPartida;
              $NroPartida= $dato->NroPartida;
              $Libro=$dato->Libro;
              $Oficialia=$dato->Oficialia;
              $FechaIns= $dato->FechaIns;
          }
          echo $Libro;
          $this->imagen_60($Depto,$Oficialia,$Libro,$TipoPartida,$NroPartida,$FechaIns, $RCB,($nro));
          return json_encode($nro);
        }
        else
        {
          foreach($data as $dato)
          {
            $registro = $dato->img;
          } 
                  $decoded=base64_encode($registro); 
                  $Base64Img = base64_decode($decoded);
                  $nombre="imagenes/".$RCB."_".$nro.".tiff";
                  file_put_contents($nombre, $Base64Img);  
                  return json_encode($nombre);
         
        }
      }
      else
      {
        $nombre='vacio';
        return json_encode($nombre);
      }
      

    }
    public function registros($oficialia,$libro,$categoria)
    {
      $data=Digitalizadas38::Listar_Registros($oficialia,$libro,$categoria);
      return json_encode($data);
    }
     




public function visualizarRCB(Request $request)
    {
    $RCB_=$request->input('RCB');
		$Depto=$request->input('departamento');
		$oficialia= $request->input('oficialia');
		$libro= $request->input('libro');
		$partida = 1;
		$categoria = $request->input('categoria');
		$opcion = 1;

if (is_null($RCB_) )
{
  $opcion = 2;
}

  $data=Digitalizada61::listar_imagen($RCB_,$Depto,$oficialia,$libro,$partida,$categoria,$opcion);
  $data2=[];
  $data3=[];

 
      foreach($data as $dato)
      {
        $data2 = array(
          "Depto"=> $dato->Depto,
          "RCB"=> $dato->RCB,
          "BatchID"=> $dato->BatchId,
          "ImageOrder"=> $dato->NroPartidaRegistro,
          "Tipo"=> $dato->Tipo
        );
        array_push($data3,$data2 );
        $RCB_=$dato->RCB;
      }
      $data_RCB=Digitalizada61::datos_RCB($Depto,$RCB_);
  foreach($data_RCB as $dato)
      {
          $oficialia=$dato->Oficialia;
          $libro=$dato->Libro;
          $categoria= $dato->Categoria;
      }
     
  $data=json_encode($data3);
  $data_RCB=json_encode($data_RCB);
//return view('imagen',compact('data','data_RCB'));
return view('welcome',compact('data','data_RCB'));

//return response()->json($data);
//return response()->json($RCB_);


    }

    public function imagen_excepcion($depto,$RCB,$nro,$batchid)
    {
      $data_excep=Digitalizada61::ACTUALIZAR_ESTADO_IMAGEN($depto,$batchid,$nro);
      
      //echo $depto,$RCB,$nro,$batchid;
    // $data=json_encode($data_excep);
      return response()->json($data_excep);
    }

  }