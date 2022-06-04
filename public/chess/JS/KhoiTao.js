var imported = document.createElement('script');
imported.src = window.location.origin+'/chess/JS/Sources.js';
document.head.appendChild(imported);

//
function VeBanCoTrangDen(){
	for(var i = 1; i < 9; i++){
		for(var j = 1; j < 9; j++){
			document.getElementById(i.toString() + j.toString()).style.backgroundColor = "rgb(255,255,255)";
			if(i % 2 != 0 ){
				if(j % 2 == 0)
					document.getElementById(i.toString() + j.toString()).style.backgroundColor = "rgb(199 206 250)";
			}else{
				if(j % 2 != 0)
					document.getElementById(i.toString() + j.toString()).style.backgroundColor = "rgb(199 206 250)";
			}
		}
	}
}
// Đặt các quân cờ
// function DatCo(rr){
// 	rr = rr+ "/";
// 	for( i = 3; i < 7; i++){
// 		for(j = 1; j < 9; j++){
// 			document.getElementById("i" + i.toString() + j.toString()).src = rr +"QuanCo/Rong.png";
// 		}
// 	}
	
// 	// Quân đen
// 	for(var i = 1; i < 9; i++){
// 		document.getElementById("i7" + i).src = rr+ CoDen.Tot;
// 		document.getElementById("7" + i).setAttribute("piece", 1);
// 	}
// 	document.getElementById("i81").src = rr+ CoDen.Xe;
// 	document.getElementById("81").setAttribute("piece", 2);
// 	document.getElementById("i82").src = rr+ CoDen.Ma;
// 	document.getElementById("82").setAttribute("piece", 3);
// 	document.getElementById("i83").src = rr+ CoDen.Tuong;
// 	document.getElementById("83").setAttribute("piece", 4);
// 	document.getElementById("i84").src = rr+ CoDen.Hau;
// 	document.getElementById("84").setAttribute("piece", 5);
// 	document.getElementById("i85").src = rr+ CoDen.Vua;
// 	document.getElementById("85").setAttribute("piece", 6);
// 	document.getElementById("i86").src = rr+ CoDen.Tuong;
// 	document.getElementById("86").setAttribute("piece", 4);
// 	document.getElementById("i87").src = rr+ CoDen.Ma;
// 	document.getElementById("87").setAttribute("piece", 3);
// 	document.getElementById("i88").src = rr+ CoDen.Xe;
// 	document.getElementById("88").setAttribute("piece", 2);
	
// 	// Quân đỏ
// 	for(var i = 1; i < 9; i++){
// 		document.getElementById("i2" + i).src = rr+ CoDo.Tot;
// 		document.getElementById("2" + i).setAttribute("piece", -1);
// 	}
// 	document.getElementById("i11").src = rr+ CoDo.Xe;
// 	document.getElementById("11").setAttribute("piece", -2);
// 	document.getElementById("i12").src = rr+ CoDo.Ma;
// 	document.getElementById("12").setAttribute("piece", -3);
// 	document.getElementById("i13").src = rr+ CoDo.Tuong;
// 	document.getElementById("13").setAttribute("piece", -4);
// 	document.getElementById("i14").src = rr+ CoDo.Vua;
// 	document.getElementById("14").setAttribute("piece", -6);
// 	document.getElementById("i15").src = rr+ CoDo.Hau;
// 	document.getElementById("15").setAttribute("piece", -5);
// 	document.getElementById("i16").src = rr+ CoDo.Tuong;
// 	document.getElementById("16").setAttribute("piece", -4);
// 	document.getElementById("i17").src = rr+ CoDo.Ma;
// 	document.getElementById("17").setAttribute("piece", -3);
// 	document.getElementById("i18").src = rr+ CoDo.Xe;
// 	document.getElementById("18").setAttribute("piece", -2);
// }
