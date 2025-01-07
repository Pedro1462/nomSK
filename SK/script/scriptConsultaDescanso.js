const contenedorSugerenciasDescanso = document.getElementById('sugerenciasDescanso');
const inputIdDescanso = document.getElementById('idDescanso'); // Campo oculto
const inputBusquedaDescanso = document.getElementById('busquedaDescanso');
const buscarDescansoBtn = document.getElementById('buscarDescansoBtn'); // El botón de búsqueda

buscarDescansoBtn.addEventListener('click', function () { // Uso del ID correcto
    const query = inputBusquedaDescanso.value.trim();

    if (query.length >= 2) { // Realizar la búsqueda si hay al menos 2 caracteres
        fetch(`index.php?c=insControlEmpl&a=inicio&type=descanso&q=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                contenedorSugerenciasDescanso.innerHTML = ''; // Limpia las sugerencias previas

                if (data.length > 0) {
                    data.forEach(descanso => {
                        const div = document.createElement('div');
                        div.textContent = descanso.diaDescanso; // Mostrar el día de descanso, no "descanso"
                        div.addEventListener('click', () => {
                            inputIdDescanso.value = descanso.id_descanso; // Asignar id_descanso al campo oculto
                            inputBusquedaDescanso.value = descanso.diaDescanso; // Mostrar el diaDescanso en el input
                            contenedorSugerenciasDescanso.innerHTML = ''; // Limpiar sugerencias
                        });
                        contenedorSugerenciasDescanso.appendChild(div);
                    });
                } else {
                    contenedorSugerenciasDescanso.innerHTML = '<div>No se encontraron resultados</div>';
                }
            })
            .catch(error => console.error('Error al realizar la consulta:', error));
    } else {
        contenedorSugerenciasDescanso.innerHTML = ''; // Limpiar sugerencias si no hay suficientes caracteres
    }
});


document.addEventListener('click', (event) => {
    const isClickInsideInput = inputBusquedaDescanso.contains(event.target);
    const isClickInsideSugerencias = contenedorSugerenciasDescanso.contains(event.target);

    if (!isClickInsideInput && !isClickInsideSugerencias) {
        contenedorSugerenciasDescanso.innerHTML = ''; // Limpiar sugerencias
    }
});