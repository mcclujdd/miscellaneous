<?php
// prime number detection algorithm

function check_primality(float $n): bool{
    //check if n/(each number between 2 and sqrt(n)) is int
    assert($n > 1);
    $sqrt_n = floor(sqrt($n));
    $i = $sqrt_n;
    while ($i > 1) {
        if ($n % $i == 0){
            global $factor_a, $factor_b; //is there a better way not using globals or OOP here?
            $factor_a = $i;
            $factor_b = $n / $i;
            assert($factor_a * $factor_b === $n);
            return 0;
        } else {
            $i -= 1;
        }
    }
    return 1;
}

function echo_primality(float $n): string{
    global $factor_a, $factor_b; //see comment in check_primality()
    if (check_primality($n)){
        echo "$n is prime.";
    } else {
        echo "$n is NOT prime. It is divisible by $factor_a and $factor_b.";
    }
}


echo_primality($n = 59); //should echo "59 is prime."
echo_primality($n = 57); //should echo "57 is NOT prime. It is divisible by 3 and 19."
