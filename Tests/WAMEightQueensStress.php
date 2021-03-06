<?php

use Trismegiste\WamBundle\Prolog\PrologCompiler;
use Trismegiste\WamBundle\Prolog\CompilerStructure;
use Trismegiste\WamBundle\Prolog\WAMService;
use Trismegiste\WamBundle\Prolog\Program;

/**
 * Test for WAMService : example of classical non deterministic problem
 */
class WAMEightQueensStress extends WAM_TestCase
{

    public function testFixtures()
    {
        $wam = new WAMService();

        $solve = $wam->runQuery("consult('" . FIXTURES_DIR . "eightqueens.pro').");
        $this->checkSuccess($solve);

        return $wam;
    }

    /**
     * @depends testFixtures
     */
    public function testAllSolutions(WAMService $wam)
    {
        $solve = $wam->runQuery("soluce(X), solution(X).");
        $this->assertCount(93, $solve);
        // there are 92 solutions to 8 queens problem
        for ($k = 0; $k < 92; $k++) {
            $row = $solve[$k];
            $this->assertTrue($row->succeed);
        }
        // the last is false (because backtrack)
        $this->assertFalse($solve[92]->succeed);
    }

}
