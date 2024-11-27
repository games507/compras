function openModal(no_compra) {
    const modal = document.getElementById('myModal');
    fetch('obtener_detalles.php?no_compra=' + encodeURIComponent(no_compra))
        .then(response => response.json())
        .then(data => {
            if (data) {
                let details = `
                    <div class="field"><strong>No Compra Menor:</strong> ${data.no_compra}</div>
                    <div class="field"><strong>Tipo de Procedimiento:</strong> ${data.tipo_procedimiento}</div>
                    <div class="field"><strong>Objeto Contractual:</strong> ${data.objeto_contractual}</div>
                    <div class="field"><strong>Descripción:</strong> ${data.descripcion}</div>
                    <div class="field"><strong>Fecha de Publicación:</strong> ${data.fecha_publicacion}</div>
                    <div class="field"><strong>Estado:</strong> ${data.estado}</div>
                    <div class="field"><strong>Pliego de Cargos:</strong> <a href="${data.pliego_cargos}" target="_blank">Ver Archivo</a></div>
                    <div class="field"><strong>Aviso de Convocatoria:</strong> <a href="${data.aviso_convocatoria}" target="_blank">Ver Archivo</a></div>
                `;
                document.getElementById('modalDetails').innerHTML = details;
                modal.style.display = "block";
            }
        })
        .catch(error => console.error('Error:', error));
}
