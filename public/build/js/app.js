let paso=1;const pasoInicial=1,pasoFinal=3,cita={id:"",nombre:"",fecha:"",hora:"",servicios:[]};function iniciarApp(){mostrarSeccion(),tabs(),botonesPaginador(),paginaSiguiente(),paginaAnterior(),consultarAPI(),idCliente(),nombreCliente(),seleccionarFecha(),seleccionarHora(),mostrarResumen()}function mostrarSeccion(){const e=document.querySelector(".mostrar");e&&e.classList.remove("mostrar");const t="#paso-"+paso;document.querySelector(t).classList.add("mostrar");const o=document.querySelector(".actual");o&&o.classList.remove("actual");document.querySelector(`[data-paso="${paso}"]`).classList.add("actual")}function tabs(){document.querySelectorAll(".tabs button").forEach(e=>{e.addEventListener("click",(function(e){paso=parseInt(e.target.dataset.paso),mostrarSeccion(),botonesPaginador()}))})}function botonesPaginador(){const e=document.querySelector("#anterior"),t=document.querySelector("#siguiente");1===paso?(e.classList.add("ocultar"),t.classList.remove("ocultar")):3===paso?(e.classList.remove("ocultar"),t.classList.add("ocultar"),mostrarResumen()):(e.classList.remove("ocultar"),t.classList.remove("ocultar")),mostrarSeccion()}function paginaAnterior(){document.querySelector("#anterior").addEventListener("click",(function(){paso<=1||(paso--,botonesPaginador())}))}function paginaSiguiente(){document.querySelector("#siguiente").addEventListener("click",(function(){paso>=3||(paso++,botonesPaginador())}))}async function consultarAPI(){try{const e="https://esteticasalon.eu/api/servicios",t=await fetch(e);mostrarServicios(await t.json())}catch(e){console.log(e)}}function mostrarServicios(e){e.forEach(e=>{const{id:t,nombre:o,precio:a}=e,n=document.createElement("P");n.classList.add("nombre-servicio"),n.textContent=o;const c=document.createElement("P");c.classList.add("precio-servicio"),c.textContent="$"+a;const r=document.createElement("DIV");r.classList.add("servicio"),r.dataset.idServicio=t,r.onclick=function(){seleccionarServicio(e)},r.appendChild(n),r.appendChild(c),document.querySelector("#servicios").appendChild(r)})}function seleccionarServicio(e){const{id:t}=e,{servicios:o}=cita,a=document.querySelector(`[data-id-servicio="${t}"]`);o.some(e=>e.id===t)?(cita.servicios=o.filter(e=>e.id!==t),a.classList.remove("seleccionado")):(cita.servicios=[...o,e],a.classList.add("seleccionado"))}function idCliente(){cita.id=document.querySelector("#id").value}function nombreCliente(){cita.nombre=document.querySelector("#nombre").value}function seleccionarFecha(){document.querySelector("#fecha").addEventListener("input",(function(e){const t=new Date(e.target.value).getUTCDay();[6,0].includes(t)?(e.target.value="",mostrarAlerta("Fines de semana no permitidos","error",".formulario")):cita.fecha=e.target.value}))}function seleccionarHora(){document.querySelector("#hora").addEventListener("input",(function(e){const t=e.target.value.split(":")[0];t<10||t>18?(e.target.value="",mostrarAlerta("Hora No Válida","error",".formulario")):cita.hora=e.target.value}))}function mostrarAlerta(e,t,o,a=!0){const n=document.querySelector(".alerta");n&&n.remove();const c=document.createElement("DIV");c.textContent=e,c.classList.add("alerta"),c.classList.add(t);document.querySelector(o).appendChild(c),a&&setTimeout(()=>{c.remove()},3e3)}function mostrarResumen(){const e=document.querySelector(".contenido-resumen");for(;e.firstChild;)e.removeChild(e.firstChild);if(Object.values(cita).includes("")||0===cita.servicios.length)return void mostrarAlerta("Falta información: Seleccione servicio, fecha y hora","error",".contenido-resumen",!1);const{nombre:t,fecha:o,hora:a,servicios:n}=cita;document.createElement("P").innerHTML="<span>Nombre: </span>"+t;const c=new Date(o),r=c.getMonth(),i=c.getDate()+2,s=c.getFullYear(),d=new Date(Date.UTC(s,r,i)).toLocaleDateString("es-CO",{weekday:"long",year:"numeric",month:"long",day:"numeric"}),l=document.createElement("DIV");l.classList.add("contenedor-datos");const u=document.createElement("P");u.innerHTML="<span>Fecha: </span> "+d;const m=document.createElement("P");m.innerHTML=`<span>Hora: </span>${a} Horas`,l.appendChild(u),l.appendChild(m);const p=document.createElement("DIV");p.classList.add("contenedor-boton");const v=document.createElement("BUTTON");v.classList.add("boton"),v.textContent="Reservar Cita",v.onclick=reservarCita,p.appendChild(v),e.appendChild(l);const h=document.createElement("H3");h.textContent="Servicios Seleccionados",e.appendChild(h),n.forEach(t=>{const{id:o,precio:a,nombre:n}=t,c=document.createElement("DIV");c.classList.add("contenedor-servicio");const r=document.createElement("P");r.textContent=n;const i=document.createElement("P");i.innerHTML="<span>Precio: </span>$"+a,c.appendChild(r),c.appendChild(i),e.appendChild(c)}),e.appendChild(p)}async function reservarCita(){const{nombre:e,fecha:t,hora:o,servicios:a,id:n}=cita,c=a.map(e=>e.id),r=new FormData;r.append("fecha",t),r.append("hora",o),r.append("usuarioId",n),r.append("servicios",c);try{const e="https://esteticasalon.eu/api/citas",t=await fetch(e,{method:"POST",body:r}),o=await t.json();console.log(o.resultado),o.resultado&&Swal.fire({icon:"success",title:"Cita Creada",text:"Tu cita fue creada correctamente",button:"OK"}).then(()=>{setTimeout(()=>{window.location.reload()},3e3)})}catch(e){Swal.fire({icon:"error",title:"Error",text:"Hubo un error al guardar la cita"})}}document.addEventListener("DOMContentLoaded",(function(){iniciarApp()}));