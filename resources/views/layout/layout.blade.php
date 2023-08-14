<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OEP-DIGITALIZADAS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/UTIF.js"></script>
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

    @stack('script1')  
</head>
  <body>
  
  <nav class="navbar bg-body-tertiary fixed-top" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">DIGITALIZADAS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">OEP-DIGITALIZADAS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">RCB</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">OFICIALIA - LIBRO</button>
  </li>

  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-asignados-tab" data-bs-toggle="pill" data-bs-target="#pills-asignados" type="button" role="tab" aria-controls="pills-asignados" aria-selected="false">ASIGNADO</button>
  </li>

</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
  
  <form method="POST" action="{{route('mostrar_imagen_rcb')}}" >
  @csrf
  <div class="form-floating">
        <select class="form-select" id="departamento" aria-label="Floating label select example" name="departamento" required>
        <option value="">Seleccione un Departeamento</option>
          <option value="1">Chuquisaca</option>
          <option value="2">La Paz</option>
          <option value="3">Cochabamba</option>
          <option value="4">Oruro</option>
          <option value="5">Potosi</option>
          <option value="6">Tarija</option>
          <option value="7">Santa Cruz</option>
          <option value="8">Beni</option>
          <option value="9">Pando</option>
        </select>
        <label for="floatingSelect">Departamento</label>
  </div>
        <div class="form-floating mb-3">
        <input type="text" class="form-control"  name="RCB" id="RCB" required>
        <label for="floatingInput">RCB</label>
        </div>
        <div class="d-grid gap-2">
        <button type="submit" class="btn btn-outline-warning"  id="cargado">Buscar</button>
        </div>
        </form>
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">

  <form method="POST" action="{{route('mostrar_imagen_rcb')}}" >
  @csrf
  <div class="form-floating">
        <select class="form-select" id="departamento" aria-label="Floating label select example" name="departamento" required>
        <option value="">Seleccione un Departeamento</option>
          <option value="1">Chuquisaca</option>
          <option value="2">La Paz</option>
          <option value="3">Cochabamba</option>
          <option value="4">Oruro</option>
          <option value="5">Potosi</option>
          <option value="6">Tarija</option>
          <option value="7">Santa Cruz</option>
          <option value="8">Beni</option>
          <option value="9">Pando</option>
        </select>
        <label for="floatingSelect">Departamento</label>
  </div>
  <div class="form-floating mb-3">
  <input type="text" class="form-control" id="oficialia"  name="oficialia" required>
  <label for="floatingInput">Oficialia</label>
  </div>
  <div class="form-floating mb-3">
  <input type="text" class="form-control" id="libro"  name ="libro" required>
  <label for="floatingInput">Libro</label>
  </div>
  <div class="form-floating">
        <select class="form-select" id="categoria" aria-label="Floating label select example" name="categoria" required>
        <option value="">Seleccione una  Categoria</option>
          <option value="1">Nacimiento</option>
          <option value="2">Matrimonio</option>
          <option value="3">Defunción</option>
        </select>
        <label for="floatingSelect">Categoria</label>
  </div>
<br>
  <div class="d-grid gap-2">
<button type="submit" class="btn btn-outline-warning" >Buscar</button>
</div>

</form>
  </div>
  <div class="tab-pane fade" id="pills-asignados" role="tabpanel" aria-labelledby="pills-asignados-tab" tabindex="0">
  
  <form method="POST" action="{{route('listar_imagen')}}" >
  @csrf
  <div class="form-floating">
        <select class="form-select" id="depto_pantalla" aria-label="Floating label select example" name="depto_pantalla" required>
        <option value="">Seleccione un Departeamento</option>
          <option value="1">Chuquisaca</option>
          <option value="2">La Paz</option>
          <option value="3">Cochabamba</option>
          <option value="4">Oruro</option>
          <option value="5">Potosi</option>
          <option value="6">Tarija</option>
          <option value="7">Santa Cruz</option>
          <option value="8">Beni</option>
          <option value="9">Pando</option>
        </select>
        <label for="floatingSelect">Departamento</label>
  </div>
        <div class="form-floating mb-3">
        <input type="text" class="form-control"  name="RCB_pantalla" id="RCB_pantalla" required>
        <label for="floatingInput">RCB</label>
        </div>
        <div class="d-grid gap-2">
        <button type="submit" class="btn btn-outline-warning" >Buscar</button>
        
        </div>
        </form>
  </div>
 





  </div>
      </div>
    </div>
  </div>
</nav>


<div class="container-fluid">
            @yield('content')         
</div>
<div class="container-fluid">
<div class="row">
@yield('imagen')
</div>            
</div>


@stack('script_body')  
<script src="js/digitalizadas.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>

  </body>
</html>