@extends('layout.layout')
 @push('script1')
 <link rel="stylesheet" href="public/css/style.css">
 <script src="js/imagen.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script src="js/tiff.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
         const valor=("{{$contador}}");
      if (valor==0)
      {
         Swal.fire({
      title: 'Error!',
      text: 'NO se encontraron Imagenes en la Base de Datos',
      icon: 'error',
      confirmButtonText: 'Cerrar'
      });
      
      }
      else{
         let nombre="imagenes/"+'{{$RCB_}}'+"_1.tiff";
      loadImage(nombre);
      let html='';
      const contenido=document.querySelector('#secuencial');
      html= '<font size="5" color="#3349D1">{{$RCB_}} > Imagen 1 - {{$contador}}</font>';
      contenido.innerHTML=html;  
  

      const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Imagenes Encontradas'
})

      }
    
      
      });
      
   </script>
   <style>
.myDivSec {
font-family: 'Avenir Next LT Pro';
font-weight: bold;
 
color: #2D3E50;

text-align: center;
}
</style>
   <style>
.myDiv {
font-family: 'Avenir Next LT Pro';
font-weight: bold;
border: 5px outset #000000;   
color: #2D3E50;
background-color: #E2E2E2;
text-align: center;
}
</style>
 @endpush
@section('content')
<br><br><br>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button class="btn btn-primary me-md-2" type="button" id='anterior' onclick="anterior('{{$RCB_}}','{{$contador}}') ">Anterior</button>
    <button class="btn btn-dark" type="button" id='siguiente' onclick="siguiente('{{$RCB_}}','{{$contador}}') ">Siguiente</button>
    </div>  
    
   

    <!-- Button trigger modal 
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detalle">
  INFO
</button>-->
    <div id="botones" class="col-md-auto"><br></div>
    

<div id="secuencial" class="col-md-auto" class="myDivSec"></div>
</div>
 
<div id="imagen" text-align="center" class="myDiv" >    
</div>

@stop