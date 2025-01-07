const contenedorSugerenciasEmpleadoAlta = document.getElementById('sugerenciasNombreAlta');
const inputIdEmpleadoAlta = document.getElementById('idEmpleadoAlta'); // Campo oculto
const inputBusquedaEmpleadoAlta = document.getElementById('busquedaNombreAlta');
const buscarEmpleadoAltaBtn = document.getElementById('buscarEmpleadoAltaBtn'); // El botón de búsqueda

buscarEmpleadoAltaBtn.addEventListener('click', function () {
    const query = inputBusquedaEmpleadoAlta.value.trim();

    if (query.length >= 2) { // Realizar la búsqueda si hay al menos 2 caracteres
        fetch(`index.php?c=bajas&a=inicio&type=empleado&q=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                contenedorSugerenciasEmpleadoAlta.innerHTML = ''; // Limpiar sugerencias previas

                if (data.length > 0) {
                    data.forEach(empleado => {
                        const div = document.createElement('div');
                        div.textContent = `${empleado.nombreEmpleado} ${empleado.apellidoPaterno} ${empleado.apellidoMaterno}`;
                        div.addEventListener('click', () => {
                            inputIdEmpleadoAlta.value = empleado.id_alta; // Coloca el id_empleado en el campo oculto
                            inputBusquedaEmpleadoAlta.value = `${empleado.nombreEmpleado} ${empleado.apellidoPaterno} ${empleado.apellidoMaterno}`; // Muestra el nombre completo
                            contenedorSugerenciasEmpleadoAlta.innerHTML = ''; // Limpia las sugerencias
                        });
                        contenedorSugerenciasEmpleadoAlta.appendChild(div);
                    });
                } else {
                    contenedorSugerenciasEmpleadoAlta.innerHTML = '<div>No se encontraron resultados</div>';
                }
            })
            .catch(error => console.error('Error al realizar la consulta:', error));
    } else {
        contenedorSugerenciasEmpleadoAlta.innerHTML = ''; // Limpiar sugerencias si no hay suficientes caracteres
    }
});

document.addEventListener('click', (event) => {
    const isClickInsideInput = inputBusquedaEmpleadoAlta.contains(event.target);
    const isClickInsideSugerencias = contenedorSugerenciasEmpleadoAlta.contains(event.target);

    if (!isClickInsideInput && !isClickInsideSugerencias) {
        contenedorSugerenciasEmpleadoAlta.innerHTML = ''; // Limpiar sugerencias
    }
});
