//Esto es para generar las cards que iran en el carrsel comforme a los datos en la tabla
document.addEventListener('DOMContentLoaded', function () {
    fetch('conn.php')
    .then(response => response.json()) // Asegurarse de que la respuesta es JSON
    .then(data => {
        const carouselInner = document.getElementById('carousel-inner');
        carouselInner.innerHTML = "";
        if (data.length > 0) {
            data.forEach((personaje, index) => {
                const card = //Todo lo que sigue es la estructura para que genere las slides y las cards correspondientes segun los datos en la tabla
                    `
                    <div class="carousel-item ${index === 0 ? 'active' : ''}">
                        <div class="d-flex justify-content-center">
                            <div class="card">
                                ${personaje.imagen ? `<img src="data:image/png;base64,${personaje.imagen}" class="img" alt="${personaje.nombre}">` : ''}
                                <div class="card-body">
                                    <h3 class="card-title">${personaje.nombre}</h3>
                                    <p class="card-text">Rareza: ${personaje.rareza}</p>
                                    <p class="card-text">Vía: ${personaje.via}</p>
                                    <p class="card-text">Elemento: ${personaje.elemento}</p>
                                    <p class="card-text">Eidolons: ${personaje.eidolons}</p>
                                    <p class="card-text">Id: ${personaje.id_personaje}</p>
                                    <br>
                                    <button class="trailer">
                                        <a class="video" href="${personaje.link_trailer}" target="_blank">Trailer</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>`;
                carouselInner.innerHTML += card;
            });
        } else {
            carouselInner.innerHTML = '<div class="carousel-item active"><p>No hay personajes disponibles.</p></div>';
        }
    })
    .catch(error => {
        console.error("Error en la solicitud:", error);
        document.getElementById('carousel-inner').innerHTML = '<div class="carousel-item active"><p>Error al cargar los datos.</p></div>';
    });
});