@extends('layout.layout')
@push('script1')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style>
        html, body {
  position: relative;
  height: 100%;
}
body {
  font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
  font-size: 14px;
  color:#000;
  margin: 0;
  padding: 0;
}
.swiper-container {
  width: 100%;
  height: 100%;
}
.swiper-slide {
  text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
/* custmm bullets style */
.swiper-pagination-bullet {
  width: 25px;
  height: 25px;
  text-align: center;
  line-height: 25px;
  font-size: 15px;
  color:#000;
  opacity: 1;
  background: rgba(0,0,0,0.2);
}
.swiper-pagination-bullet-active {
  width: 35px;
  height: 35px;
  font-size: 20px;
  line-height: 35px;
  font-weight: bold;
  color:#2045A7;
  background: #007aff;
}
.text-bg-primary0{
  font-size: 12px;
  color:#2045A7;
  background: #8FE87F;
}
.text-bg-primary2{
  font-size: 12px;
  color:#2045A7;
  background: #E78377;
}
.text-bg-primary3{
  font-size: 12px;
  color:#2045A7;
  background: #EDF776;
}
    </style>
@endpush
@push('script_body')
<script src="js/RCB2.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<!-- Initialize Swiper -->
  <script type="text/javascript">
     $(document).ready(function(){
        const datos2 = <?php echo json_encode($data); ?>;
        const datosRCB = <?php echo json_encode($data_RCB); ?>;
        datos(datos2,datosRCB);
        inicio_swip();
        mostrar();
      });
</script>
@endpush
@section('imagen')
<div class="container">
<br><br><br>
<h1></h1>
<div class="row">
    <div class="row-lg-12" id="descripcion">
      <div class="container" id="TablaId"></div>
    </div>
  
  </div>
</div>
<div class="swiper">
<!-- Swiper -->
<div class="swiper-container" id="swiper-container">
		<div class="swiper-wrapper" id="IdWrapper">	</div>
		<!-- Add Pagination -->
    <div class="swiper-button-next"></div>
		<div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>

	</div>

@endsection