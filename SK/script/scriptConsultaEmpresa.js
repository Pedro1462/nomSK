const contenedorSugerenciasEmpresa = document.getElementById('sugerenciasEmpresa');
const inputIdEmpresa = document.getElementById('idEmpresa'); // Campo oculto
const inputBusquedaEmpresa = document.getElementById('busquedaEmpresa');
const buscarEmpresaBtn = document.getElementById('buscarEmpresaBtn'); // El botón de búsqueda

buscarEmpresaBtn.addEventListener('click', function () {
    const query = inputBusquedaEmpresa.value.trim();

    if (query.length >= 2) { // Realizar la búsqueda si hay al menos 2 caracteres
        fetch(`index.php?c=insControlEmpl&a=inicio&type=empresa&q=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                contenedorSugerenciasEmpresa.innerHTML = ''; // Limpia las sugerencias previas

                if (data.length > 0) {
                    data.forEach(empresa => {
                        const div = document.createElement('div');
                        div.textContent = empresa.razonSocial; // Mostrar razonSocial
                        div.addEventListener('click', () => {
                            inputIdEmpresa.value = empresa.id_empresas; // Asignar id_empresas al campo oculto
                            inputBusquedaEmpresa.value = empresa.razonSocial; // Mostrar razonSocial en el input
                            contenedorSugerenciasEmpresa.innerHTML = ''; // Limpiar sugerencias
                        });
                        contenedorSugerenciasEmpresa.appendChild(div);
                    });
                } else {
                    contenedorSugerenciasEmpresa.innerHTML = '<div>No se encontraron resultados</div>';
                }
            })
            .catch(error => console.error('Error al realizar la consulta:', error));
    } else {
        contenedorSugerenciasEmpresa.innerHTML = ''; // Limpiar sugerencias si no hay suficientes caracteres
    }
});

document.addEventListener('click', (event) => {
    const isClickInsideInput = inputBusquedaEmpresa.contains(event.target);
    const isClickInsideSugerencias = contenedorSugerenciasEmpresa.contains(event.target);

    if (!isClickInsideInput && !isClickInsideSugerencias) {
        contenedorSugerenciasEmpresa.innerHTML = ''; // Limpiar sugerencias
    }
});
