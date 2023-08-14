let cant_reg;
let dato;
let contador=0;
let index=0;
function datos(respuesta,respuestaRCB)
{
    dato = JSON.parse(respuesta);
    datoRCB=JSON.parse(respuestaRCB);
    console.log(dato);
cant_reg=(dato.length);
if(cant_reg==0)
{
  Swal.fire({
    icon: 'error',
    title: 'Error...',
    text: 'NO se encontraron registros con ese RCB!',
    confirmButtonText: 'Cerrar'
  })

}
else
{
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
  const Wrappercontainer=document.querySelector('#IdWrapper'); 
for (var i = 0; i < cant_reg; i++) {
   const div = document.createElement("div");
   div.id="div"+(i+1);
   div.className ="swiper-slide";
   Wrappercontainer.appendChild(div);
   const elementdiv = document.querySelector('#div'+(i+1)); 
   const imgdiv = document.createElement("img");   
   imgdiv.id="img"+(i);  
 //  img.src="imagenes/RCB216943_"+(i+1)+".tiff";
   imgdiv.src="";
   UTIF.replaceIMG();
   elementdiv.appendChild(imgdiv);
}

console.log(Wrappercontainer);
const Depto = dato[0].Depto;
    const BatchId = dato[0].BatchID;
    const ImageOrder = dato[0].ImageOrder;
    const RCB = dato[0].RCB;
    var url='imagen/'+Depto+'/'+RCB+'/'+ImageOrder+'/'+BatchId;
    console.log(url);
    let dir_imagen="imagenes/"+RCB+"_"+dato[0].ImageOrder+".tiff";
    console.log(dir_imagen);
    $.get(url,function(data){
      for (var i=0; i<1;i++)
      document.getElementById("img0").src=dir_imagen;
      UTIF.replaceIMG();
      calcular(data,0);
    })
   UTIF.replaceIMG();
   /*
   var inputNombre = document.querySelector("#Oficialia_Id");
   inputNombre.innerText = datoRCB[0].Oficialia;
   var inputNombre = document.querySelector("#Libro_Id");
   inputNombre.innerText = datoRCB[0].Libro;
   var inputNombre = document.querySelector("#Categoria_Id");
   inputNombre.innerText  = datoRCB[0].Categoria;
   var inputNombre = document.querySelector("#RCB_Id");
   inputNombre.innerText = datoRCB[0].RCB;
   var inputNombre = document.querySelector("#Imagenes_Id");
   inputNombre.innerText = (dato.length);

*/
   const contenido_tabla=document.querySelector('#TablaId');   
   let html2='';
   html2 +=`
   <table class="table">
   <thead class="table-primary" ALIGN="center">
     <tr>
       <th scope="col">RCB</th>
       <th scope="col">OFICIALIA</th>
       <th scope="col">LIBRO</th>
       <th scope="col">CATEGORIA</th>
       <th scope="col">CANT. IMAGENES</th>
       <th scope="col">ESTADO</th>
     </tr>
   </thead>
   <tbody>
     <tr align="center">
       <td align="center"> <h5 class="card-title" id="RCB_Id">`+datoRCB[0].RCB+`</h5></td>
       <td><h5 class="card-title" id="Oficialia_Id">`+datoRCB[0].Oficialia+`</h5></td>
       <td><h5 class="card-title" id="Libro_Id">`+datoRCB[0].Libro+`</h5></td>
       <td><h5 class="card-title" id="Categoria_Id">`+datoRCB[0].Categoria+`</h5></td>
       <td><h5 class="card-title" id="Imagenes_Id">`+(dato.length)+`</h5></td>
       <td><h5 class="card-title" ><button type="button" class="btn btn-primary" onclick="mensaje();" data-bs-target="#exampleModal">
       Modificar
     </button></td>
       
     </tr>
   </tbody>
 </table>
 `
 ;
 contenido_tabla.innerHTML=html2;
 console.log(contenido_tabla);
}

}

function inicio_swip()
{
		var swiper = new Swiper('.swiper-container', {
//      spaceBetween: 30,
 //     effect: 'fade',
      rewind: false,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
        renderBullet: function (index, className) {
                return '<span class="' + className + '"  id="span'+index+'" >' + (index + 1) + '</span>'; 
        },
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      keyboard: {
        enabled: true,
        onlyInViewport: false,
      },

    });

    swiper.on('slideChange', function () {
      index=swiper.snapIndex;
   
      console.log(index);
      const Depto = dato[index].Depto;
      const BatchId = dato[index].BatchID;
      const ImageOrder = dato[index].ImageOrder;
      const RCB = dato[index].RCB;
      var url='imagen/'+Depto+'/'+RCB+'/'+ImageOrder+'/'+BatchId;
      let dir_imagen="imagenes/"+RCB+"_"+ImageOrder+".tiff";
      console.log(url);
      $.get(url,function(data){
        for (var i=0; i<1;i++)
        document.getElementById("img"+index).src=dir_imagen;
        UTIF.replaceIMG();
        calcular(data,index);
     
      })
    });
 
}
function calcular(resp,index)
{
  if (resp==='"vacio"')
  {
    document.getElementById("img"+index).src="imagenes/imagen.png";
    UTIF.replaceIMG();
  }
  else
  {
   // console.log(resp);
  }

}

function mostrar()
{
//      var objects = document.getElementsByClassName("swiper-pagination-bullet");
//  objects.style.color='#967';
//    console.log(objects);


for (var i = 0; i < cant_reg; i++) {
  if(dato[i].Tipo==='0')
  {
    var span = document.querySelector("#span"+i);
span.style.background= '#EDF776';
  }
  if(dato[i].Tipo==='1')
  {
    var span = document.querySelector("#span"+i);
span.style.background= '#E78377';
  }
  if(dato[i].Tipo==='2')
  {
    var span = document.querySelector("#span"+i);
span.style.background= '#8FE87F';
  }
}
}

function mensaje()
{
  Swal.fire({
    title: 'Esta seguro?',
    text: "Tu quieres eliminar la imagen!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, Eliminar!'
  }).then((result) => {
    if (result.isConfirmed) {
      
      img_excepcion();
      Swal.fire({
        icon: 'success',
        title: 'Imagen Eliminada',
        text: 'Usted elimino la imagen satisfactoriamente.!',
        confirmButtonText: 'Ok'
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          location.reload();
        } 
      })
    }
  })
}
function img_excepcion()
{

  const Depto = dato[index].Depto;
      const BatchId = dato[index].BatchID;
      const ImageOrder = dato[index].ImageOrder;
      const RCB = dato[index].RCB;
      console.log(ImageOrder);
      var url='img_excep/'+Depto+'/'+RCB+'/'+ImageOrder+'/'+BatchId;
      $.get(url,function(data){
        for (var i=0; i<1;i++)
       console.log(data);
     
      })
}