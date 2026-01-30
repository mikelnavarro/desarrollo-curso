
// Referencias
let listaCars = document.getElementById("cars");
// Consumir la API

async function cargar() {

    try {
        
        const response = await fetch("/api/cars");

        // Convertimos los datos json en el array
        const datos = await response.json();

        // Llamar a la galería
        renderGallery(datos);
    } catch (e) {
        // Si cometemos un error
        console.error("Error: ", e);
    }
    
}
function renderGallery(datos) {
    listaCars.innerHTML = " ";
    datos.array.forEach(car => {
        const div = document.createElement('div');
        const brand = document.createElement('h4');
        

        brand.textContent = car.brand;
        div.appendChild(brand);
        listaCars.appendChild(div);
    });
}
cargar();