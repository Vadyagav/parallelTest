<?php

require_once 'vendor/autoload.php';

class RoboFile extends \Robo\Tasks
{
    use \Codeception\Task\MergeReports;
    use \Codeception\Task\SplitTestsByGroups;

    public function parallelSplitTests()
    {
        $this->taskSplitTestFilesByGroups(2)
             ->projectRoot('.')
            ->testsFrom('tests/acceptance')
            ->groupsTo('tests/_data/paracept_')
            ->run();
    }

    public function parallelRun()
    {
        $parallel = $this->taskParallelExec();
        for ($i = 1;$i <=2; $i++) {
            $parallel->process(
                $this->taskCodecept()
                ->suite('acceptance')
                ->group("paracept_$i")
                ->xml("tests/_log/result_$i.xml")
            );
        }

        return $parallel->run();
    }

    public function parallelMergeResults()
    {
        $merge = $this->taskMergeXmlReports();
        for ($i = 1;$i <= 2; $i++) {
            $merge->from("tests/_output/tests/_log/result_$i.xml");
        }
        $merge->into("tests/_output/result_paracept.xml")->run();
    }

    function parallelAll()
    {
        $this->parallelSplitTests();
        $result = $this->parallelRun();
//        $this->parallelMergeResults();
        return $result;
    }
    // define public methods as commands
}