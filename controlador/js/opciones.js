function (){
    let idTipo = document.getElementById('idTipo');
    let tipo = idTipo.value;

    console.log(tipo);

    if(tipo =='Laptop' || tipo == 'AIO'){
        let opciones = document.getElementsByClassName('monitor');

        for (const key in opciones) {
            if (Object.hasOwnProperty.call(opciones, key)) {
                opciones[key].value='N/A';         
                opciones[key].readonly=1;         
            }
        }

    }else{
        let opciones = document.getElementsByClassName('monitor');

        for (const key in opciones) {
            if (Object.hasOwnProperty.call(opciones, key)) {
                opciones[key].value='';                 
            }
        }
    }
}