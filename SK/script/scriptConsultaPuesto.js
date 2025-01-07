const contenedorSugerenciasPuesto = document.getElementById('sugerenciasPuesto');
const inputIdPuesto = document.getElementById('idPuesto'); // Campo oculto
const inputBusquedaPuesto = document.getElementById('busquedaPuesto');
const buscarPuestoBtn = document.getElementById('buscarPuestoBtn'); // El botón de búsqueda

buscarPuestoBtn.addEventListener('click', function () { // Uso del ID correcto
    const query = inputBusquedaPuesto.value.trim();

    if (query.length >= 2) { // Realizar la búsqueda si hay al menos 2 caracteres
        fetch(`index.php?c=insControlEmpl&a=inicio&type=puesto&q=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                contenedorSugerenciasPuesto.innerHTML = ''; // Limpia las sugerencias previas

                if (data.length > 0) {
                    data.forEach(puesto => {
                        const div = document.createElement('div');
                        div.textContent = puesto.puesto; // Mostrar nombre del puesto
                        div.addEventListener('click', () => {
                            inputIdPuesto.value = puesto.id_puesto; // Asignar id_puesto al campo oculto
                            inputBusquedaPuesto.value = puesto.puesto; // Mostrar el puesto en el input
                            contenedorSugerenciasPuesto.innerHTML = ''; // Limpiar sugerencias
                        });
                        contenedorSugerenciasPuesto.appendChild(div);
                    });
                } else {
                    contenedorSugerenciasPuesto.innerHTML = '<div>No se encontraron resultados</div>';
                }
            })
            .catch(error => console.error('Error al realizar la consulta:', error));
    } else {
        contenedorSugerenciasPuesto.innerHTML = ''; // Limpiar sugerencias si no hay suficientes caracteres
    }
});

document.addEventListener('click', (event) => {
    const isClickInsideInput = inputBusquedaPuesto.contains(event.target);
    const isClickInsideSugerencias = contenedorSugerenciasPuesto.contains(event.target);

    if (!isClickInsideInput && !isClickInsideSugerencias) {
        contenedorSugerenciasPuesto.innerHTML = ''; // Limpiar sugerencias
    }
});
