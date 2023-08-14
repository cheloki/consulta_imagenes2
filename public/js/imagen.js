var inicio = 1; 
var indice=0;       

$("#siguiente").click(siguiente);
$("#anterior").click(anterior);  

 

          function siguiente(rcb,contador)
           {  
            let html='';
            const contenido=document.querySelector('#secuencial');
                             var cantidad = ++inicio;              
                               
                                  let nombre2="imagenes/"+rcb+"_";
                               
                                 if (indice==0){
                                         if (cantidad<=contador)
                                             { var filename=nombre2+cantidad+'.tiff';
                                            
                                               loadImage(filename);
                                               html= '<font size="5" color="#3349D1">'+rcb+' > Imagen '+cantidad+' - '+contador+'</font>';
                                               contenido.innerHTML=html;  
                                              }
                                               
                                             else
                                             { inicio = 1;
                                               var filename=nombre2+inicio+'.tiff';
                                               loadImage(filename);
                                               html= '<font size="5" color="#3349D1">'+rcb+' > Imagen '+inicio+' - '+contador+'</font>';
                                               contenido.innerHTML=html;  
                                              }
                                       }
                                 else{
                                   if (indice<contador)
                                   {  
                                      var filename=nombre2+indice+'.tiff';
                                      indice=indice+1;
                                      loadImage(filename); 
                                      html= '<font size="5" color="#3349D1">'+rcb+' > Imagen '+indice+' - '+contador+'</font>';
                                      contenido.innerHTML=html;  
                                    }
                                   else
                                   { indice=0;
                                     var filename=nombre2+cantidad+'.tiff';
                                     loadImage(filename);
                                     html= '<font size="5" color="#3349D1">'+rcb+' > Imagen '+cantidad+' - '+contador+'</font>';
                                     contenido.innerHTML=html;  
                                    }
                                   }
                                   
            }
           function anterior(rcb,contador)
           { 
            let html='';
            const contenido=document.querySelector('#secuencial');
            var cantidad = --inicio; 
                            
                                 let nombre2="imagenes/"+rcb+"_";
                               
                                 if (cantidad<=0){
                                   cantidad=(contador);
                                   indice=parseInt(cantidad)+inicio;
                                                     if (indice<= 0)
                                                     { inicio = (contador);;
                                                       var filename=nombre2+inicio+'.tiff';
                                                       loadImage(filename);
                                                       html= '<font size="5" color="#3349D1">'+rcb+' > Imagen '+inicio+' - '+contador+'</font>';
                                                       contenido.innerHTML=html;  
                                                      }
                                                     else{
                                                       var filename=nombre2+indice+'.tiff';
                                                       loadImage(filename);
                                                       html= '<font size="5" color="#3349D1">'+rcb+' > Imagen '+indice+' - '+contador+'</font>';
                                                       contenido.innerHTML=html;  
                                                      }
                                 }
                                 else
                                 { var filename=nombre2+cantidad+'.tiff';
                                   loadImage(filename);
                                   html= '<font size="5" color="#3349D1">'+rcb+' > Imagen '+cantidad+' - '+contador+'</font>';
                                   contenido.innerHTML=html;  
                                  }
           }
function loadImage(filename) {
    // xhr.destroy();
    const contenido=document.querySelector('#botones');
    let html='';
    $("#imagen").empty();
     var xhr = new XMLHttpRequest();
     xhr.responseType = 'arraybuffer';
     xhr.open('GET', filename);
     xhr.onload = function (e) {
       var tiff = new Tiff({buffer: xhr.response});
       var width = tiff.width();
       var height = tiff.height();
       var canvas = tiff.toCanvas();
       if (canvas) {
         canvas.setAttribute('style', 'width:' + (width*0.4) +
           'px; height: ' + (height*0.4) + 'px');
      //   var elem = document.createElement("div");
      //   html= '<div class="container"><td class="col-md3"><a href="' + filename + '" class="btn btn-warning" role="button" aria-pressed="true">Descargar Imagen</a> ';
                      
        //  contenido.innerHTML=html;             
       //  $("#imagen").append(elem);
         $("#imagen").append(canvas);
       }
     };
     xhr.send();
   }
   