function abrirModal() {

}

function agregarProducto() {
    let nombre = document.getElementById("nombre").value;
    let descripcion = document.getElementById("descripcion").value;
    let precio = document.getElementById("precio").value;
    let imagen = document.getElementById("imagen").value;
    const datos = {nombre, descripcion, precio, imagen};
    
    fetch('/mcdonalds', {
        method:"post",
        headers: {"Content-type": "application/json; charset=UTF-8"},
        body: JSON.stringify(datos)
    })
    .then(response => response.json())
    .then(data => {
        if (data.status == "ok") {
            document.getElementById("resultado").innerHTML = `<div class="alert alert-success" role="alert">${data.message}</div>`;
        } else {
            document.getElementById("resultado").innerHTML = `<div class="alert alert-danger" role="alert">${data.message}</div>`;
        }
    })
}

function eliminarProducto(id) {
    fetch('/mcdonalds/' + id, {
        method:"delete"
    })
    .then(response => response.json())
    .then(data => {
        if (data.status == "ok") {
            document.getElementById("resultadoEliminacion").innerHTML = `<div class="alert alert-success" role="alert">${data.message}</div>`;
        } else {
            document.getElementById("resultadoEliminacion").innerHTML = `<div class="alert alert-danger" role="alert">${data.message}</div>`;
        }
    })

}