document.querySelector('btnSavePeli').addEventListener('click', savePeli);

function savePeli(){
    var sNombre = document.querySelector('#txtName').value,
        sPrecio = document.querySelector('#txtPrecio').value,
        sClasi = document.querySelector('#txtClasi').value,
        sAnio = document.querySelector('#txtAnio').value,
        sDirect = document.querySelector('#txtDirect').value,
        sActor = document.querySelector('#txtActor').value,
        sImg = document.querySelector('#txtImg').value,
        sDescripcion = document.querySelector('#txtDescripcion').value;

    addPeliculaToSystem(sNombre, sPrecio, sClasi, sAnio, sDirect, sActor, sImg, sDescripcion);

}
