const contenedorSugerenciasSDI = document.getElementById('sugerenciasSDI');
const inputIdSDI = document.getElementById('idSDI'); // Campo oculto
const inputBusquedaSDI = document.getElementById('busquedaSDI');
const buscarSDIBtn = document.getElementById('buscarSDIBtn'); // El botón de búsqueda

buscarSDIBtn.addEventListener('click', function () { // Uso del ID correcto
    const query = inputBusquedaSDI.value.trim();

    if (query.length >= 2) { // Realizar la búsqueda si hay al menos 2 caracteres
        fetch(`index.php?c=insControlEmpl&a=inicio&type=consultaSDI&q=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                contenedorSugerenciasSDI.innerHTML = ''; // Limpia las sugerencias previas

                if (data.length > 0) {
                    data.forEach(SDI => {
                        const div = document.createElement('div');
                        div.textContent = SDI.SDI; // Mostrar el día de descanso, no "descanso"
                        div.addEventListener('click', () => {
                            inputIdSDI.value = SDI.id_salarioDiariointegrado; // Asignar id_descanso al campo oculto
                            inputBusquedaSDI.value = SDI.SDI; // Mostrar el diaDescanso en el input
                            contenedorSugerenciasSDI.innerHTML = ''; // Limpiar sugerencias
                        });
                        contenedorSugerenciasSDI.appendChild(div);
                    });
                } else {
                    contenedorSugerenciasSDI.innerHTML = '<div>No se encontraron resultados</div>';
                }
            })
            .catch(error => console.error('Error al realizar la consulta:', error));
    } else {
        contenedorSugerenciasSDI.innerHTML = ''; // Limpiar sugerencias si no hay suficientes caracteres
    }
});

document.addEventListener('click', (event) => {
    const isClickInsideInput = inputBusquedaSDI.contains(event.target);
    const isClickInsideSugerencias = contenedorSugerenciasSDI.contains(event.target);

    if (!isClickInsideInput && !isClickInsideSugerencias) {
        contenedorSugerenciasSDI.innerHTML = ''; // Limpiar sugerencias
    }
});
