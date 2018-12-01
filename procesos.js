var periocidad;
$("#cmd").click(function() {
  var diaI = $("#fechamora").val();
  $("#fechamora").attr("type", "text");
  $("#fechamora").val(diaI);
  $(":button").css("display", "none");

  $(".con-radios").html(periocidad);


  html2canvas([document.getElementById("body")], {
    onrendered: function(canvas) {
      var img = canvas.toDataURL('image/png'); //o por 'image/jpeg'
      //display 64bit imag

      var doc = new jsPDF();
      doc.addImage(img, 0, 0, 210, 300);
      doc.save("Amortizacion.pdf");
      location.reload();
    }
  });
});

function format(input) {
  var num = input.value.replace(/\./g, '');
  if (!isNaN(num)) {
    num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
    num = num.split('').reverse().join('').replace(/^[\.]/, '');
    input.value = num;
  } else {
    alert('Solo se permiten numeros');
    input.value = input.value.replace(/[^\d\.]*/g, '');
  }
}

function tipo_prestamo(tipo) {
  if (tipo == 'fija') {
      $(".none").css("display", "none");
    document.getElementById('fija').classList.add("boton_activo");
    document.getElementById('muerto').classList.remove("boton_activo");
    display_block('cuota_fija');
    display_block('periocidad');
    display_block('tasainteres');

    display_none('periodo_muerto');
    display_none('bimestral');
    /*document.getElementById('cuota_fija').style.display = 'block';
    document.getElementById('periocidad').style.display = 'block';
    document.getElementById('tasainteres').style.display = 'block';

    document.getElementById('periodo_muerto').style.display = 'none';
    document.getElementById('bimestral').style.display = 'none';*/

  } else {
    //muerto
      $(".none").css("display", "none");
    document.getElementById('muerto').classList.add("boton_activo");
    document.getElementById('fija').classList.remove("boton_activo");
    display_block('periodo_muerto');
    display_block('tasainteres');
    display_block('bimestral');
    display_block('periocidad');
    display_none('cuota_fija');

    /*document.getElementById('periodo_muerto').style.display = 'block';
    document.getElementById('periocidad').style.display = 'block';
    document.getElementById('tasainteres').style.display = 'block';
    document.getElementById('cuota_fija').style.display = 'none';
    document.getElementById('bimestral').style.display = 'block';*/
  }
}

function display_none(id) {
  document.getElementById(id).style.display = 'none';
}

function display_block(id) {
    document.getElementById(id).style.display = 'block';
}


var valor;
var dias;
var meses;

function visualizar_tasa(va){
  valor = va;
  if (va == 12) {
    dias = 30;
    meses = 1;
    periocidad = "Mensual";
  } else if (va == 4) {
    dias = 120;
    meses = 3;
    periocidad = "Trimestral";
  } else if (va == 6) {
    dias = 60;
    meses = 2;
    periocidad = "Bimestal";
  }
}

function calc_efectiva(dato) {
  if (dias == undefined) {
    alert('Por favor seleccione una periocidad');
  } else {
    var valPorcen = (dato) / 100;
    var ipV = (Math.pow((1 + valPorcen), (dias / 360)));
    var ip = (ipV - 1) * 100;
    var inf = ip.toFixed(3);
    var Na = inf * valor;
    $("#periodica").val(ip.toFixed(2));
    $("#nominal").val(Na.toFixed(2));
  }
}

function calc_nominal(dato) {
  if (dias == undefined) {
    alert('Por favor seleccione una periocidad');
  } else {
    var ip = ((dato) / valor);
    var ips = (ip) / 100;
    var ipV = (Math.pow((1 + ips), (360 / dias)));
    var val = (ipV - 1) * 100;
    $("#periodica").val(ip.toFixed(2));
    $("#efectiva").val(val.toFixed(2));
  }
}

function calc_periodica(dato) {
  if (dias == undefined) {
    alert('Por favor seleccione una periocidad');
  } else {
    var ip = ((dato) * valor);
    var ips = (dato) / 100;
    var ipV = (Math.pow((1 + ips), (360 / dias)));
    var val = (ipV - 1) * 100;
    $("#nominal").val(ip.toFixed(2));
    $("#efectiva").val(val.toFixed(2));
  }
}


var fullDate = new Date()
var twoDigitMonth = ((fullDate.getMonth().length + 1) === 1) ? (fullDate.getMonth() + 1) : '0' + (fullDate.getMonth() + 1);
var fecha = fullDate.getDate() + "/" + twoDigitMonth + "/" + fullDate.getFullYear();

sumaFecha = function(d, fecha) {
  var Fecha = new Date();
  var sFecha = fecha || (Fecha.getDate() + "/" + (Fecha.getMonth() + 1) + "/" + Fecha.getFullYear());
  var sep = sFecha.indexOf('/') != -1 ? '/' : '-';
  var aFecha = sFecha.split(sep);
  var fecha = aFecha[2] + '/' + aFecha[1] + '/' + aFecha[0];
  fecha = new Date(fecha);
  fecha.setMonth(fecha.getMonth() + parseInt(d));
  var anno = fecha.getFullYear();
  var mes = fecha.getMonth() + 1;
  var dia = fecha.getDate();
  mes = (mes < 10) ? ("0" + mes) : mes;
  dia = (dia < 10) ? ("0" + dia) : dia;
  var fechaFinal = dia + sep + mes + sep + anno;
  return (fechaFinal);
}

restaFechas = function(f1, f2) {
  var aFecha1 = f1.split('/');
  var aFecha2 = f2.split('/');
  var fFecha1 = Date.UTC(aFecha1[2], aFecha1[1] - 1, aFecha1[0]);
  var fFecha2 = Date.UTC(aFecha2[2], aFecha2[1] - 1, aFecha2[0]);
  var dif = fFecha2 - fFecha1;
  var dias = Math.floor(dif / (1000 * 60 * 60 * 24));
  return dias;
}

FormatoFecha = function(fechass) {
  var Fec = new Date();
  var fechasM = fechass || (Fec.getDate() + "/" + (Fec.getMonth() + 1) + "/" + Fec.getFullYear());
  var sepM = fechasM.indexOf('/') != -1 ? '/' : '-';
  var mFechas = fechasM.split(sepM);
  var fechaM = mFechas[2] + '-' + mFechas[1] + '-' + mFechas[0];
  return fechaM;
}

FormatoFechaResta = function(fechass) {
  var Fec = new Date();
  var fechasM = fechass || (Fec.getDate() + "/" + (Fec.getMonth() + 1) + "/" + Fec.getFullYear());
  var sepM = fechasM.indexOf('/') != -1 ? '/' : '-';
  var mFechas = fechasM.split(sepM);
  var fechaM = mFechas[2] + '/' + mFechas[1] + '/' + mFechas[0];
  return fechaM;
}

puntos = function(val) {
  var infor = val.replace(/\D/g, "");

  var inf = infor.replace(/([0-9])([0-9]{2})$/, '$1,$2');
  inf = inf.replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");

  return inf;
}


function calcular_tabla(){
  var ac = document.getElementsByClassName('boton_activo');
  if(ac[0] != undefined){
    var v = validar_lleno();
    if(ac[0].id == 'fija'){
      v == 1 ? cal_cuota_fija() : '';
    }else{
      v == 1 ? cal_cuota_muerta() : '';
    }
  }else{
    alert('Por favor seleccione una de las opciones');
  }
}

function validar_lleno(){
  var f = document.getElementsByTagName('input');
  for(var i=0; i <= 2; i++){
    if(f[i].value == ''){
      alert('El campo '+f[i].name+' esta vacio');
      return 0;
    } else {
      return 1;
    }
  }
}

function cal_cuota_fija(){
  $(".none").css("display", "block");
  plazo = $("#plazo_f").val();
  var prestamos = ($("#prestamo").val().replace(/\D/g, "")) * 1;
  cuotas = valor * plazo;
  ipAr = ($("#periodica").val() / 100);
  var Aelevado = (Math.pow((1 + ipAr), cuotas));
  var amortizacion = prestamos * ((Aelevado * ipAr) / (Aelevado - 1));
  console.log(amortizacion);
  var tabla = new Array();
  var interes = prestamos * ipAr;
  var amortizacionCapital = amortizacion - interes;
  var fechas_Amort = fecha;
  for (var i = 0; i < cuotas + 1; i++) {

    sumaFecha(meses, fecha);

    if (i == 0) {
      var data = {
        fechas: fecha,
        saldoCapital: prestamos,
        CuotaFija: 0,
        AmortizacionC: 0,
        AmortizacionIntres: 0,
        FujoCaja: prestamos
      };
      tabla[i] = data;
      console.log(data);
      var saldoC = puntos(tabla[i]["saldoCapital"].toFixed(2));
      var cuotaF = puntos(tabla[i]["CuotaFija"].toFixed(2));
      var AmorC = puntos(tabla[i]["AmortizacionC"].toFixed(2));
      var AmorI = puntos(tabla[i]["AmortizacionIntres"].toFixed(2));
      var FujoC = puntos(tabla[i]["FujoCaja"].toFixed(2));
      $("#informacion").append("<tr><td>" + i + "</td><td>" + tabla[i]["fechas"] + "</td><td>" + saldoC + "</td><td>" + cuotaF + "</td><td>" + AmorC + "</td><td>" + AmorI + "</td><td>" + FujoC + "</td></tr>");
    } else {

      interes = prestamos * ipAr;
      amortizacionCapital = amortizacion - interes;
      prestamos = prestamos - amortizacionCapital;
      var fechas_Amort = sumaFecha(meses, fechas_Amort);

      var data = {
        fechas: fechas_Amort,
        saldoCapital: prestamos,
        CuotaFija: amortizacion,
        AmortizacionC: amortizacionCapital,
        AmortizacionIntres: interes,
        FujoCaja: amortizacion
      };
      tabla[i] = data;
      //console.log(data);
      var saldoC = puntos(tabla[i]["saldoCapital"].toFixed(2));
      var cuotaF = puntos(tabla[i]["CuotaFija"].toFixed(2));
      var AmorC = puntos(tabla[i]["AmortizacionC"].toFixed(2));
      var AmorI = puntos(tabla[i]["AmortizacionIntres"].toFixed(2));
      var FujoC = puntos(tabla[i]["FujoCaja"].toFixed(2));
      $("#informacion").append("<tr><td>" + i + "</td><td>" + tabla[i]["fechas"] + "</td><td>" + saldoC + "</td><td>" + cuotaF + "</td><td>" + AmorC + "</td><td>" + AmorI + "</td><td>" + FujoC + "</td></tr>");
    }


  }
}

function cal_cuota_muerta(){
  $(".none").css("display", "block");
  plazo = $("#plazo_m").val();
  console.log('--',plazo)
  var prestamos = ($("#prestamo").val().replace(/\D/g, "")) * 1;
  cuotas = valor * plazo;
  ipAr = ($("#periodica").val() / 100);
  var Aelevado = (Math.pow((1 + ipAr), cuotas));
  var amortizacion = prestamos * ((Aelevado * ipAr) / (Aelevado - 1));
  var tabla = new Array();
  var interes = prestamos * ipAr;
  var amortizacionCapital = amortizacion - interes;
  var fechas_Amort = fecha;
  var fe=0;

  for (var i = 0; i < cuotas + 1; i++) {
    dt1 = new Date(sumaFecha(meses, fe));
    dt2 = new Date(fecha);
    sumaFecha(meses, fecha);
    if (i == 0) {
      var data = {
        fechas: fecha,
        saldoCapital: prestamos,
        CuotaFija: 0,
        AmortizacionC: 0,
        AmortizacionIntres: 0,
        FujoCaja: prestamos
      };
      tabla[i] = data;
      var saldoC = puntos(tabla[i]["saldoCapital"].toFixed(2));
      var cuotaF = puntos(tabla[i]["CuotaFija"].toFixed(2));
      var AmorC = puntos(tabla[i]["AmortizacionC"].toFixed(2));
      var AmorI = puntos(tabla[i]["AmortizacionIntres"].toFixed(2));
      var FujoC = puntos(tabla[i]["FujoCaja"].toFixed(2));
      $("#informacion").append("<tr><td>" + i + "</td><td>" + tabla[i]["fechas"] + "</td><td>" + saldoC + "</td><td>" + cuotaF + "</td><td>" + AmorC + "</td><td>" + AmorI + "</td><td>" + FujoC + "</td></tr>");

    } else if(diff_years(dt1, dt2) <= 3){
      fe = sumaFecha(meses, fe);
      var a = sumaFecha(meses, fe);
      var b = fecha;
      interes = prestamos * ipAr;
      amortizacionCapital = amortizacion - interes;
      prestamos = prestamos + interes;
      var data = {
        fechas: fe,
        saldoCapital: prestamos,
        CuotaFija: 0,
        AmortizacionC: 0,
        AmortizacionIntres: interes,
        FujoCaja: 0
      };
      tabla[i] = data;
      var saldoC = puntos(tabla[i]["saldoCapital"].toFixed(2));
      var cuotaF = puntos(tabla[i]["CuotaFija"].toFixed(2));
      var AmorC = puntos(tabla[i]["AmortizacionC"].toFixed(2));
      var AmorI = puntos(tabla[i]["AmortizacionIntres"].toFixed(2));
      var FujoC = puntos(tabla[i]["FujoCaja"].toFixed(2));
      $("#informacion").append("<tr><td>" + i + "</td><td>" + tabla[i]["fechas"] + "</td><td>" + saldoC + "</td><td>" + cuotaF + "</td><td>" + AmorC + "</td><td>" + AmorI + "</td><td>" + FujoC + "</td></tr>");
    }else{

      interes = prestamos * ipAr;
      amortizacionCapital = amortizacion - interes;
      prestamos = prestamos - amortizacionCapital;
      fe = sumaFecha(meses, fe);
      var data = {
        fechas: fe,
        saldoCapital: prestamos,
        CuotaFija: amortizacion,
        AmortizacionC: amortizacionCapital,
        AmortizacionIntres: interes,
        FujoCaja: amortizacion
      };
      tabla[i] = data;
      //console.log(data);
      var saldoC = puntos(tabla[i]["saldoCapital"].toFixed(2));
      var cuotaF = puntos(tabla[i]["CuotaFija"].toFixed(2));
      var AmorC = puntos(tabla[i]["AmortizacionC"].toFixed(2));
      var AmorI = puntos(tabla[i]["AmortizacionIntres"].toFixed(2));
      var FujoC = puntos(tabla[i]["FujoCaja"].toFixed(2));
      $("#informacion").append("<tr><td>" + i + "</td><td>" + tabla[i]["fechas"] + "</td><td>" + saldoC + "</td><td>" + cuotaF + "</td><td>" + AmorC + "</td><td>" + AmorI + "</td><td>" + FujoC + "</td></tr>");
    }
  }
}


function diff_years(dt2, dt1){
  var diff =(dt2.getTime() - dt1.getTime()) / 1000;
   diff /= (60 * 60 * 24);
  return Math.abs(Math.round(diff/365.25));
 }
