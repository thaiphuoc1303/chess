<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div id="value">

    </div>
    <script src="https://www.gstatic.com/firebasejs/9.1.3/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.1.3/firebase-firestore-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.1.3/firebase-auth-compat.js"></script>
    <script type="module" src="{{URL::asset('js/firebase/room.js')}}"></script>
    {{-- <script type="module">
        // Import the functions you need from the SDKs you need
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
        // const db = getFirestore(app);

        import {
            getDatabase,
            ref,
            onValue,
            child,
            get,
            set
        } from "https://www.gstatic.com/firebasejs/9.1.3/firebase-database.js";
        
        const db = getDatabase();
        set(ref(db, 'room/room1'), {
            player1: 50,
            player2: 40
        });
        const rooms = ref(db, 'room');
        onValue(rooms, (snapshot)=>{
            console.log(snapshot.val());
        })
    </script> --}}
</body>

</html>
