function listar_marca() {
    $.ajax({
      url: "controlador/listar_marca.php",
      type: "POST",
    }).done(function (resp) {
      let data = JSON.parse(resp);
      let cadena = "";
  
      if (data.length > 0) {
        for (let i = 0; i < data.length; i++) {
    
          cadena += "<option value=" + data[i]["id_marca"] +">" + data[i]["nombre_marca"] + "</option>";
        }
       
        $("#selMarca").html(cadena);
        let idmarca = $("#selMarca").val();

        listar_modelo(idmarca);
      } else {
        ("<option value=''>'No se encontraron registros'</option>");
        $("#selMarca").html(cadena);
      }
    });
  }
  
  function listar_modelo(idmarca) {
    $.ajax({
      url: "controlador/listar_modelo.php",
      type: "POST",
      data: {
        idmarca: idmarca,
      },
    }).done(function (resp) {
      let data = JSON.parse(resp);
  
      let cadena = "";
      if (data.length > 0) {
        for (let i = 0; i < data.length; i++) {
          cadena +=
            "<option value=" + data[i]["id_modelo"] + ">" + data[i]["num"] + "</option>";
        }
        $("#selModelo").html(cadena);
      } else {
        ("<option value=''>'No se encontraron registros'</option>");
        $("#selModelo").html(cadena);
      }
    });
  }
  