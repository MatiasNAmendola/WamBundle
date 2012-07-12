<?php

require_once('Program.php');
require_once('Statement.php');
require_once('CodeReader.php');
require_once('CompilerStructure.php');
require_once('Compiler.php');
require_once('QueryCompiler.php');
require_once('PrologCompiler.php');
require_once('InnerClass.php');
require_once('PrologContext.php');
require_once('WAM.php');

/**
 * Description of PrologCompilerTest
 *
 * @author flo
 */
class PrologCompilerHornTest extends PHPUnit_Framework_TestCase
{

    private $compiler = null;

    protected function setUp()
    {
        $this->compiler = new PrologCompiler(new WAM(new Program()));
    }

    protected function tearDown()
    {
        unset($this->compiler);
    }

    public function testProgram()
    {
        $programList = $this->compiler->stringToList("human(X) :- mortal(X).");
        $struc = new CompilerStructure();
        $this->compiler->program($programList, $struc);
        $this->assertEquals(CompilerStructure::PROGRAM, $struc->type);
        return $struc->head;
    }

    /**
     * @depends testProgram
     */
    public function testClause(CompilerStructure $struc)
    {
        $this->assertEquals(CompilerStructure::CLAUSE, $struc->type);
        return $struc;
    }

    /**
     * @depends testClause
     */
    public function testClauseHead(CompilerStructure $struc)
    {
        $struc = $struc->head;
        $this->assertEquals(CompilerStructure::HEAD, $struc->type);
        return $struc;
    }

    /**
     * @depends testClause
     */
    public function testClauseBody(CompilerStructure $struc)
    {
        $struc = $struc->tail;
        $this->assertEquals(CompilerStructure::BODY, $struc->type);
        return $struc;
    }

    /**
     * @depends testClauseHead
     */
    public function testPredicate(CompilerStructure $struc)
    {
        $struc = $struc->head;
        $this->assertEquals(CompilerStructure::PREDICATE, $struc->type);
        $this->assertEquals('human', $struc->value);
    }

    /**
     * @depends testClauseHead
     */
    public function testList(CompilerStructure $struc)
    {
        $struc = $struc->tail;
        $this->assertEquals(CompilerStructure::LISTX, $struc->type);
        return $struc;
    }

    /**
     * @depends testList
     */
    public function testTerm1(CompilerStructure $struc)
    {
        $struc = $struc->head;
        $this->assertEquals(CompilerStructure::VARIABLE, $struc->type);
        $this->assertEquals('X', $struc->value);
    }

    /**
     * @depends testClauseBody
     */
    public function testBodyPredicate(CompilerStructure $struc)
    {
        $this->assertNull($struc->tail);
        $struc = $struc->head;
        $this->assertEquals(CompilerStructure::CALL, $struc->type);
        $struc = $struc->head;
        $this->assertEquals(CompilerStructure::PREDICATE, $struc->type);
        $this->assertEquals('mortal', $struc->value);
        return $struc->tail;
    }

    /**
     * @depends testBodyPredicate
     */
    public function testTerm2(CompilerStructure $struc)
    {
        $this->assertEquals(CompilerStructure::LISTX, $struc->type);
        $struc = $struc->head;
        $this->assertEquals(CompilerStructure::VARIABLE, $struc->type);
        $this->assertEquals('X', $struc->value);
    }

}

?>
