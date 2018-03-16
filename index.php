<?php

fscanf(STDIN, "%d",
    $L
);
fscanf(STDIN, "%d",
    $H
);

// Create an alphabet table with numerical indexes
$alphabet = range('A', 'Z');
// Adding a 26th number for other characters
$otherCharacter = 26;

//Getting the message as array of letters
$messageLetters = str_split(stream_get_line(STDIN, 256 + 1, "\n"));

// Creates an array of numbers corresponding to the alphabet number of each letter
foreach ($messageLetters as $messageLetter) {

    $messageLetter = strtoupper($messageLetter);

    if (in_array($messageLetter, $alphabet)) {

        $startingPositions[] = ((array_search($messageLetter, $alphabet)) * $L);

    } else {

        $startingPositions[] = $otherCharacter * $L;

    }

}


$answer = '';

for ($i = 0; $i < $H; $i++) {

    // Provides the ASCII Art array line by line
    $ROW = stream_get_line(STDIN, 1024 + 1, "\n");

    $arrayROW = str_split($ROW);

    // Add to $answer the 4 characters for each number contained in the startingPositions array
    foreach ($startingPositions as $startingPosition) {

        for ($j = 0; $j < $L; $j++) {

            $answer .= $ROW[$startingPosition + $j];

        }

    }

    $answer .= "\n";

}


echo($answer);


?>