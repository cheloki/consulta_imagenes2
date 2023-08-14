let cantidad;
$('#cargado_pantalla').click(function () {
    depto=$('#depto_pantalla').val();
    rcb=$('#RCB_pantalla').val();
    _token=$("input[name=_token]").val();
    //Cancelamos el evento submit
    event.preventDefault();
    //Hacemos la peticion
    $.ajax({
        type:'POST',
        url: 'listar',
        data:{
            depto:depto,
            rcb:rcb,
            _token:_token
          },
          dataType: "JSON",
        success: function(respuesta){
           // console.log(respuesta);

            recuperaDatos(respuesta);
            alert('SUCCESS');
          //  location.href ="pantalla";
         //   $('.contenido').html(respuesta);
        },
        error: function (){
            console.log('Error');
        }
    })
console.log(cantidad);
    const container=document.getElementById('swiper2');
      const img = document.createElement("swiper-slide");
      console.log(img);
      container.appendChild(img);
})
        
     
     function recuperaDatos(reporte)
     {
      //  const dato = JSON.parse(reporte);
        let cant_reg=(reporte.length);
        cantidad=cant_reg;
      console.log(cant_reg);

     }

