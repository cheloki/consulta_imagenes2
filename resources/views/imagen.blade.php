@extends('layout.layout')
@push('script1')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">


@endpush
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

<script src="js/RCB.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>


<script type="text/javascript">
     $(document).ready(function(){
      const datos2 = <?php echo json_encode($data); ?>;
        const datosRCB = <?php echo json_encode($data_RCB); ?>;
        datos(datos2,datosRCB);
        inicio_swip();
       
      });
</script>


 @endpush
@section('imagen')
<div class="container">
  <br><br><br> 
<h5></h5>
<div class="row">
    <div class="row-lg-12" id="descripcion">
      <div class="container" id="TablaId"></div>
    </div>
    <div class="row-lg-12" id="div_imagen">
        <swiper-container class="mySwiper" init="false" keyboard="true" navigation="true" id="swiper2">
        </swiper-container>
    </div>
  </div>




@endsection
