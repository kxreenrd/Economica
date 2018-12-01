<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="theme/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="theme/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="theme/js/jspdf.min.js"></script>
	<script type="text/javascript" src="theme/js/html2canvas.min.js"></script>
	<script type="text/javascript" src="theme/js/html2canvas.js"></script>
	<link rel="stylesheet" type="text/css" href="theme/css/bootstrap.min.css">
</head>
<style type="text/css">
.container {
	background: #f6f6f6;
}
	.texto{
		text-align: center;
	}
	input[type="text"],input[type="num"]{
		border:0px;
		border-bottom: 2px solid #f1f1f1;
		outline:0px;
	}
	.row{
		padding: 2%;
	}
	.right label{
		text-align: center;
	}

	.con-radios .col-12{
		margin: auto;
	}
	.borde{
		border-radius: 2px;
		margin-bottom: 3%;
		padding: 2%;
		background: #fff;
		box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);
		 
	}
	.height{
		height:260px;
	}
	.padding{
		padding: 3%;
	}
	.margin{
		margin-bottom: 3%;
	}
	#informacion,#informacionMora{
    overflow: hidden;
    text-align: center;
    background: #fff;

	}
	#informacion td{
		width: 14%
	}
	table tr, table td{
		border: 1px solid rgba(0,0,0,0.3);
	}
	.none,.noneM,.hiddenPDF{
		display: none;
	}
	input[type="button"], button{
		margin:auto;
		border: 0px;
		background: #68c0ff;
		padding: 10px;
		color: #fff;
		border-radius: 5px;
		box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.4);
		width: 50%;
	}
	#Liquidacion{
		margin: auto 25%;
	}
	h3{
		color: #68c0ff;
	}
	header{
		margin-bottom: 15px;
		box-shadow: 0px 1px 5px 0px rgba(0,0,0,0.3);
	}
	.logo{
		background: #68c0ff;

	}
	.loo{
		text-align: right;
	}
	.logo .loo img{
		max-width: 100px;
		height: auto;
	}
	.loo_text{
		margin:auto;
	}
	.logo{
		padding: 10px;
		color: #fff;
	}
</style>
<body id="body">
<header class="container-fluid">
<div class="row logo">
	<div class="col-4 loo"><img src="theme/img/logo.png"></div><div class="col-8 loo_text"><h1>Entidad Financiera el arruinado</h1></div>
</div>
</header>
<div class="container">
		<div class="row">
			
		</div>
		<form class="row">
			<div class="col-12">	
					<h3>Datos personales</h3>
			</div>
		<div class="col-6">
		<div class="borde">	
			<div class="row right">
				<label for="#nombre" id="nombre_text" class="col-4 texto">Nombre del Cliente</label>
				<div class="col-8">
					<input type="text" name="nombre" id="nombre"  class="col-12" >
				</div>
				
			</div>
			<div class="row right">
				<label for="#prestamo" id="prestamo_text" class="col-4 texto">Valor del prestamo</label>
				<div class="col-8">
					<input type="text" name="prestamo" id="prestamo" class="col-12">
				</div>
			</div>
		</div>
		<div class="col-12">	
					<h3>Periocidad</h3>
			</div>
		<div class="borde height">	
			<div class="row periodos">
		
				<div class="col-2"></div>
				<div class="col-10 con-radios" id="perio">
					<div class="col-12 padding margin">
						<label class="col-3">Mensual</label><input type="radio" name="Mensual" id="check-1" class="check col-4" value="12">
					</div>
					<div class="col-12 padding margin">
						<label class="col-3">Trimestral</label><input type="radio" name="Trimestral" id="check-2" class="check col-4" value="4">
					</div>
					<div class="col-12 padding margin">
						<label class="col-3">Semestral</label><input type="radio" name="Semestral" id="check-3" class="check col-4" value="2">
					</div>
				
				</div>
			</div>
		</div>
		</div>
			<div class="col-6">
			<div class="borde">
			<div class="row right">
				<label for="#cedula" id="cedula_text" class="col-4 texto">Cedula</label>
				<div class="col-8">
					<input type="text" name="cedula" id="cedula" class="col-12">
				</div>
			</div>
			<div class="row right">
				<label for="#plazo" id="plazo_text" class="col-4 texto">Plazo</label>
				<div class="col-8">
					<select name="plazo" id="plazo" class="col-12">
						<option value="1">1 años</option>
						<option value="2">2 años</option>
						<option value="3">3 años</option>
						<option value="4">4 años</option>
						<option value="5">5 años</option>
						<option value="6">6 años</option>
					</select>
				</div>
			</div>
			</div>
				<div class="col-12">	
					<h3>Tasa de interes</h3>
			</div>
			<div class="borde height">
			<div class="row">
				
				<div class="col-12 interes">
					<div class="row">
						<label class="col-6">Efectiva Anual</label><input type="num" name="efectiva" class="col-3" id="efectiva"><p class="col-1">%</p>
					</div>
					<div class="row">
						<label class="col-6">Nominal Anual</label><input type="num" name="nominal" class="col-3" id="nominal"><p class="col-1">%</p>
					</div>
					<div class="row">
						<label class="col-6">Periodica Vencida</label><input type="num" name="periodica" class="col-3" id="periodica"><p class="col-1">%</p>
					</div>
					<div id="texto"></div>
				</div>
			</div>
			</div>
		</div>
				<input type="button" name="" id="button" value="Calcular">
		</form>
		<div class="row none">
			<div class="col-12">	
					<h3>Cuadro de Amortizacion Cuota Fija</h3>
			</div>
		<table id="informacion" class="col-12">
			<tr>
				<td>#</td><td>Fecha</td><td>Saldo a Capital</td><td>Cuota Fija</td><td>Amortizacion a Capital</td><td>Amortizacion Interes</td><td>Flujo de Caja</td>
			</tr>
		</table>
		</div>
		<div class="row none">
			<div class="col-12">	
					<h3>Liquidacion Intereses de Mora</h3>
			</div>
			<div class="col-12">
				<div class="row borde">
					<div class="col-2">
						<label class="col-12">Cuota</label>
						<input  class="col-12" type="text" name="cuotamora" id="cuotamora">
					</div>
					<div class="col-3">
						<label class="col-12" >Fecha de pago</label>
						<input  class="col-12" type="date" name="fechamora" id="fechamora">
					</div>
					<div class="col-2">
						<label class="col-12" >Dias de Mora</label>
						<input  class="col-12" type="text" name="diasmora" disabled="disabled" id="diasmora">
					</div>
					<div class="col-2">
						<label class="col-12" >Tasa de Usura</label>
						<input  class="col-12" type="text" name="" value="30.66" disabled="disabled" id="tasaU">
					</div>
					<div class="col-3">
						<label class="col-12" >Interes Periodico</label>
						<input  class="col-12" type="text" name="" disabled="disabled" id="inP">
					</div>

				</div>
			</div>
			<input type="button" name="" id="Liquidacion" value="Calcular">
			
		</div>
		<div class="row noneM">
		<table id="informacionMora" class="col-12">
			<tr>
				<td>#</td><td>Fecha</td><td>Saldo a Capital</td><td>Cuota Fija</td><td>Intereses de Mora</td><td>Flujo de Caja</td>
			</tr>
		</table>
		</div>


</div>


<input type="button" id="cmd" value="generate PDF" class="col-3 none">

</body>
<script type="text/javascript">
var periocidad;
$("#cmd").click(function(){
var diaI=$("#fechamora").val();
$("#fechamora").attr("type","text");
$("#fechamora").val(diaI);
$(":button").css("display","none");

$(".con-radios").html(periocidad);


html2canvas([document.getElementById("body")], {
		onrendered: function (canvas) {
			var img = canvas.toDataURL('image/png'); //o por 'image/jpeg' 
			//display 64bit imag
			
			var doc=new jsPDF();
			doc.addImage(img, 0, 0,210, 300);
			doc.save("Amortizacion.pdf");	
			 location.reload();    
		}
	});
});


var sueldo;
$("#prestamo").focusout(function(){
	sueldo=($(this).val()).replace(/\D/g, "");
	
	var sueldos= sueldo.replace(/([0-9])([0-9]{3})$/, '$1.$2');
		sueldos= sueldos.replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
       $("#prestamo").val(sueldos);
       
});

$("#cedula").focusout(function(){
	cedula=($(this).val()).replace(/\D/g, "");
	
	var cedulas= cedula.replace(/([0-9])([0-9]{3})$/, '$1.$2');
		cedulas= cedula.replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
       $("#cedula").val(cedulas);
       
});

var valor;
var dias;
var meses;
$(".con-radios").find("input[type='radio']").change(function(){
  valor=$(this).val();

	if(valor==12){
		$("#texto").html(" ");
		dias=30;
		meses=1;
		periocidad="Mensual";
	}else if(valor==2){

		$("#texto").html(" ");
		dias=180;
		meses=6;
		periocidad="Semestral";
	}else if(valor==4){
		$("#texto").html(" ");
		dias=90;
		meses=3;
		periocidad="Trimestral";
	}else{
		$("#texto").html("no a seleccionado una periocidad");
	}

});
$("#efectiva").focusout(function(){
		var valPorcen=($(this).val())/100;


		var ipV=(Math.pow((1+valPorcen),(dias/360)));
		var ip=(ipV-1)*100;
		var inf=ip.toFixed(3);
		var Na=inf*valor;
		$("#periodica").val(ip.toFixed(2));
		$("#nominal").val(Na.toFixed(2));

});
$("#nominal").focusout(function(){
		var ip=(($(this).val())/valor);
		var ips=(ip)/100;

		var ipV=(Math.pow((1+ips),(360/dias)));
		var val=(ipV-1)*100;
		
		
		$("#periodica").val(ip.toFixed(2));
		$("#efectiva").val(val.toFixed(2));
		console.log(ip);

});
$("#periodica").focusout(function(){
		var ip=(($(this).val())*valor);
		var ips=($(this).val())/100;

		var ipV=(Math.pow((1+ips),(360/dias)));
		var val=(ipV-1)*100;
		
		
		$("#nominal").val(ip.toFixed(2));
		$("#efectiva").val(val.toFixed(2));
});

var fullDate = new Date()
var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1);
var fecha = fullDate.getDate() + "/" + twoDigitMonth + "/" + fullDate.getFullYear();

sumaFecha = function(d, fecha)
{
 var Fecha = new Date();
 var sFecha = fecha || (Fecha.getDate() + "/" + (Fecha.getMonth() +1) + "/" + Fecha.getFullYear());
 var sep = sFecha.indexOf('/') != -1 ? '/' : '-';
 var aFecha = sFecha.split(sep);
 var fecha = aFecha[2]+'/'+aFecha[1]+'/'+aFecha[0];
 fecha= new Date(fecha);
 fecha.setMonth(fecha.getMonth()+parseInt(d));
 var anno=fecha.getFullYear();
 var mes= fecha.getMonth()+1;
 var dia= fecha.getDate();
 mes = (mes < 10) ? ("0" + mes) : mes;
 dia = (dia < 10) ? ("0" + dia) : dia;
 var fechaFinal = dia+sep+mes+sep+anno;
 return (fechaFinal);
 }
restaFechas = function(f1,f2)
 {
 var aFecha1 = f1.split('/');
 var aFecha2 = f2.split('/');
 var fFecha1 = Date.UTC(aFecha1[2],aFecha1[1]-1,aFecha1[0]);
 var fFecha2 = Date.UTC(aFecha2[2],aFecha2[1]-1,aFecha2[0]);
 var dif = fFecha2 - fFecha1;
 var dias = Math.floor(dif / (1000 * 60 * 60 * 24));
 return dias;
 }

 FormatoFecha= function(fechass){
 				var Fec = new Date();
				var fechasM = fechass || (Fec.getDate() + "/" + (Fec.getMonth() +1) + "/" + Fec.getFullYear());
				var sepM = fechasM.indexOf('/') != -1 ? '/' : '-';
				var mFechas = fechasM.split(sepM);
				var fechaM = mFechas[2]+'-'+mFechas[1]+'-'+mFechas[0];
				return fechaM;
 }

 FormatoFechaResta= function(fechass){
 				var Fec = new Date();
				var fechasM = fechass || (Fec.getDate() + "/" + (Fec.getMonth() +1) + "/" + Fec.getFullYear());
				var sepM = fechasM.indexOf('/') != -1 ? '/' : '-';
				var mFechas = fechasM.split(sepM);
				var fechaM = mFechas[2]+'/'+mFechas[1]+'/'+mFechas[0];
				return fechaM;
 }

puntos= function(valor){
	var infor=valor.replace(/\D/g, "");
	
	var inf= infor.replace(/([0-9])([0-9]{2})$/, '$1,$2');
		inf= inf.replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");

		return inf;
}
$("#button").click(function(){
		$(".none").css("display","block");
		plazo=$("#plazo").val();
		var prestamos=($("#prestamo").val().replace(/\D/g, ""))*1;
		cuotas=valor*plazo;
		ipAr=($("#periodica").val()/100);
		var Aelevado=(Math.pow((1+ipAr),cuotas));
		var amortizacion=prestamos*((Aelevado*ipAr)/(Aelevado-1));
		console.log(amortizacion);
		var tabla=new Array();
		var interes=prestamos*ipAr;
		var amortizacionCapital=amortizacion-interes;
		var fechas_Amort=fecha;
			for (var i =0; i <cuotas+1; i++) {

					sumaFecha(meses,fecha);

					if(i==0){
						var data={
							fechas:fecha,
							saldoCapital:prestamos,
							CuotaFija:0,
							AmortizacionC:0,
							AmortizacionIntres:0,
							FujoCaja:prestamos
						};
						tabla[i]=data;
						console.log(data);
						var saldoC=puntos(tabla[i]["saldoCapital"].toFixed(2));
						var cuotaF=puntos(tabla[i]["CuotaFija"].toFixed(2));
						var AmorC=puntos(tabla[i]["AmortizacionC"].toFixed(2));
						var AmorI=puntos(tabla[i]["AmortizacionIntres"].toFixed(2));
						var FujoC=puntos(tabla[i]["FujoCaja"].toFixed(2));
										$("#informacion").append("<tr><td>"+i+"</td><td>"+tabla[i]["fechas"]+"</td><td>"+saldoC+"</td><td>"+cuotaF+"</td><td>"+AmorC+"</td><td>"+AmorI+"</td><td>"+FujoC+"</td></tr>");
					}else{
						
						interes=prestamos*ipAr;
						amortizacionCapital=amortizacion-interes;
						prestamos=prestamos-amortizacionCapital;
						var fechas_Amort=sumaFecha(meses,fechas_Amort);

						var data={
							fechas:fechas_Amort,
							saldoCapital:prestamos,
							CuotaFija:amortizacion,
							AmortizacionC:amortizacionCapital,
							AmortizacionIntres:interes,
							FujoCaja:amortizacion
						};
						tabla[i]=data;
						console.log(data);
						var saldoC=puntos(tabla[i]["saldoCapital"].toFixed(2));
						var cuotaF=puntos(tabla[i]["CuotaFija"].toFixed(2));
						var AmorC=puntos(tabla[i]["AmortizacionC"].toFixed(2));
						var AmorI=puntos(tabla[i]["AmortizacionIntres"].toFixed(2));
						var FujoC=puntos(tabla[i]["FujoCaja"].toFixed(2));
										$("#informacion").append("<tr><td>"+i+"</td><td>"+tabla[i]["fechas"]+"</td><td>"+saldoC+"</td><td>"+cuotaF+"</td><td>"+AmorC+"</td><td>"+AmorI+"</td><td>"+FujoC+"</td></tr>");
					}


			}

			$("#cuotamora").focusout(function(){
				var cuota=$("#cuotamora").val();
				var fechasMs=tabla[cuota]["fechas"];
				var fechafor=FormatoFecha(fechasMs);

 				$("#fechamora").val(fechafor);

 				$("#fechamora").focusout(function(){
 					var id=$("#fechamora").val();
 					var fechas1=FormatoFechaResta(id);
 					var diasM=restaFechas(fechasMs,fechas1);
 					$("#diasmora").val(diasM);
 				});
				

			});

			$("#Liquidacion").click(function(){
				$(".noneM").css("display","block");
				var eas=($("#tasaU").val())/100;
				var cuota=$("#cuotamora").val();
				var diasM=$("#diasmora").val();
				var ipsN=Math.pow((1+eas),(diasM/365));
				var ipsM=ipsN-1;
				var salMora=tabla[cuota-1]["saldoCapital"];
				var cuoMora=tabla[cuota]["CuotaFija"];
				var InMora=salMora*ipsM;
				var saldoCM=tabla[cuota]["saldoCapital"];
				var FlujoMora=cuoMora+InMora;
				$("#inP").val((ipsM*100).toFixed(2));

				var fecM=$("#fechamora").val();
				var liqui={
						fechaMoras:fecM,
						saldoCmora:saldoCM,
						cuotaMoras:cuoMora,
						interesMora:InMora,
						flujoCMora:FlujoMora
				};

						var feMoras=liqui["fechaMoras"];
						var sCmora=puntos(liqui["saldoCmora"].toFixed(2));
						var cuMoras=puntos(liqui["cuotaMoras"].toFixed(2));
						var insMora=puntos(liqui["interesMora"].toFixed(2));
						var fCMora=puntos(liqui["flujoCMora"].toFixed(2));
										$("#informacionMora").append("<tr><td>"+cuota+"</td><td>"+feMoras+"</td><td>"+sCmora+"</td><td>"+cuMoras+"</td><td>"+insMora+"</td><td>"+fCMora+"</td></tr>");
			});
			
	
});

</script>

</html>