<!DOCTYPE html>
<html>
<head>
	<title>Simple Chess AI</title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src='{{URL::asset('js/lib/chessboard-0.3.0.js')}}'> </script>
	<script type="text/javascript" src='{{URL::asset('js/lib/chess.js')}}'> </script>
	<script type="text/javascript" src="{{URL::asset('js/chessAI.js')}}"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/chessboard-0.3.0.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/chessAI.css')}}">
</head>

<body>
	<div class="menu" id="difficulty"> 
		<br>
		<hr><br>
		<button type="button" class="btn easy btn-success btn-sm">Play</button>
		{{-- <br><br>
		<button type="button" class="btn medium btn-warning btn-xlarge">Medium</button>
		<br><br>
		<button type="button" class="btn hard btn-danger btn-xlarge">Hard</button> --}}
	</div>

	<div id="board" style="width: 600px" ></div>
	<hr>
	<div id="gameover" class="alert alert-primary hide" role="alert"><strong></strong></div>
	<div id="restart" class="restartGame">
		<button type="button" class="btn  btn-danger btn-sm">Restart</button>		
	</div>
</body>

</html>