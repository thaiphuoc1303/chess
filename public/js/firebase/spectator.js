import {
    initializeApp
} from "https://www.gstatic.com/firebasejs/9.1.3/firebase-app.js";
import {
    getAnalytics
} from "https://www.gstatic.com/firebasejs/9.1.3/firebase-analytics.js";
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
    onChildAdded
} from "https://www.gstatic.com/firebasejs/9.1.3/firebase-database.js";
const db = getDatabase();

var url = window.location.href;
var id = url.slice(url.lastIndexOf('/') + 1);
url = window.location.origin;

const move = ref(db, 'room/' + id + "/board");
onValue(move, (snapshot) => {
    const data = snapshot.val();
    DatCo(ValueCell(data));
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
const status = ref(db, 'room/' + id + '/status');
onValue(status, (snapshot) => {
    const data = snapshot.val();
    // var home = window.location.origin +"/backhome/"+id;
    if (data == "2"){
        $('#thongbao').html('<div class="thongbao-gameover"><div style="text-align: center; margin-top: 20%"><h2 style="color: rgb(255, 255, 255)">Đỏ thắng!</h2><div class="container" style="text-align: center;"><div class="row"><div class="col-3" style="margin-top: 30px"><button class="btn btn-lg btn-success" onclick="clearthongbao()">OK</button></div></div></div></div></div>');

    }
    else if(data == "3"){
        $('#thongbao').html('<div class="thongbao-gameover"><div style="text-align: center; margin-top: 20%"><h2 style="color: rgb(255, 255, 255)">Đen thắng!</h2></div></div>');

    }

});
const xem = ref(db, 'room/'+id);
onValue(xem, (snapshot) => {
    const data = snapshot.val();
    if(data["spectator"] == 0){
        window.location = url;
        console.log("exit");
    }
});

const chat = ref(db, 'chat/' + id);
onChildAdded(chat, (snapshot) => {
    const newData = snapshot.val();
    if(newData["type"]==1){
        $("#messages").append('<p onclick="ajaxprofile('+ newData["id"] +')"><b class="name-chat-1">'+ newData["name"] +': </b>'+ newData["message"] +'</p>');
    }
    else if(newData["type"]==2){
        $("#messages").append('<p onclick="ajaxprofile('+ newData["id"] +')"><b class="name-chat-2">'+ newData["name"] +': </b>'+ newData["message"] +'</p>');
    }
    else if(newData["type"]==3){
        $("#messages").append('<p onclick="ajaxprofile('+ newData["id"] +')"><b class="name-chat-3">'+ newData["name"] +': </b>'+ newData["message"] +'</p>');
    }
    else $("#messages").append('<p onclick="ajaxprofile('+ newData["id"] +')"><b class="name-chat-2">'+ newData["name"] +': </b>'+ newData["message"] +'</p>');
});