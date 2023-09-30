const buscarArticulos = () => {
    let nombre = document.getElementById("nombre").value;
    location.href = "index.php?articulosbyname&nombre=" + nombre;
}

const filtrarArticulos = () => {
    let precioMin = document.getElementById("precioMin").value;
    let precioMax = document.getElementById("precioMax").value;

    precioMin = precioMin ? precioMin : 500;
    precioMax = precioMax ? precioMax : 10000;

    location.href = "index.php?articulosbyrange&precioMin=" + precioMin + "&precioMax=" + precioMax;
}

document.getElementById("btnBuscar").addEventListener("click", buscarArticulos);
document.getElementById("btnFiltrar").addEventListener("click", filtrarArticulos);