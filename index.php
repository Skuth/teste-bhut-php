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

interface VerifyMatchInterface {
  public function matches(int $number): bool;
  public function getMatch(): string;
}

class BhutTi implements VerifyMatchInterface {
  public function matches(int $number): bool {
    return $number % 3 === 0 && $number % 5 === 0;
  }

  public function getMatch(): string {
    return "BHUT TI";
  }
}

class Bhut implements VerifyMatchInterface {
  public function matches(int $number): bool {
    return $number % 3 === 0;
  }

  public function getMatch(): string {
    return "BHUT";
  }
}

class It implements VerifyMatchInterface {
  public function matches(int $number): bool {
    return $number % 5 === 0;
  }

  public function getMatch(): string {
    return "IT";
  }
}

class BhutIt {
  private $matchRules;

  public function __construct(array $matchRules) {
    $this->matchRules = $matchRules;
  }

  public function createNumberList(int $limit): array {
    $numberList = [];

    for ($i=1; $i <= $limit; $i++) {
      $numberList[] = $this->generateNumberList($i);
    }

    return $numberList;
  }

  private function generateNumberList(int $number): string {
    foreach ($this->matchRules as $rule) {
      if ($rule->matches($number)) return $rule->getMatch();
    }
    return (string) $number;
  }
}

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