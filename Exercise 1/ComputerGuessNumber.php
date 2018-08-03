<?php
    require_once "IOperation.php";

    class ComputerGuessNumber implements IOperation {
        var $start;
        var $end;
        var $pivot;

        function ComputerGuessNumber() {
            $this->start = 0;
            $this->end = 100;
        }

        function recursiveSearch() {
            $this->pivot = floor(( $this->start +  $this->end ) / 2);
            $answer = $this->askForNumber();

            $this->handlingAnswer($answer);
        }

        function initGuess() {
            $this->end = 100;
            $this->start = 0;
            $this->recursiveSearch();
        }

        function handlingAnswer($answer) {
            switch($answer) {
                case '=':
                    print "********************************\n I win! the selected number is $this->pivot\n********************************\n";
                    return true;
                case '-':
                    $this->end = $this->pivot;
                    return $this->recursiveSearch();
                case '+':
                    $this->start = $this->pivot + 1;
                    return $this->recursiveSearch();
                default:
                    $this->recursiveSearch();
            }
        }

        function askForNumber() {
            echo "Is it your number $this->pivot ? +(bigger) -(smaller) =(equal) :";
            fscanf(STDIN, "%c\n", $answer);
            return $answer;
        }

    }
?>
