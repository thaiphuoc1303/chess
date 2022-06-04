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
const db = getDatabase();
var url = window.location.href;
var id  = url.slice(url.lastIndexOf('/')+1);

const  board = ref(db, 'room/'+id+'/board');
onValue(board, (snapshot)=>{
    const data = snapshot.val();
    console.log(data);
    DatCo(ValueCell(data))
});