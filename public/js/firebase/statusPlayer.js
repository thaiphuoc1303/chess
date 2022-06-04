import {
    initializeApp
} from "https://www.gstatic.com/firebasejs/9.1.3/firebase-app.js";
import {
    getAnalytics
} from "https://www.gstatic.com/firebasejs/9.1.3/firebase-analytics.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
    apiKey: "AIzaSyCLjI-0LCEvAFqegkyEAEqQ7RU9kHY4fa4",
    authDomain: "chessproject-c80f6.firebaseapp.com",
    databaseURL: "https://chessproject-c80f6-default-rtdb.firebaseio.com",
    projectId: "chessproject-c80f6",
    storageBucket: "chessproject-c80f6.appspot.com",
    messagingSenderId: "430513657589",
    appId: "1:430513657589:web:eacf9ef7da6a2338ba97bc",
    measurementId: "G-WE1CQHCB6B"
};
// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);

import {
    getDatabase,
    ref,
    onValue,
    child,
    onChildAdded,
    get,
    set
} from "https://www.gstatic.com/firebasejs/9.1.3/firebase-database.js";
const db = getDatabase();
var url = window.location.href;
var id = url.slice(url.lastIndexOf('/') + 1);


var div = $("#status");

const status = ref(db, 'room/' + id + '/status');
onValue(status, (snapshot) => {
    const data = snapshot.val();
    var home = window.location.origin +"/backhome/"+id;
    if (data == "0") {
        div.empty();
        div.append('<button onclick="startGame()" class="btn btn-sm btn-success">Bắt đầu</button>')
        $('.demnguoc').hide();
    }
    else if (data == "1") {
        div.empty();
        div.append('<img  height="50px" width="50px" src="'+ window.location.origin+ '/img/vs.png" alt="">');
        $('.demnguoc').show();
    }
    else if (data == "2"){
        $('#thongbao').html('<div class="thongbao-gameover"><div style="text-align: center; margin-top: 20%"><h2 style="color: rgb(255, 255, 255)">Đỏ thắng!</h2><div class="container" style="text-align: center;"><div class="row"><div class="col-3" style="margin-top: 30px"><button class="btn btn-lg btn-success" onclick="choitiep()">Chơi tiếp</button></div><div class="col-3"  style="margin-top: 10px"><a href="'+home+'" class="btn btn-sm" style="color: rgb(245, 245, 107)">Về trang chủ</a></div></div></div></div></div>');

    }
    else if(data == "3"){
        $('#thongbao').html('<div class="thongbao-gameover"><div style="text-align: center; margin-top: 20%"><h2 style="color: rgb(255, 255, 255)">Đen thắng!</h2><div class="container" style="text-align: center;"><div class="row"><div class="col-3" style="margin-top: 30px"><button class="btn btn-lg btn-success" onclick="choitiep()">Chơi tiếp</button></div><div class="col-3"  style="margin-top: 10px"><a href="'+home+'" class="btn btn-sm" style="color: rgb(245, 245, 107)">Về trang chủ</a></div></div></div></div></div>');

    }

});

const move = ref(db, 'room/' + id);
onValue(move, (snapshot) => {
    const data = snapshot.val();
    DatCo(ValueCell(data.board));
    $('#luot').val(data.turn);
});

const player = ref(db, 'room/' + id + '/player2');
onValue(player, (snapshot) => {
    const data = snapshot.val();
    var url = window.location.origin + "/player/" + data;
    $.ajax({
        url: url,
        type: "get",
        success: function (dt) {
            $('#player2').html(dt);
        }
    });
});

const spectator = ref(db, 'room/'+ id + '/spectator');
onValue(spectator, (snapshot)=>{
    const data = snapshot.val();
    if(data == 1){
        $("#khangia").html('<Button onclick="khangia()" id="btn-khangia" class="btn btn-sm btn-success"><i class="fas fa-eye"></i> Cho phép</Button>');
    }
    else{
        $("#khangia").html('<Button onclick="khangia()" id="btn-khangia" class="btn btn-sm btn-danger"><i class="fas fa-eye-slash"></i> Cho phép</Button>');
    }
});
const spectatorChat =ref(db, 'room/'+id+'/spectator-chat');
onValue(spectatorChat, (snapshot)=>{
    const data = snapshot.val();
    if(data == 1){
        $("#div-chat").html('<button onclick="btnchat()" id="btn-chat" class="btn btn-sm btn-success"><i class="fas fa-comment"></i> Cho phép</button>');
    }
    else{
        $("#div-chat").html('<button onclick="btnchat()" id="btn-chat" class="btn btn-sm btn-danger"><i class="fas fa-comment-slash"></i> Cho phép</button>');
    }
});

const chat = ref(db, 'chat/' + id);
onChildAdded(chat, (data) => {
    const newData = data.val();
    if(newData["type"]==1){
        $("#messages").append('<p><b class="name-chat-1">'+ newData["name"] +': </b>'+ newData["message"] +'</p>');
    }
    else if(newData["type"]==2){
        $("#messages").append('<p><b class="name-chat-2">'+ newData["name"] +': </b>'+ newData["message"] +'</p>');
    }
    else if(newData["type"]==3){
        $("#messages").append('<p><b class="name-chat-3">'+ newData["name"] +': </b>'+ newData["message"] +'</p>');
    }
    else $("#messages").append('<p><b class="name-chat-2">'+ newData["name"] +': </b>'+ newData["message"] +'</p>');
});

$("#surrender").click(function(){
    var url = window.location.origin + "/surrender/" + id;
    $.ajax({
        url: url,
        type: "get",
        success: function (dt) {
            
        }
    })
});