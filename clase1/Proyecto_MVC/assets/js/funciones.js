const filtrarProductos = () => {
    let nombre = document.getElementById("nombre").value;
    location.href = nombre ? "?filtrar=" + nombre : "?productos=true";
}

document.getElementById("btnFiltrar").addEventListener("click", filtrarProductos);