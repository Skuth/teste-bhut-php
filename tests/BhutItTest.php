<?php

use PHPUnit\Framework\TestCase;

require_once "./src/BhutIt.php";

final class BhutItTest extends TestCase
{
  public function testIfNumberMatches(): void {
    $matchRules = [
      new BhutTi(),
      new Bhut(),
      new It()
    ];

    $bhutIt = new bhutIt($matchRules);
    $filteredList = $bhutIt->createNumberList(15);

    $this->assertEquals([
      "1",
      "2",
      "BHUT",
      "4",
      "IT",
      "BHUT",
      "7",
      "8",
      "BHUT",
      "IT",
      "11",
      "BHUT",
      "13",
      "14",
      "BHUT TI",
    ], $filteredList);
  }
}

?>