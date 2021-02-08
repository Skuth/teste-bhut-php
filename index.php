<!-- 
# Challenge - Backend Developer
Using SOLID principles, write a program that prints all the numbers from 1 to 100.

However, for multiples of 3, instead of the number, print "BHUT".
For multiples of 5 print "IT". For numbers which are multiples of both 3 and 5, print "BHUT TI".

% 3 && % 5 = BHUT TI
% 3 = BHUT
% 5 = IT

But here's the catch: you can use only one `if`. No multiple branches, ternary operators or `else`.
# Requirements
* 1 if
* You can't use `else`, `else if` or ternary
* Unit tests
* You can write the challenge in any language you want. Here we are big fans of PHP

Need to create a class that verify the number and return the string.
Need to create a rule with all class that verify the number, and pass that rule to main main class.
On the main class need to run a loop and verify if number matchs in verify class, if matches, return the string, if not, return the number.
-->

<?php

require_once "./src/BhutIt.php";

$matchRules = [
  new BhutTi(),
  new Bhut(),
  new It()
];

$bhutIt = new BhutIt($matchRules);
$filteredList = $bhutIt->createNumberList(100);

foreach ($filteredList as $number) {
  echo("<pre>{$number}</pre>");
}

?>