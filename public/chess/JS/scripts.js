function KhoiTao() {
    VeBanCoTrangDen();
    var board = "2 3 4 5 6 4 3 2*1 1 1 1 1 1 1 1*0 0 0 0 0 0 0 0*0 0 0 0 0 0 0 0*0 0 0 0 0 0 0 0*0 0 0 0 0 0 0 0*-1 -1 -1 -1 -1 -1 -1 -1*-2 -3 -4 -5 -6 -4 -3 -2";
    DatCo( ValueCell(board));
}
function ValueCell(strBoard) {
    var row = strBoard.split("*");
    cell = new Array();
    for (var i = 0; i < row.length; i++) {
        cell[i] = row[i].split(" ");
    }
    return cell;
}
function DatCo(board) {
    var url = window.location.origin +"/chess/";
    for (var i = 0; i < 8; i++) {
        for (var j = 0; j < 8; j++) {
            var a = i+1, b = j+1;
            document.getElementById("i"+a+b).src = url + TextValue(board[i][j]);
            document.getElementById(""+a+b).setAttribute("piece", board[i][j]);
        }
    }
}
function TextValue(n) {
    switch (n) {
        case "-6":
            return "QuanCo/Vua_Den.png";
            break;
        case "-5":
            return "QuanCo/Hau_Den.png";
            break;
        case "-4":
            return "QuanCo/Tuong_Den.png";
            break;
        case "-3":
            return "QuanCo/Ma_Den.png";
            break;
        case "-2":
            return "QuanCo/Xe_Den.png";
            break;
        case "-1":
            return "QuanCo/Tot_Den.png";
            break;
        case "1":
            return "QuanCo/Tot_Do.png";
            break;
        case "2":
            return "QuanCo/Xe_Do.png";
            break;
        case "3":
            return "QuanCo/Ma_Do.png";
            break;
        case "4":
            return "QuanCo/Tuong_Do.png";
            break;
        case "5":
            return "QuanCo/Hau_Do.png";
            break;
        case "6":
            return "QuanCo/Vua_Do.png";
            break;
        default:
            return "QuanCo/Rong.png"
    }
}
