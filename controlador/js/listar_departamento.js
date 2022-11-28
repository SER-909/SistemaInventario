function listar_empresa() {
  $.ajax({
    url: "controlador/listarEmpresa.php",
    type: "POST",
  }).done(function (resp) {
    let data = JSON.parse(resp);
    let cadena = "";

    if (data.length > 0) {
      for (let i = 0; i < data.length; i++) {
  
        cadena += "<option value=" + data[i]["id_empresa"] +">" + data[i]["nombre_empresa"] + "</option>";
      }
      $("#selEmpresa").html(cadena);
      let idempresa = $("#selEmpresa").val();

      listar_departamento(idempresa);
    } else {
      ("<option value=''>'No se encontraron registros'</option>");
      $("#selEmpresa").html(cadena);
    }
  });
}

function listar_departamento(idempresa) {
  $.ajax({
    url: "controlador/listarDepartamento.php",
    type: "POST",
    data: {
      idempresa: idempresa,
    },
  }).done(function (resp) {
    let data = JSON.parse(resp);

    let cadena = "";
    if (data.length > 0) {
      for (let i = 0; i < data.length; i++) {
        cadena +=
          "<option value=" +
          data[i]["id_departamento"] +
          ">" +
          data[i]["nombre_departamento"] +
          "</option>";
      }
      $("#selDepartamento").html(cadena);
      let idDepartamento = $("#selDepartamento").val();
      listar_empleado(idDepartamento);
    } else {
      ("<option value=''>'No se encontraron registros'</option>");
      $("#selDepartamento").html(cadena);
    }
  });
}

function listar_empleado(idDepartamento) {
  $.ajax({
    url: "controlador/listarEmpleado.php",
    type: "POST",
    data: {
      idDepartamento: idDepartamento,
    },
  }).done(function (resp) {
    let data = JSON.parse(resp);

    let cadena = "";
    if (data.length > 0) {
      for (let i = 0; i < data.length; i++) {
        cadena +=
          "<option value=" +
          data[i]["id_empleado"] +
          ">" +
          data[i]["nombre_empleado"] +
          " " +
          data[i]["apellidoP_empleado"] +
          " " +
          data[i]["apellidoM_empleado"] +
          "</option>";
      }
      $("#selAsignacion").html(cadena);
    } else {
      ("<option value=''>'No se encontraron registros'</option>");
      $("#selAsignacion").html(cadena);
    }
  });
}
