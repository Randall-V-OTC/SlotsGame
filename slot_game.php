<?php

    // an array to hold the a, b, and c characters
    $abc_arr = ['A' => 'a', 'B' => 'Bb', 'C' =>'c'];

    // an array to hold each spins win
    $winnings_arr = [];

    // a variable to hold the amount of spins performed
    $spins = 0;

    // a variable to hold the amount won
    $winnings = 0;

    // a while loop to check for 20 spins
    while(($spins <= 19) && ($winnings <= 499)) {

        // a variable to hold the randomized character string
        $char_str = null;

        // a variable to hold the iteration of spin
        //$spin = 0;

        // a for loop to pick three random characters
        for ($i = 0; $i <= 2; $i++) {

            //$char_str .= str_pad(array_rand($abc_arr), 1, $char_str, STR_PAD_RIGHT);
            $char_str .= array_rand($abc_arr);

        }
        $spins++;

        // a match expression to match str to a winning combination
        $winning_combo = match($char_str) {

            'AAA', 'BBB', 'CCC' => $winnings += 100,
            'AAB', 'ABA', 'BAA',
            'ABB', 'BBA', 'BAB',
            'BCC', 'CBC', 'CCB',
            'ACC', 'CAC', 'CCA' => $winnings += 50,
            default => $winnings += 0
        };

        array_push($winnings_arr, $winning_combo);

        // debugging
        echo("Spin # $spins = $char_str. You won $$winning_combo.\n");
    }

    //echo("\nTotal winnings: $$winnings\n");

    // another way to print each element
    foreach($winnings_arr as $spin => $win) {
        echo("Spin #$spin won $$win\n");
    }

    // display total winnings
    echo("\nTotal winnings: $$winnings\n");