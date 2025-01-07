const contenedorSugerenciasBV = document.getElementById('sugerenciasBV');
const inputIdBV = document.getElementById('idBV'); // Campo oculto
const inputBusquedaBV = document.getElementById('busquedaBV');
const buscarBVBtn = document.getElementById('buscarBVBtn'); // El botón de búsqueda

buscarBVBtn.addEventListener('click', function () { // Uso del ID correcto
    const query = inputBusquedaBV.value.trim();

    if (query.length >= 2) { // Realizar la búsqueda si hay al menos 2 caracteres
        fetch(`index.php?c=insControlEmpl&a=inicio&type=bonoVar&q=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                contenedorSugerenciasBV.innerHTML = ''; // Limpia las sugerencias previas

                if (data.length > 0) {
                    data.forEach(BV => {
                        const div = document.createElement('div');
                        div.textContent = BV.bonoDiarioVariable; // Mostrar el día de descanso, no "descanso"
                        div.addEventListener('click', () => {
                            inputIdBV.value = BV.id_bonoVariable; // Asignar id_descanso al campo oculto
                            inputBusquedaBV.value = BV.bonoDiarioVariable; // Mostrar el diaDescanso en el input
                            contenedorSugerenciasBV.innerHTML = ''; // Limpiar sugerencias
                        });
                        contenedorSugerenciasBV.appendChild(div);
                    });
                } else {
                    contenedorSugerenciasBV.innerHTML = '<div>No se encontraron resultados</div>';
                }
            })
            .catch(error => console.error('Error al realizar la consulta:', error));
    } else {
        contenedorSugerenciasBV.innerHTML = ''; // Limpiar sugerencias si no hay suficientes caracteres
    }
});

document.addEventListener('click', (event) => {
    const isClickInsideInput = inputBusquedaBV.contains(event.target);
    const isClickInsideSugerencias = contenedorSugerenciasBV.contains(event.target);

    if (!isClickInsideInput && !isClickInsideSugerencias) {
        contenedorSugerenciasBV.innerHTML = ''; // Limpiar sugerencias
    }
});
