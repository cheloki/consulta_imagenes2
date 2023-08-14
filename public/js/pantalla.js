let cant_reg;
let dato;
let contador=0;


function datos(respuesta,respuestaRCB,respuestaRegistros)
{
   dato = JSON.parse(respuesta);
   datoRCB=JSON.parse(respuestaRCB);
   datoRegistro=JSON.parse(respuestaRegistros);
   console.log(datoRCB[0].Categoria);
   switch(datoRCB[0].Categoria){
    case 'Nacimiento':
    RegistrosNac(datoRegistro);
    console.log('Nac');
    break;
    case 'Matrimonio':
    RegistrosMat(datoRegistro);
    console.log("Mat");
    break;
    case 'Defunción':
    RegistrosDef(datoRegistro);
    break;
   }
  
   
   cant_reg=(dato.length);
   cant_part=(datoRegistro.length);
   for (var i = 0; i < cant_reg; i++) {
      const container=document.querySelector('#swiper2');   
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
    
   }
   const container_partidas=document.querySelector('#btnpartidas');  
   for (var j = 0; j < cant_part; j++) {
     
    const button = document.createElement("button");
    button.id="button"+(j);
    let identificador=j;
    button.textContent=datoRegistro[j].Partida;
    button.className ="btn btn-outline-primary btn-sm";
    button.onclick=function() {
      mensaje(datoRegistro,identificador);
    };
    container_partidas.appendChild(button);
 
  }
  console.log(container_partidas);
    const Depto = dato[0].Depto;
    const BatchId = dato[0].BatchID;
    const ImageOrder = dato[0].ImageOrder;
    const RCB = dato[0].RCB;
    console.log(Depto+'-'+RCB+'-'+BatchId+'-'+ImageOrder);
    var url='imagen/'+Depto+'/'+RCB+'/'+ImageOrder+'/'+BatchId;
    let dir_imagen="imagenes/"+RCB+"_"+ImageOrder+".tiff";
    $.get(url,function(data){
      for (var i=0; i<1;i++)
      document.getElementById("img0").src=dir_imagen;
      UTIF.replaceIMG();
    })
   UTIF.replaceIMG();


   var inputNombre = document.querySelector("#Oficialia_Id");
   inputNombre.value = datoRCB[0].Oficialia;
   var inputNombre = document.querySelector("#Libro_Id");
   inputNombre.value = datoRCB[0].Libro;
   var inputNombre = document.querySelector("#Categoria_Id");
   inputNombre.value = datoRCB[0].Categoria;
   var inputNombre = document.querySelector("#RCB_Id");
   inputNombre.value = datoRCB[0].RCB;
   /*
   const gandalfImage = document.querySelector("#img2");
   gandalfImage.addEventListener("load", function() {
      console.log("cargado imagen 2");
   });
*/
/*
   const contenido_sw=document.querySelector('#swiper2');   
   let html2='';
   html2 +=`
   <swiper-slide>
   <img src=" imagenes/RCB236540_1.tiff" id="img1" />`+'A'+`
 </swiper-slide>
 <swiper-slide>
   <img src=" imagenes/diferencias.jpeg" />`+'B'+`
 </swiper-slide>
 <swiper-slide>
 <img src=" imagenes/RCB236540_1.tiff" />`+'C'+`
 </swiper-slide>
 `
 ;
    contenido_sw.innerHTML=html2;
*/
/*
   const contenido=document.querySelector('#grupo');   
   let html='';
   html +=`
   <h1>GRUPO</h1>
    `;
    contenido.innerHTML=html;
    */
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
         return '<span class="' + className + '">' + (index + 1) + "</span>";
         
       },
     },
   }
   Object.assign(swiperEl, params)
   swiperEl.initialize();
   swiperEl.addEventListener('slidechange', (event) => {
    //console.log(swiperEl.swiper.snapIndex);
    const index=swiperEl.swiper.snapIndex;
    const Depto = dato[index].Depto;
    const BatchId = dato[index].BatchID;
    const ImageOrder = dato[index].ImageOrder;
    const RCB = dato[index].RCB;
    console.log(Depto+'-'+RCB+'-'+BatchId+'-'+ImageOrder);
    var url='imagen/'+Depto+'/'+RCB+'/'+ImageOrder+'/'+BatchId;
    let dir_imagen="imagenes/"+RCB+"_"+index+".tiff";
   
    $.get(url,function(data){
      for (var i=0; i<1;i++)
      document.getElementById("img"+index).src=dir_imagen;
      UTIF.replaceIMG();
    })
    
  
   // console.log(dir_imagen);
   
    });
}

function RegistrosNac(data)
{

  const container=document.querySelector('#registro');  
  
  const form = document.createElement("form");
  form.id="form0";
  form.className="row g-3";
  container.appendChild(form);

  const container_form=document.querySelector('#form0');  
  const div0 = document.createElement("div");
  div0.id="div0";
  div0.className="col-12";
  container_form.append(div0);


  const element = document.querySelector('#div0');  
  const label_nombre = document.createElement("label");
  label_nombre.textContent="Nombre:";
  label_nombre.className ="form-label";
  console.log(container);
  element.appendChild(label_nombre);

  const input_nombre = document.createElement("input");
  input_nombre.type="text";
  input_nombre.id="NombreId";
  input_nombre.className ="form-control";
  input_nombre.disabled=true;
  element.appendChild(input_nombre);

  const div1 = document.createElement("div");
  div1.id="div1";
  div1.className="col-12";
  container_form.append(div1);

  const element2 = document.querySelector('#div1');  
  const label_paterno= document.createElement("label");
  label_paterno.textContent="Apellido Paterno:";
  label_paterno.className ="form-label";
  element2.appendChild(label_paterno);

  const input_paterno = document.createElement("input");
  input_paterno.type="text";
  input_paterno.id="PaternoId";
  input_paterno.className ="form-control";
  input_paterno.disabled=true;
  element2.appendChild(input_paterno);

  const div2 = document.createElement("div");
  div2.id="div2";
  div2.className="col-12";
  container_form.append(div2);

  const element3 = document.querySelector('#div2');  
  const label_materno= document.createElement("label");
  label_materno.textContent="Apellido Materno:";
  label_materno.className ="form-label";
  element3.appendChild(label_materno);

  const input_materno = document.createElement("input");
  input_materno.type="text";
  input_materno.id="MaternoId";
  input_materno.className ="form-control";
  input_materno.disabled=true;
  element3.appendChild(input_materno);

  const div3 = document.createElement("div");
  div3.id="div3";
  div3.className="col-md-8";
  container_form.append(div3);

  const element4 = document.querySelector('#div3');  
  const label_nacimiento= document.createElement("label");
  label_nacimiento.textContent="Fecha Nacimiento:";
  label_nacimiento.className ="form-label";
  element4.appendChild(label_nacimiento);

  const input_nacimiento = document.createElement("input");
  input_nacimiento.type="text";
  input_nacimiento.id="NacimientoId";
  input_nacimiento.className ="form-control";
  input_nacimiento.disabled=true;
  element4.appendChild(input_nacimiento);

  const div4 = document.createElement("div");
  div4.id="div4";
  div4.className="col-md-4";
  container_form.append(div4);

  const element5 = document.querySelector('#div4');  
  const label_partida= document.createElement("label");
  label_partida.textContent="Partida:";
  label_partida.className ="form-label";
  element5.appendChild(label_partida);

  const input_partida = document.createElement("input");
  input_partida.type="text";
  input_partida.id="PartidaId";
  input_partida.className ="form-control";
  input_partida.disabled=true;
  element5.appendChild(input_partida);

  const div5 = document.createElement("div");
  div5.id="div5";
  div5.className="col-md-12";
  container_form.append(div5);

  const element6 = document.querySelector('#div5');  
  const label_inscripcion= document.createElement("label");
  label_inscripcion.textContent="Fecha de Inscripción:";
  label_inscripcion.className ="form-label";
  element6.appendChild(label_inscripcion);

  const input_inscripcion = document.createElement("input");
  input_inscripcion.type="text";
  input_inscripcion.id="InscripcionId";
  input_inscripcion.className ="form-control";
  input_inscripcion.disabled=true;
  element6.appendChild(input_inscripcion);

  const div6 = document.createElement("div");
  div6.id="div6";
  div6.className="d-grid gap-2 d-md-flex justify-content-md-end";
  container_form.append(div6);

  const element7 = document.querySelector('#div6');  
  const button_atras= document.createElement("button");
  button_atras.id="AtrasId";
  button_atras.textContent="Atras";
  button_atras.type="button";
  button_atras.disabled="true";
  button_atras.className ="btn btn-secondary me-md-2";
  element7.appendChild(button_atras);

  const button_siguiente= document.createElement("button");
  button_siguiente.id="SiguienteId";
  button_siguiente.textContent="Siguiente";
  button_siguiente.type="button";
  button_siguiente.className ="btn btn-primary me-md-2";
  element7.appendChild(button_siguiente);

  const input_search_partida = document.createElement("input");
  input_search_partida.type="text";
  input_search_partida.id="SearchId";
  input_search_partida.className ="form-control";
  input_search_partida.placeholder ="#";
  element7.appendChild(input_search_partida);

  var inputNombre = document.querySelector("#NombreId");
  inputNombre.value = data[contador].Nombre;
  var inputNombre = document.querySelector("#PaternoId");
  inputNombre.value = data[contador].Paterno;
  var inputNombre = document.querySelector("#MaternoId");
  inputNombre.value = data[contador].Materno;
  var inputNombre = document.querySelector("#NacimientoId");
  inputNombre.value = data[contador].FechaNac;
  var inputNombre = document.querySelector("#PartidaId");
  inputNombre.value = data[contador].Partida;
  var inputNombre = document.querySelector("#InscripcionId");
  inputNombre.value = data[contador].FechaInsc;

  const btnsiguiente = document.querySelector("#SiguienteId");
  const btnsatras = document.querySelector("#AtrasId");
  btnsiguiente.addEventListener("click", function(evento){
    if(contador<=data.length)
    {  
      
      contador++;
      if (contador==(data.length-1))
      { btnsiguiente.disabled=true; }
      else
      { btnsatras.disabled=false;  }
      var inputNombre = document.querySelector("#NombreId");
      inputNombre.value = data[contador].Nombre;
      var inputNombre = document.querySelector("#PaternoId");
      inputNombre.value = data[contador].Paterno;
      var inputNombre = document.querySelector("#MaternoId");
      inputNombre.value = data[contador].Materno;
      var inputNombre = document.querySelector("#NacimientoId");
      inputNombre.value = data[contador].FechaNac;
      var inputNombre = document.querySelector("#PartidaId");
      inputNombre.value = data[contador].Partida;
      var inputNombre = document.querySelector("#InscripcionId");
      inputNombre.value = data[contador].FechaInsc;
    }
  });
    
    btnsatras.addEventListener("click", function(evento){
      contador--;
      if (contador==0)
      { btnsatras.disabled=true; }
      else
      { btnsiguiente.disabled=false; }
      console.log(contador+'-ant');
    if(contador>=0)
    {
      
    
      var inputNombre = document.querySelector("#NombreId");
      inputNombre.value = data[contador].Nombre;
      var inputNombre = document.querySelector("#PaternoId");
      inputNombre.value = data[contador].Paterno;
      var inputNombre = document.querySelector("#MaternoId");
      inputNombre.value = data[contador].Materno;
      var inputNombre = document.querySelector("#NacimientoId");
      inputNombre.value = data[contador].FechaNac;
      var inputNombre = document.querySelector("#PartidaId");
      inputNombre.value = data[contador].Partida;
      var inputNombre = document.querySelector("#InscripcionId");
      inputNombre.value = data[contador].FechaInsc;
    }
   
  });
}

function RegistrosMat(data)
{
  const container=document.querySelector('#registro');  
  
  const form = document.createElement("form");
  form.id="form0";
  form.className="row g-3";
  container.appendChild(form);

  const container_form=document.querySelector('#form0');  
  const div0 = document.createElement("div");
  div0.id="div0";
  div0.className="col-12";
  container_form.append(div0);


  const element = document.querySelector('#div0');  
  const label_nombre_esposo = document.createElement("label");
  label_nombre_esposo.textContent="Nombre Esposo:";
  label_nombre_esposo.className ="form-label";
  console.log(container);
  element.appendChild(label_nombre_esposo);

  const input_nombre_esposo = document.createElement("input");
  input_nombre_esposo.type="text";
  input_nombre_esposo.id="NombreEsposoId";
  input_nombre_esposo.className ="form-control";
  input_nombre_esposo.disabled=true;
  element.appendChild(input_nombre_esposo);
}


function mensaje(registros,val)
{
 var inputNombre = document.querySelector("#NombreId");
      inputNombre.value = registros[val].Nombre;
      var inputNombre = document.querySelector("#PaternoId");
      inputNombre.value = registros[val].Paterno;
      var inputNombre = document.querySelector("#MaternoId");
      inputNombre.value = registros[val].Materno;
      var inputNombre = document.querySelector("#NacimientoId");
      inputNombre.value = registros[val].FechaNac;
      var inputNombre = document.querySelector("#PartidaId");
      inputNombre.value = registros[val].Partida;
      var inputNombre = document.querySelector("#InscripcionId");
      inputNombre.value = registros[val].FechaInsc;
}