<?php
	require "UserGuessNumber.php";
	require "ComputerGuessNumber.php";

	$userGuess = new UserGuessNumber();
	$computerGuess = new ComputerGuessNumber();

	echo "¡Hello, let's play a game!\n";
	menu($userGuess, $computerGuess);

	function menu($userGuess, $computerGuess) {
		echo "Type 'me' if you want to guess a number, otherwise I will guess a number: ";
		fscanf(STDIN, "%s\n", $value);
		$value === "me" ? $userGuess->initGuess() : $computerGuess->initGuess();
		menu($userGuess, $computerGuess);
	}
?>
