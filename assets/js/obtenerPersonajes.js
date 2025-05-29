const obtenerPersonajes = async () => {
    const url = 'http://localhost/Pol-Stranger-Things/assets/json/personajes.json';
    const response = await fetch(url);
    const data = await response.json();
    setInHTML(data.personajes);
}

const setInHTML = (personajes) => {
    const container = document.querySelector('#container-personajes');
    container.innerHTML = personajes.map((personaje) => {
        return `
            <article class="row mt-4">
                <div class="col-2 text-center">
                    <img src="../assets/images/${personaje.imagen}" alt="" class="w-100 rounded">
                    <h5>
                    ${personaje.nombre}
                    <small>${personaje.personaje}</small>
                    </h5>
                </div>
                <div class="col-10">
                    <div class="row">
                    <div class="d-flex">
                        <h5 class="me-3">Edad: ${personaje.edad}</h5>
                        <h5 class="me-3">Temporadas: ${personaje.temporadas}</h5>
                        <h5 class="me-3">Genero: ${personaje.genero}</h5>
                        <h5 class="me-3">Rol: ${personaje.rol}</h5>
                    </div>
                    <p class="col-12">${personaje.descripcion}</p>
                    </div>
                </div>
            </article>
        `;
    }).join('');
}

obtenerPersonajes();