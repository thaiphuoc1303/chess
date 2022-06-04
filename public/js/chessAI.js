$(document).ready(function(){
	var minimaxDepth = 2;
	initGame();

	function initGame(){
		$('#board').hide();
		$('#gameover').hide();
		$('#restart').hide();
		$('#difficulty').show();

		$('.easy').click(function(){
			setDepth(0);
		});
		$('.medium').click(function(){
			setDepth(1);
		});
		$('.hard').click(function(){
			setDepth(2);
		});

		function setDepth(depth){
			$('#difficulty').hide();
			$('#board').show();
			$('#restart').show();
			console.log(depth);
			minimaxDepth = depth;
		}
	}


	$('.restartGame').click(function(){
		board.clear();
		board.start();
		game.reset();
		initGame();
	})


	var board,
	  game = new Chess();


	var removeGreySquares = function() {
		$('#board .square-55d63').css('background', '');
	};


	var greySquare = function(square) {
	  var squareEl = $('#board .square-' + square);
	  
	  var background = '#a9a9a9';
	  if (squareEl.hasClass('black-3c85d') === true) {
	    background = '#696969';
	  }

	  squareEl.css('background', background);
	};


	// het tran.
	var onDragStart = function(source, piece, position, orientation) {
	  if (game.in_checkmate() === true || game.in_draw() === true || game.game_over() === true ) {
		  var home = window.location.origin;
		  $("#thongbao").html('<div class="thongbao-gameover" onclick=clearthongbao()><div style="text-align: center; margin-top: 20%"><h2 style="color: rgb(255, 255, 255)">Bạn thắng!</h2><div class="container" style="text-align: center;"><div class="row"><div class="col-3" style="margin-top: 30px"><button class="btn btn-lg btn-success" onclick="clearthongbao()">Chơi tiếp</button></div><div class="col-3"  style="margin-top: 10px"><a href="'+home+'" class="btn btn-sm" style="color: rgb(245, 245, 107)">Về trang chủ</a></div></div></div></div></div>');
	  	
	    return false;
	  }
	};


	// uses the minimax algorithm with alpha beta pruning to caculate the best move
	var calculateBestMove = function() {

	    var possibleNextMoves = game.moves();
	    var bestMove = -9999;
	    var bestMoveFound;

	    for(var i = 0; i < possibleNextMoves.length; i++) {
	        var possibleNextMove = possibleNextMoves[i]
	        game.move(possibleNextMove);
	        var value = minimax(minimaxDepth, -10000, 10000, false);
	        game.undo();
	        if(value >= bestMove) {
	            bestMove = value;
	            bestMoveFound = possibleNextMove;
	        }
	    }
	    return bestMoveFound;
	};


	// minimax with alhpha-beta pruning and search depth d = 3 levels
	var minimax = function (depth, alpha, beta, isMaximisingPlayer) {
	    if (depth === 0) {
	        return -evaluateBoard(game.board());
	    }

	    var possibleNextMoves = game.moves();
	    var numPossibleMoves = possibleNextMoves.length

	    if (isMaximisingPlayer) {
	        var bestMove = -9999;
	        for (var i = 0; i < numPossibleMoves; i++) {
	            game.move(possibleNextMoves[i]);
	            bestMove = Math.max(bestMove, minimax(depth - 1, alpha, beta, !isMaximisingPlayer));
	            game.undo();
	            alpha = Math.max(alpha, bestMove);
	            if(beta <= alpha){
	            	return bestMove;
	            }
	        }

	    } else {
	        var bestMove = 9999;
	        for (var i = 0; i < numPossibleMoves; i++) {
	            game.move(possibleNextMoves[i]);
	            bestMove = Math.min(bestMove, minimax(depth - 1, alpha, beta, !isMaximisingPlayer));
	            game.undo();
	            beta = Math.min(beta, bestMove);
	            if(beta <= alpha){
	            	return bestMove;
	            }
	        }
	    }

		return bestMove;
	};


	// the evaluation function for minimax
	var evaluateBoard = function (board) {
	    var totalEvaluation = 0;
	    for (var i = 0; i < 8; i++) {
	        for (var j = 0; j < 8; j++) {
	            totalEvaluation = totalEvaluation + getPieceValue(board[i][j], i, j);
	        }
	    }
	    return totalEvaluation;
	};


	var reverseArray = function(array) {
    	return array.slice().reverse();
	};

	var whitePawnEval =
	    [
	        [0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0],
	        [5.0,  5.0,  5.0,  5.0,  5.0,  5.0,  5.0,  5.0],
	        [1.0,  1.0,  2.0,  3.0,  3.0,  2.0,  1.0,  1.0],
	        [0.5,  0.5,  1.0,  2.5,  2.5,  1.0,  0.5,  0.5],
	        [0.0,  0.0,  0.0,  2.0,  2.0,  0.0,  0.0,  0.0],
	        [0.5, -0.5, -1.0,  0.0,  0.0, -1.0, -0.5,  0.5],
	        [0.5,  1.0,  1.0,  -2.0, -2.0,  1.0,  1.0,  0.5],
	        [0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0]
	    ];

	var blackPawnEval = reverseArray(whitePawnEval);

	var knightEval =
	    [
	        [-5.0, -4.0, -3.0, -3.0, -3.0, -3.0, -4.0, -5.0],
	        [-4.0, -2.0,  0.0,  0.0,  0.0,  0.0, -2.0, -4.0],
	        [-3.0,  0.0,  1.0,  1.5,  1.5,  1.0,  0.0, -3.0],
	        [-3.0,  0.5,  1.5,  2.0,  2.0,  1.5,  0.5, -3.0],
	        [-3.0,  0.0,  1.5,  2.0,  2.0,  1.5,  0.0, -3.0],
	        [-3.0,  0.5,  1.0,  1.5,  1.5,  1.0,  0.5, -3.0],
	        [-4.0, -2.0,  0.0,  0.5,  0.5,  0.0, -2.0, -4.0],
	        [-5.0, -4.0, -3.0, -3.0, -3.0, -3.0, -4.0, -5.0]
	    ];

	var whiteBishopEval = [
	    [ -2.0, -1.0, -1.0, -1.0, -1.0, -1.0, -1.0, -2.0],
	    [ -1.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, -1.0],
	    [ -1.0,  0.0,  0.5,  1.0,  1.0,  0.5,  0.0, -1.0],
	    [ -1.0,  0.5,  0.5,  1.0,  1.0,  0.5,  0.5, -1.0],
	    [ -1.0,  0.0,  1.0,  1.0,  1.0,  1.0,  0.0, -1.0],
	    [ -1.0,  1.0,  1.0,  1.0,  1.0,  1.0,  1.0, -1.0],
	    [ -1.0,  0.5,  0.0,  0.0,  0.0,  0.0,  0.5, -1.0],
	    [ -2.0, -1.0, -1.0, -1.0, -1.0, -1.0, -1.0, -2.0]
	];

	var blackBishopEval = reverseArray(whiteBishopEval);

	var whiteRookEval = [
	    [  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0],
	    [  0.5,  1.0,  1.0,  1.0,  1.0,  1.0,  1.0,  0.5],
	    [ -0.5,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, -0.5],
	    [ -0.5,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, -0.5],
	    [ -0.5,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, -0.5],
	    [ -0.5,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, -0.5],
	    [ -0.5,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, -0.5],
	    [  0.0,   0.0, 0.0,  0.5,  0.5,  0.0,  0.0,  0.0]
	];

	var blackRookEval = reverseArray(whiteRookEval);

	var evalQueen = [
	    [ -2.0, -1.0, -1.0, -0.5, -0.5, -1.0, -1.0, -2.0],
	    [ -1.0,  0.0,  0.0,  0.0,  0.0,  0.0,  0.0, -1.0],
	    [ -1.0,  0.0,  0.5,  0.5,  0.5,  0.5,  0.0, -1.0],
	    [ -0.5,  0.0,  0.5,  0.5,  0.5,  0.5,  0.0, -0.5],
	    [  0.0,  0.0,  0.5,  0.5,  0.5,  0.5,  0.0, -0.5],
	    [ -1.0,  0.5,  0.5,  0.5,  0.5,  0.5,  0.0, -1.0],
	    [ -1.0,  0.0,  0.5,  0.0,  0.0,  0.0,  0.0, -1.0],
	    [ -2.0, -1.0, -1.0, -0.5, -0.5, -1.0, -1.0, -2.0]
	];

	var whiteKingEval = [

	    [ -3.0, -4.0, -4.0, -5.0, -5.0, -4.0, -4.0, -3.0],
	    [ -3.0, -4.0, -4.0, -5.0, -5.0, -4.0, -4.0, -3.0],
	    [ -3.0, -4.0, -4.0, -5.0, -5.0, -4.0, -4.0, -3.0],
	    [ -3.0, -4.0, -4.0, -5.0, -5.0, -4.0, -4.0, -3.0],
	    [ -2.0, -3.0, -3.0, -4.0, -4.0, -3.0, -3.0, -2.0],
	    [ -1.0, -2.0, -2.0, -2.0, -2.0, -2.0, -2.0, -1.0],
	    [  2.0,  2.0,  0.0,  0.0,  0.0,  0.0,  2.0,  2.0 ],
	    [  2.0,  3.0,  1.0,  0.0,  0.0,  1.0,  3.0,  2.0 ]
	];

	var blackKingEval = reverseArray(whiteKingEval);


	var getPieceValue = function (piece, x, y) {
	    if (piece === null) {
	        return 0;
	    }

	    var absoluteValue = getAbsoluteValue(piece, piece.color === 'w', x ,y);

	    if(piece.color === 'w'){
	    	return absoluteValue;
	    } else {
	    	return -absoluteValue;
	    }
	};


	var getAbsoluteValue = function (piece, isWhite, x ,y) {
        if (piece.type === 'p') {
            return 10 + ( isWhite ? whitePawnEval[y][x] : blackPawnEval[y][x] );
        } else if (piece.type === 'r') {
            return 50 + ( isWhite ? whiteRookEval[y][x] : blackRookEval[y][x] );
        } else if (piece.type === 'n') {
            return 30 + knightEval[y][x];
        } else if (piece.type === 'b') {
            return 30 + ( isWhite ? whiteBishopEval[y][x] : blackBishopEval[y][x] );
        } else if (piece.type === 'q') {
            return 90 + evalQueen[y][x];
        } else if (piece.type === 'k') {
            return 900 + ( isWhite ? whiteKingEval[y][x] : blackKingEval[y][x] );
        }
	};


	var makeAImove = function () {
	    var bestMove = calculateBestMove();
	    game.move(bestMove);
	    board.position(game.fen());
	};


	var onDrop = function(source, target) {
  	  removeGreySquares();

	  // see if the move is legal
	  var move = game.move({
	    from: source,
	    to: target,
	    promotion: 'q' 
	  });

	  // illegal move
	  if (move === null) return 'snapback';

	  // make legal move for black AI player
	  window.setTimeout(makeAImove, 250);
	};


	var onMouseoverSquare = function(square, piece) {
	  // get list of possible moves for this square
	  var moves = game.moves({
	    square: square,
	    verbose: true
	  });

	  // exit if there are no moves available for this square
	  if (moves.length === 0) return;

	  // highlight the square they moused over
	  greySquare(square);

	  // highlight the possible squares for this piece
	  for (var i = 0; i < moves.length; i++) {
	    greySquare(moves[i].to);
	  }
	};


	var onMouseoutSquare = function(square, piece) {
	  removeGreySquares();
	};


	// update the board position after the piece snap
	// for castling, en passant, pawn promotion
	var onSnapEnd = function() {
	  board.position(game.fen());
	};

	var cfg = {
	  draggable: true,
	  position: 'start',
	  onDragStart: onDragStart,
	  onDrop: onDrop,
	  onMouseoutSquare: onMouseoutSquare,
  	  onMouseoverSquare: onMouseoverSquare,
	  onSnapEnd: onSnapEnd
	};
	board = ChessBoard('board', cfg);
});