<?php
    require_once "IOperation.php";

    class UserGuessNumber implements IOperation {
        var $min;
        var $max;
        var $ownNumber;

        function UserGuessNumber() {
            $this->min = 0;
            $this->max = 100;
        }

        function recursiveSearch() {
            echo "Choose a number from $this->min to $this->max: ";
		    fscanf(STDIN, "%d\n", $value);

		    if ($value && $this->valueIsInRange($value)) {

			    if ($this->ownNumber > $value) {
				    echo "My number is bigger\n";
				    $this->min = $value;
			    } elseif ( $this->ownNumber < $value) {
				    echo "My number is smaller\n";  
				    $this->max = $value;
			    } else {
                    print "***********************************\n You win! my selected number is $value\n***********************************\n";
				    return true;
                }
            }
            // When user no select a integer value in range then ask for value again
		    $this->recursiveSearch();
        }

        function initGuess() {
            $this->min = 1;
            $this->max = 100;
            $this->ownNumber = rand(1,100);
            $this->recursiveSearch();
        }

        function valueIsInRange($value) {
            return $value === min(max($value, $this->min), $this->max);
        }
    }
	
?>
