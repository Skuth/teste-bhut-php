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

?>