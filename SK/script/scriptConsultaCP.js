const contenedorSugerenciasCP = document.getElementById('sugerenciasCP');
const inputIdCP = document.getElementById('idCP'); // Campo oculto
const inputBusquedaCP = document.getElementById('busquedaCP');
const buscarCPBtn = document.getElementById('buscarCPBtn'); // El botón de búsqueda

buscarCPBtn.addEventListener('click', function () { // Uso del ID correcto
    const query = inputBusquedaCP.value.trim();

    if (query.length >= 2) { // Realizar la búsqueda si hay al menos 2 caracteres
        fetch(`index.php?c=insControlEmpl&a=inicio&type=codigoP&q=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                contenedorSugerenciasCP.innerHTML = ''; // Limpia las sugerencias previas

                if (data.length > 0) {
                    data.forEach(CP => {
                        const div = document.createElement('div');
                        div.textContent = CP.numCodPostal; // Mostrar el día de descanso, no "descanso"
                        div.addEventListener('click', () => {
                            inputIdCP.value = CP.id_codigoP; // Asignar id_descanso al campo oculto
                            inputBusquedaCP.value = CP.numCodPostal; // Mostrar el diaDescanso en el input
                            contenedorSugerenciasCP.innerHTML = ''; // Limpiar sugerencias
                        });
                        contenedorSugerenciasCP.appendChild(div);
                    });
                } else {
                    contenedorSugerenciasCP.innerHTML = '<div>No se encontraron resultados</div>';
                }
            })
            .catch(error => console.error('Error al realizar la consulta:', error));
    } else {
        contenedorSugerenciasCP.innerHTML = ''; // Limpiar sugerencias si no hay suficientes caracteres
    }
});

document.addEventListener('click', (event) => {
    const isClickInsideInput = inputBusquedaCP.contains(event.target);
    const isClickInsideSugerencias = contenedorSugerenciasCP.contains(event.target);

    if (!isClickInsideInput && !isClickInsideSugerencias) {
        contenedorSugerenciasCP.innerHTML = ''; // Limpiar sugerencias
    }
});
