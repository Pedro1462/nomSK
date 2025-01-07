const contenedorSugerenciasSDR = document.getElementById('sugerenciasSDR');
const inputIdSDR = document.getElementById('idSDR'); // Campo oculto
const inputBusquedaSDR = document.getElementById('busquedaSDR');
const buscarSDRBtn = document.getElementById('buscarSDRBtn'); // El botón de búsqueda

buscarSDRBtn.addEventListener('click', function () { // Uso del ID correcto
    const query = inputBusquedaSDR.value.trim();

    if (query.length >= 2) { // Realizar la búsqueda si hay al menos 2 caracteres
        fetch(`index.php?c=insControlEmpl&a=inicio&type=consultaSDR&q=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                contenedorSugerenciasSDR.innerHTML = ''; // Limpia las sugerencias previas

                if (data.length > 0) {
                    data.forEach(SDR => {
                        const div = document.createElement('div');
                        div.textContent = SDR.SDR; // Mostrar el día de descanso, no "descanso"
                        div.addEventListener('click', () => {
                            inputIdSDR.value = SDR.id_salarioDiarioreal; // Asignar id_descanso al campo oculto
                            inputBusquedaSDR.value = SDR.SDR; // Mostrar el diaDescanso en el input
                            contenedorSugerenciasSDR.innerHTML = ''; // Limpiar sugerencias
                        });
                        contenedorSugerenciasSDR.appendChild(div);
                    });
                } else {
                    contenedorSugerenciasSDR.innerHTML = '<div>No se encontraron resultados</div>';
                }
            })
            .catch(error => console.error('Error al realizar la consulta:', error));
    } else {
        contenedorSugerenciasSDR.innerHTML = ''; // Limpiar sugerencias si no hay suficientes caracteres
    }
});


document.addEventListener('click', (event) => {
    const isClickInsideInput = inputBusquedaSDR.contains(event.target);
    const isClickInsideSugerencias = contenedorSugerenciasSDR.contains(event.target);

    if (!isClickInsideInput && !isClickInsideSugerencias) {
        contenedorSugerenciasSDR.innerHTML = ''; // Limpiar sugerencias
    }
});