const btnGuardar = document.getElementById('btnGuardar')
const btnModificar = document.getElementById('btnModificar')
const btnBuscar = document.getElementById('btnBuscar')
const btnCancelar = document.getElementById('btnCancelar')
const btnLimpiar = document.getElementById('btnLimpiar')
const tablaClinicas = document.getElementById('tablaClinicas')
const formulario = document.querySelector('form')

btnModificar.parentElement.style.display = 'none'
btnCancelar.parentElement.style.display = 'none'

const getClinicas = async (alerta='si') => {
    const nombre = formulario.clinica_nombre.value.trim()
    const url = `/final_hospital_js/controladores/clinicas/index.php?clinica_nombre=${nombre}`
    const config = {
        method: 'GET'
    }
console.log(url)
    try {
        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        console.log(data);

        tablaClinicas.tBodies[0].innerHTML = ''
        const fragment = document.createDocumentFragment()
        let contador = 1;
        if (respuesta.status == 200) {
            if (alerta =='si') {
                Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    icon: "success",
                    title: 'Clinicas Encontradas',
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                }).fire();
            }
            

            if (data.length > 0) {
                data.forEach(clinica => {
                    const tr = document.createElement('tr')
                    const celda1 = document.createElement('td')
                    const celda2 = document.createElement('td')
                    const celda3 = document.createElement('td')
                    const celda4 = document.createElement('td')
                    const buttonModificar = document.createElement('button')
                    const buttonEliminar = document.createElement('button')

                    celda1.innerText = contador;
                    celda2.innerText = clinica.CLINICA_NOMBRE;



                    buttonModificar.textContent = 'Modificar'
                    buttonModificar.classList.add('btn', 'btn-warning', 'w-100')
                    buttonModificar.addEventListener('click', () => llenardatos(clinica) )
                    //evento eliminar
                    buttonEliminar.textContent = 'Eliminar'
                    buttonEliminar.classList.add('btn', 'btn-danger', 'w-100')
                    buttonEliminar.addEventListener('click', () => eliminar(clinica) )

                    celda3.appendChild(buttonModificar)
                    celda4.appendChild(buttonEliminar)

                    tr.appendChild(celda1)
                    tr.appendChild(celda2)
                    tr.appendChild(celda3)
                    tr.appendChild(celda4)
                    fragment.appendChild(tr);

                    contador++
                });

            } else {
                const tr = document.createElement('tr')
                const td = document.createElement('td')
                td.innerText = 'No hay clinicas'
                td.colSpan = 4;

                tr.appendChild(td)
                fragment.appendChild(tr)
            }
        } else {
            console.log('error al cargar clinicas');
        }

        tablaClinicas.tBodies[0].appendChild(fragment)
    } catch (error) {
        console.log(error);
    }
}


//funcion guardar pacientes

const guardarClinica = async (e) => {
    e.preventDefault();
    console.log('Botón Guardar presionado');  // Depuración

    btnGuardar.disabled = true;

    const url = '/final_hospital_js/controladores/clinicas/index.php';
    const formData = new FormData(formulario);
    formData.append('tipo', 1);
    formData.delete('clinica_id');
    const config = {
        method: 'POST',
        body: formData
    };

    try {
        console.log('Enviando datos:', ...formData.entries());
        const respuesta = await fetch(url, config);
        const data = await respuesta.text();  // Cambiar a text para depuración

        try {
            const jsonData = JSON.parse(data);
            console.log('Respuesta recibida:', jsonData);
            const { mensaje, codigo, detalle } = jsonData;

            if (respuesta.ok && codigo === 1) {
                Swal.fire({
                    icon: 'success',
                    title: mensaje,
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer);
                        toast.addEventListener('mouseleave', Swal.resumeTimer);
                    }
                });

                getClinicas(alerta = 'no');
                formulario.reset();
            } else {
                console.log('Error:', detalle);
                Swal.fire({
                    icon: 'error',
                    title: 'Error al guardar',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer);
                        toast.addEventListener('mouseleave', Swal.resumeTimer);
                    }
                });
            }
        } catch (error) {
            console.error('Error al parsear JSON:', error, data);
            Swal.fire({
                icon: 'error',
                title: 'Respuesta no válida',
                text: data,
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });
        }
    } catch (error) {
        console.log('Error de comunicación:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error de conexión',
            text: error.message,
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });
    } finally {
        btnGuardar.disabled = false;
    }
};


//funcion modificar
const llenardatos = (clinica) => {

    formulario.clinica_id.value = clinica.CLINICA_ID
    formulario.clinica_nombre.value = clinica.CLINICA_NOMBRE
    btnBuscar.parentElement.style.display = 'none'
    btnGuardar.parentElement.style.display = 'none'
    btnLimpiar.parentElement.style.display = 'none'
    btnModificar.parentElement.style.display = ''
    btnCancelar.parentElement.style.display = ''

}

//funcion eliminar

const cancelarAccion = (e) => {
    formulario.reset();
    btnBuscar.parentElement.style.display = ''
    btnGuardar.parentElement.style.display = ''
    btnLimpiar.parentElement.style.display = ''
    btnModificar.parentElement.style.display = 'none'
    btnCancelar.parentElement.style.display = 'none'

}

const modificar = async(e) => {
    e.preventDefault();
    btnModificar.disabled = true;

    const url = '/final_hospital_js/controladores/clinicas/index.php';
    const formData = new FormData(formulario);
    formData.append('tipo', 2);
    const config = {
        method: 'POST',
        body: formData
    };

    try {
        console.log('Enviando datos:', ...formData.entries());
        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        console.log(data)
        console.log('Respuesta recibida:', data);
        const { mensaje, codigo, detalle } = data;
        if (respuesta.ok && codigo === 1) {
            Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                icon: "success",
                title: mensaje,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            }).fire();

            //funcion par que funcione cancelar
            formulario.reset()
            getClinicas(alerta='no');

            btnBuscar.parentElement.style.display = ''
            btnGuardar.parentElement.style.display = ''
            btnLimpiar.parentElement.style.display = ''
            btnModificar.parentElement.style.display = 'none'
            btnCancelar.parentElement.style.display = 'none'
         
        } else {
            console.log('Error:', detalle);
            Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                icon: "error",
                title: 'Error al guardar',
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            }).fire();
        }
    } catch (error) {
        console.log('Error de conexión:', error);
        Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            icon: "error",
            title: 'Error de conexión',
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        }).fire();
    }
    btnModificar.disabled = false;

    const llenardatos = (clinica) => {

        formulario.clinica_id.value = clinica.CLINICA_ID
        formulario.clinica_nombre.value = clinica.CLINICA_NOMBRE
        btnBuscar.parentElement.style.display = 'none'
        btnGuardar.parentElement.style.display = 'none'
        btnLimpiar.parentElement.style.display = 'none'
        btnModificar.parentElement.style.display = ''
        btnCancelar.parentElement.style.display = ''
    
    }

}

//funcion eliminar 

const eliminar = async (clinica) => {
    const confirmacion = await Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No se podrá cambiar después!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminarlo!',
        cancelButtonText: 'Cancelar'
    });

    if (confirmacion.isConfirmed) {
  
        const url = '/final_hospital_js/controladores/clinicas/index.php';
        const formData = new FormData();
        formData.append('tipo', 3);
        formData.append('clinica_id', clinica.CLINICA_ID);
        const config = {
            method: 'POST',
            body: formData
        };

        try {
            console.log('Enviando datos:', ...formData.entries());
            const respuesta = await fetch(url, config);
            const data = await respuesta.json();
            console.log('Respuesta recibida:', data);
            const { mensaje, codigo, detalle } = data;
            if (respuesta.ok && codigo === 1) {
                Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    icon: "success",
                    title: mensaje,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                }).fire();

                // Mostrar la alerta de éxito
                Swal.fire({
                    icon: 'success',
                    title: 'Eliminado correctamente',
                    showConfirmButton: false,
                    timer: 5000,
                });
                formulario.reset()
                getClinicas(alerta='no');
            } else {
                console.log('Error:', detalle);
                Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    icon: "error",
                    title: 'Error al eliminar',
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                }).fire();
            }
        } catch (error) {
            console.log('Error de conexión:', error);
            Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                icon: "error",
                title: 'Error de conexión',
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            }).fire();
        }
    }
};

   
getClinicas();
formulario.addEventListener('submit', guardarClinica)
btnBuscar.addEventListener('click', getClinicas)
btnModificar.addEventListener('click', modificar)
btnCancelar.addEventListener('click', cancelarAccion)



