const contenedorSugerenciasEmpleado = document.getElementById('sugerenciasNombre');
const inputIdEmpleado = document.getElementById('idEmpleado'); // Campo oculto
const inputBusquedaEmpleado = document.getElementById('busquedaNombre');
const buscarEmpleadoBtn = document.getElementById('buscarEmpleadoBtn'); // El botón de búsqueda

buscarEmpleadoBtn.addEventListener('click', function () {
    const query = inputBusquedaEmpleado.value.trim();

    if (query.length >= 2) { // Realizar la búsqueda si hay al menos 2 caracteres
        fetch(`index.php?c=insControlEmpl&a=inicio&type=empleado&q=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                contenedorSugerenciasEmpleado.innerHTML = ''; // Limpiar sugerencias previas

                if (data.length > 0) {
                    data.forEach(empleado => {
                        const div = document.createElement('div');
                        div.textContent = `${empleado.nombreEmpleado} ${empleado.apellidoPaterno} ${empleado.apellidoMaterno}`;
                        div.addEventListener('click', () => {
                            inputIdEmpleado.value = empleado.id_empleado; // Coloca el id_empleado en el campo oculto
                            inputBusquedaEmpleado.value = `${empleado.nombreEmpleado} ${empleado.apellidoPaterno} ${empleado.apellidoMaterno}`; // Muestra el nombre completo
                            contenedorSugerenciasEmpleado.innerHTML = ''; // Limpia las sugerencias
                        });
                        contenedorSugerenciasEmpleado.appendChild(div);
                    });
                } else {
                    contenedorSugerenciasEmpleado.innerHTML = '<div>No se encontraron resultados</div>';
                }
            })
            .catch(error => console.error('Error al realizar la consulta:', error));
    } else {
        contenedorSugerenciasEmpleado.innerHTML = ''; // Limpiar sugerencias si no hay suficientes caracteres
    }
});

document.addEventListener('click', (event) => {
    const isClickInsideInput = inputBusquedaEmpleado.contains(event.target);
    const isClickInsideSugerencias = contenedorSugerenciasEmpleado.contains(event.target);

    if (!isClickInsideInput && !isClickInsideSugerencias) {
        contenedorSugerenciasEmpleado.innerHTML = ''; // Limpiar sugerencias
    }
});
