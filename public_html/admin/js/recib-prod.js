var listPeli = [];


function addPeliculaToSystem(adNombre, adPrecio, adClasi, adAnio, adDirect, adActor, adImg, adDescripcion){
    
    var newPeli = {
        name    : adNombre,
        precio  : adPrecio,
        clasif  : adClasi,
        anio    : adAnio,
        direct  : adDirect,
        actor   : adActor,
        img     : adImg,
        descrip : adDescripcion
    };
    console.log(newPeli);
    listPeli.push(newPeli);
}