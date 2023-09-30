const buscarUsuario = () => {
    let idUsuario = document.getElementById("idUsuario").value;

    location.href = idUsuario ? "index.php?usuariosbyid&id=" + idUsuario : "index.php?usuarios";
}

document.getElementById("btnBuscar").addEventListener("click", buscarUsuario);