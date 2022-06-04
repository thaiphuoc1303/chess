var idcu = "00";
function Click(id) {
	if ($('#idplayer').val() != $('#luot').val()) {
		return;
	}
	var X = id.charAt(0);
	var Y = id.charAt(1);

	if ($('#click').val() == "1") {
		$('#click').val("0");
	} else {
		$('#click').val("1");
	}
	if ($('#click').val() == "1") {
		if (xdquan(id) != $('#quan').val()) {
			$('#click').val("0");
			return;
		}
	}
	if ($('#click').val() == "1") {
		var Name = GetName(id);
		idcu = id;
		switch (Name) {
			case 2:
				Xe(id);
				break;

			case 3:
				Ma(id);
				break;

			case 4:
				Tuong(id);
				break;

			case 5:
				Hau(id);
				break;

			case 6:
				Vua(id);
				break;

			case 1:
				Tot(id);
				break;

			default:

				// Không click vào ổ chức quân cờ nào
				$('#click').val("0");
				break;
		}
	} else {
		DiChuyen(idcu, id);
		$('#click').val("0");
		VeBanCoTrangDen();
	}
}

function xdquan(id) {
	var piece = $('#' + id).attr('piece');
	if (piece.includes("-")) {
		return "1";
	}
	return "0";
}


function DoiMau(X, Y) {
	document.getElementById(X.toString() + Y.toString()).style.backgroundColor = "#F6CD61";
}
function startGame() {
	var url = window.location.href;
	var id = url.slice(url.lastIndexOf('/') + 1);
	var origin = window.location.origin;
	$.ajax({
		url: origin + "/start/" + id,
		type: "get",
		success: function (dt) {
		}
	});
}

function GetColor(id) {
	var rgb = document.getElementById(id).style.backgroundColor;
	var Temp = rgb.substring(rgb.indexOf('(') + 1, rgb.length - 1);
	while (Temp.indexOf(' ') != -1) {
		Temp = Temp.replace(" ", "");
	}
	return Temp; //rgb
}

function GetName(id) {
	try {
		var piece = document.getElementById(id).getAttribute("piece");
		var Ten = Math.abs(piece);
		return Ten;
	} catch (err) {
		return err;
	}
}

function isChieuVua(Name) {
	return Name.localeCompare("Vua") == 0 ? true : false;
}

function isCoDo(X, Y) {
	var piece = $('#' + X + Y).attr('piece');
	if(piece.includes("0")){
		return false;
	}
	if (piece.includes("-")) {
		return false;
	}
	return true;
}

function isCoDen(X, Y) {
	var piece = $('#' + X + Y).attr('piece');
	if(piece.includes("0")){
		return false;
	}
	if (piece.includes("-")) {
		return true;
	}
	return false;
}

function isRong(X, Y) {
	var piece = $('#' + X + Y).attr('piece');
	if (piece == "0") {
		return true;
	}
	return false;
}

function isBien(X, Y) {
	if (X < 1 || X > 8)
		return true;
	else if (Y < 1 || Y > 8)
		return true;
	else
		return false;
}

function DiChuyen(id, idMoi) {
	if (id.localeCompare(idMoi) == 0 || GetColor(idMoi).localeCompare(Mau.NuocDi) != 0) {
		return;
	}
	var url = window.location.origin + "/move";
	$.ajax({
		url: url,
		type: "post",
		dataType: "text",
		data: {
			idRoom: $('#idroom').val(),
			idCu: id,
			idMoi: idMoi
		},
		success: function (result) {
			// $('#thongbao').html(result);
		}
	});
	
}

function ClickQuanCo(id) {
	if ($('#idplayer').val() != $('#luot').val()) {
		return;
	}
	if ($('#quan').val() == "0") {
		if ($('#quan').val() != isCoDo(id)) {
			return;
		}
		var Name = GetName(id);
		Location = id;
		// Kiểm tra này là quân cờ nào để xác định đường đi
		switch (Name) {
			case 2:
				Xe(id);
				break;

			case 3:
				Ma(id);
				break;

			case 4:
				Tuong(id);
				break;

			case 5:
				Hau(id);
				break;

			case 6:
				Vua(id);
				break;

			case 1:
				Tot(id);
				break;

			default:

				// Không click vào ổ chức quân cờ nào
				isClick = !isClick;
				break;
		}
	}

}
function choitiep() {
	$('#thongbao').html('');
	var url = window.location.origin+"/choitiep";
	$.ajax({
		url: url,
		type: "post",
		dataType: "text",
		data: {
			idRoom: $('#idroom').val()
		},
		success: function (result) {
			// console.log(result);
		}
	});
}
function setting() {
	$("#tabsetting").toggle();
}
function khangia() {
	var path = window.location.pathname;
	var id = path.slice(path.lastIndexOf('/') + 1);
	var url = window.location.origin + "/ajax-khangia/"+id;
	$.ajax({
		url: url,
		type: "get",
		dataType: "text",
		
		success: function (result) {
			// console.log(result);
		}
	});
}
function btnchat() {
	var path = window.location.pathname;
	var id = path.slice(path.lastIndexOf('/') + 1);
	var url = window.location.origin + "/ajax-khangiachat/"+id;
	$.ajax({
		url: url,
		type: "get",
		dataType: "text",
		
		success: function (result) {
			// console.log(result);
		}
	});
}
function clearthongbao() {
    $("#thongbao").html("");
}
function HideChatBox(){
	$("#hide-chat-box").hide();
	$("#show-chat-box").show();
	$("#switch-chat").hide();
}

function ShowChatBox(){
	$("#hide-chat-box").show();
	$("#show-chat-box").hide();
	$("#switch-chat").show();
}

function btnChat() {
	var url = window.location.href;
	var id = url.slice(url.lastIndexOf('/') + 1);
	var origin = window.location.origin;
	var mess = $("#txtMessage").val();
	if(mess=="") return;
	$.ajax({
		url: origin+"/chat",
		type: "post",
		dataType: "text",
		data: {
			message: mess,
			id: id
		},
		success: function (result) {
			$('#thongbao').html(result);
		}
	});
	$("#txtMessage").val("");
}
function batdau() {
	$('#batdau').hide();
	$('#restart').show();
}
function restart() {
	$('#batdau').show();
	$('#restart').hide();
}
function ajaxprofile(id) {
	var origin = window.location.origin;
	$.ajax({
		url: origin+"/ajax-profile/"+id,
		type: "get",
		dataType: "text",
		success: function (result) {
			$('#thongbao').html(result);
		}
	});
}