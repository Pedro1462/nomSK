const contenedorSugerenciasFormaPago = document.getElementById('sugerenciasFormaPago');
const inputIdFormaPago = document.getElementById('idFormaPago'); // Campo oculto
const inputBusquedaFormaPago = document.getElementById('busquedaFormaPago');
const buscarFormaPagoBtn = document.getElementById('buscarFormaPagoBtn'); // El botón de búsqueda

buscarFormaPagoBtn.addEventListener('click', function () { // Uso del ID correcto
    const query = inputBusquedaFormaPago.value.trim();

    if (query.length >= 2) { // Realizar la búsqueda si hay al menos 2 caracteres
        fetch(`index.php?c=insControlEmpl&a=inicio&type=formaPago&q=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                contenedorSugerenciasFormaPago.innerHTML = ''; // Limpia las sugerencias previas

                if (data.length > 0) {
                    data.forEach(formapago => {
                        const div = document.createElement('div');
                        div.textContent = formapago.tipoPago; // Mostrar el día de descanso, no "descanso"
                        div.addEventListener('click', () => {
                            inputIdFormaPago.value = formapago.id_formaPago; // Asignar id_descanso al campo oculto
                            inputBusquedaFormaPago.value = formapago.tipoPago; // Mostrar el diaDescanso en el input
                            contenedorSugerenciasFormaPago.innerHTML = ''; // Limpiar sugerencias
                        });
                        contenedorSugerenciasFormaPago.appendChild(div);
                    });
                } else {
                    contenedorSugerenciasFormaPago.innerHTML = '<div>No se encontraron resultados</div>';
                }
            })
            .catch(error => console.error('Error al realizar la consulta:', error));
    } else {
        contenedorSugerenciasFormaPago.innerHTML = ''; // Limpiar sugerencias si no hay suficientes caracteres
    }
});


document.addEventListener('click', (event) => {
    const isClickInsideInput = inputBusquedaFormaPago.contains(event.target);
    const isClickInsideSugerencias = contenedorSugerenciasFormaPago.contains(event.target);

    if (!isClickInsideInput && !isClickInsideSugerencias) {
        contenedorSugerenciasFormaPago.innerHTML = ''; // Limpiar sugerencias
    }
});