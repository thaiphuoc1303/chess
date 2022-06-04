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
    get,
    set
} from "https://www.gstatic.com/firebasejs/9.1.3/firebase-database.js";

var div = $("#rooms");
var origin = window.location.origin;
// var pathname = window.location.pathname;
// pathname = pathname.slice(0, pathname.length - 5);
const db = getDatabase();

const room = ref(db, 'room');
onValue(room, (snapshot) => {
    const data = snapshot.val();
    loadRoom(data);
});
function loadRoom(data) {
    div.empty();
    var arr = Object.entries(data);
        div.append('<div class="col-lg-3 col-sm-6 col-md-3"><a href="'
        + origin +'/random' +'"><div class="box-img"><h4>Ngẫu nhiên</h4><img src="'
            + origin +'/img/random.png"/></div></a></div>');
    arr.forEach(element => {
        if (element[1].player2 == '0') {
            div.append('<div class="col-lg-3 col-sm-6 col-md-3"><a href="'
            + origin +'/gaming/' + element[1].id +'"><div class="box-img"><h4>' + element[1].id + '</h4><img src="'
                + origin +'/img/1nguoi.png"/></div></a></div>');
        }
        else {
            div.append('<div class="col-lg-3 col-sm-6 col-md-3"><a href="'
            + origin +  '/gaming/' + element[1].id + '"><div class="box-img"><h4>' + element[1].id + '</h4><img src="'
                + origin +  '/img/2nguoi.png"/></div></a></div>');
        }
    });
}