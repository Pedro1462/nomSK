const contenedorSugerenciasSucursal = document.getElementById('sugerenciasSucursal');
const inputIdSucursal = document.getElementById('idSucursal'); // Campo oculto
const inputBusquedaSucursal = document.getElementById('busquedaSucursal');
const buscarSucursalBtn = document.getElementById('buscarSucursalBtn'); // El botón de búsqueda

buscarSucursalBtn.addEventListener('click', function () {
    const query = inputBusquedaSucursal.value.trim();

    if (query.length >= 2) { // Realizar la búsqueda si hay al menos 2 caracteres
        fetch(`index.php?c=insControlEmpl&a=inicio&type=sucursal&q=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                contenedorSugerenciasSucursal.innerHTML = ''; // Limpia las sugerencias previas

                if (data.length > 0) {
                    data.forEach(sucursal => {
                        const div = document.createElement('div');
                        div.textContent = sucursal.sucursales; // Mostrar razonSocial
                        div.addEventListener('click', () => {
                            inputIdSucursal.value = sucursal.id_sucursal; // Asignar id_sucursales al campo oculto
                            inputBusquedaSucursal.value = sucursal.sucursales; // Mostrar las sucursales en el input
                            contenedorSugerenciasSucursal.innerHTML = ''; // Limpiar sugerencias
                        });
                        contenedorSugerenciasSucursal.appendChild(div);
                    });
                } else {
                    contenedorSugerenciasSucursal.innerHTML = '<div>No se encontraron resultados</div>';
                }
            })
            .catch(error => console.error('Error al realizar la consulta:', error));
    } else {
        contenedorSugerenciasSucursal.innerHTML = ''; // Limpiar sugerencias si no hay suficientes caracteres
    }
});

document.addEventListener('click', (event) => {
    const isClickInsideInput = inputBusquedaSucursal.contains(event.target);
    const isClickInsideSugerencias = contenedorSugerenciasSucursal.contains(event.target);

    if (!isClickInsideInput && !isClickInsideSugerencias) {
        contenedorSugerenciasSucursal.innerHTML = ''; // Limpiar sugerencias
    }
});
