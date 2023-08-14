let cant_reg;
let dato;
let contador=0;
function datos(respuesta,respuestaRCB)
{
    dato = JSON.parse(respuesta);
    datoRCB=JSON.parse(respuestaRCB);
    console.log(dato);
cant_reg=(dato.length);
const container=document.querySelector('#swiper2'); 
const Wrappercontainer=document.querySelector('#IdWrapper'); 
for (var i = 0; i < cant_reg; i++) {
   const swiper = document.createElement("swiper-slide");
   swiper.id="slide"+(i+1);
   container.appendChild(swiper);
   const element = document.querySelector('#slide'+(i+1));   
   const img = document.createElement("img");   
   img.id="img"+(i);  
 //  img.src="imagenes/RCB216943_"+(i+1)+".tiff";
   img.src="";
   UTIF.replaceIMG();
   element.appendChild(img);
 

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
console.log(container);
console.log(Wrappercontainer);
const Depto = dato[0].Depto;
    const BatchId = dato[0].BatchID;
    const ImageOrder = dato[0].ImageOrder;
    const RCB = dato[0].RCB;
    var url='imagen/'+Depto+'/'+RCB+'/'+ImageOrder+'/'+BatchId;
    console.log(url);
    let dir_imagen="imagenes/"+RCB+"_0"+".tiff";
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
     </tr>
   </thead>
   <tbody>
     <tr align="center">
       <td> <h5 class="card-title" id="RCB_Id">`+datoRCB[0].RCB+`</h5></td>
       <td><h5 class="card-title" id="Oficialia_Id">`+datoRCB[0].Oficialia+`</h5></td>
       <td><h5 class="card-title" id="Libro_Id">`+datoRCB[0].Libro+`</h5></td>
       <td><h5 class="card-title" id="Categoria_Id">`+datoRCB[0].Categoria+`</h5></td>
       <td><h5 class="card-title" id="Imagenes_Id">`+(dato.length)+`</h5></td>
     </tr>
   </tbody>
 </table>
 `
 ;
 contenido_tabla.innerHTML=html2;
 console.log(contenido_tabla);
}

function inicio_swip()
{


   const swiperEl = document.querySelector('swiper-container')

   const params = {
     injectStyles: [`
     .swiper-pagination-bullet {
      width: 20px;
      height: 20px;
      text-align: center;
      line-height: 20px;
      font-size: 12px;
      color: #000;
      opacity: 1;
      background: rgba(255, 99, 71, 0.8);
     }
     .swiper-pagination-bullet-active {
       color: #fff;
       background: #007aff;
     }
     `],
     pagination: {
       clickable: true,
       renderBullet: function (index, className) {
 
        //console.log(className+'-'+index);
         return '<span class="' + className + '" >' + (index + 1) + "</span>";
        
       },
     },
   }

   Object.assign(swiperEl, params)
   swiperEl.initialize();



   swiperEl.addEventListener('slidechange', (event) => {
  
    const index=swiperEl.swiper.snapIndex;
  
   
    const Depto = dato[index].Depto;
    const BatchId = dato[index].BatchID;
    const ImageOrder = dato[index].ImageOrder;
    const RCB = dato[index].RCB;
    console.log(Depto+'-'+RCB+'-'+BatchId+'-'+ImageOrder);
    var url='imagen/'+Depto+'/'+RCB+'/'+ImageOrder+'/'+BatchId;
    let dir_imagen="imagenes/"+RCB+"_"+index+".tiff";
    console.log(dir_imagen);
 
 
    $.get(url,function(data){
      for (var i=0; i<1;i++)
      document.getElementById("img"+index).src=dir_imagen;
      UTIF.replaceIMG();
      calcular(data,index);
   
    })
    

   // console.log(dir_imagen);

    });
    spam_();
      
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
    console.log(resp);
  }

}

function spam_()
{

    var objects = document.getElementsByClassName("bulletClass");

      console.log(objects);


}
