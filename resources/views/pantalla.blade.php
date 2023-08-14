@extends('layout.layout')
 @push('script_body')
 <script src="js/UTIF.js"></script>
 <style>

canvas {
        height: 95vw;
        border: 1px solid black;
        margin-top: 5px;
      }


    html,
  /*  body {
      position: relative;
      height: 100%;
    }
*/
    body {
      background: #eee;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color: #000;
      margin: 0;
      padding: 0;
 
    }

    swiper-container {
      width: 100%;
      height: 100%;
    }

    swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }


  </style>

<script src="js/pantalla.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>


<script type="text/javascript">
     $(document).ready(function(){
     //    let valor=("{{$data}}");
        const datos2 = <?php echo json_encode($data); ?>;
        const datosRCB = <?php echo json_encode($data_RCB); ?>;
        const datosRegistro = <?php echo json_encode($data_Registros); ?>;
        datos(datos2,datosRCB,datosRegistro);
        inicio_swip();
      // console.log(val);
       
      });
</script>


 @endpush
@section('imagen')
<div class="container">
  <br><br><br> 
<h5>LIBRO ASIGNADO</h5>
<div class="row">
    <div class="col-lg-3" id="descripcion">


    <div class="card border-secondary  mb-3" style="max-width: 18rem;">
      <div class="card-header">DATOS RCB</div>
      <div class="card-body text-secondary ">
    
          
   <div class="row g-2">
          <div class="col-md">
              <div class="form-floating">
              <input type="text" readonly class="form-control-plaintext" id="RCB_Id" placeholder="name@example.com" value="RCB125621">
              <label for="floatingPlaintextInput">RCB:</label>
              </div>
          </div>
          <div class="col-md">
            <div class="form-floating">
            <input type="text" readonly class="form-control-plaintext" id="Categoria_Id" placeholder="name@example.com" value="Nacimiento">
                <label for="floatingPlaintextInput">Categoria:</label>
            </div>
          </div>
    </div>
    <div class="row g-2">
  <div class="col-md">
    <div class="form-floating">
    <input type="text" readonly class="form-control-plaintext" id="Oficialia_Id" placeholder="name@example.com" value="OFI2364">
  <label for="floatingPlaintextInput">Oficialia:</label>
    </div>
    </div>
  <div class="col-md">
    <div class="form-floating">
    <input type="text" readonly class="form-control-plaintext" id="Libro_Id" placeholder="name@example.com" value="15-97">
  <label for="floatingPlaintextInput">Libro:</label>
    </div>
  </div>
</div>


  
  </div>
</div>


<div class="card border-primary mb-3" style="max-width: 18rem;">
  <div class="card-header">Datos de la Partida</div>
  <div class="card-body text-primary">
  <div class="container" id="registro"> </div>
  </div>
</div>


 <div class="card border-secondary  mb-3" style="max-width: 18rem;">
  <div class="card-header">Partidas Transcritas</div>
  <div class="card-body">
  <div class="container" id="btnpartidas"> 
  </div>
</div>
</div>


     
    </div>
    <div class="col-lg-9" id="div_imagen">
    <swiper-container class="mySwiper" init="false" keyboard="true" navigation="true" id="swiper2">
    </swiper-container>
    </div>
  </div>




@endsection
