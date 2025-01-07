const contenedorSugerenciasGenero = document.getElementById('sugerenciasGenero');
const inputIdGenero = document.getElementById('idGenero'); // Campo oculto
const inputBusquedaGenero = document.getElementById('busquedaGenero');
const buscarGeneroBtn = document.getElementById('buscarGeneroBtn'); // El botón de búsqueda

buscarGeneroBtn.addEventListener('click', function () { // Uso del ID correcto
    const query = inputBusquedaGenero.value.trim();

    if (query.length >= 1) { // Realizar la búsqueda si hay al menos 2 caracteres
        fetch(`index.php?c=insControlEmpl&a=inicio&type=genero&q=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                contenedorSugerenciasGenero.innerHTML = ''; // Limpia las sugerencias previas

                if (data.length > 0) {
                    data.forEach(genero => {
                        const div = document.createElement('div');
                        div.textContent = genero.genero; // Mostrar nombre del puesto
                        div.addEventListener('click', () => {
                            inputIdGenero.value = genero.id_genero; // Asignar id_puesto al campo oculto
                            inputBusquedaGenero.value = genero.genero; // Mostrar el puesto en el input
                            contenedorSugerenciasGenero.innerHTML = ''; // Limpiar sugerencias
                        });
                        contenedorSugerenciasGenero.appendChild(div);
                    });
                } else {
                    contenedorSugerenciasGenero.innerHTML = '<div>No se encontraron resultados</div>';
                }
            })
            .catch(error => console.error('Error al realizar la consulta:', error));
    } else {
        contenedorSugerenciasGenero.innerHTML = ''; // Limpiar sugerencias si no hay suficientes caracteres
    }
});

document.addEventListener('click', (event) => {
    const isClickInsideInput = inputBusquedaGenero.contains(event.target);
    const isClickInsideSugerencias = contenedorSugerenciasGenero.contains(event.target);

    if (!isClickInsideInput && !isClickInsideSugerencias) {
        contenedorSugerenciasGenero.innerHTML = ''; // Limpiar sugerencias
    }
});
