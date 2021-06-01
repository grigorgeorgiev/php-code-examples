<?php 

class First {

    public function __construct(){

        echo 'inFirstConstructor<br>';
        $this->testFunction();
    }

    protected function testFunction(){

        echo 'inFirstTestFunction<br>';
    }
}

class Second extends First {

    public function __construct(){

        echo 'inSecondConstructor<br>';
        parent::__construct();
    }

    public function testFunction(){

        echo 'inSecondTestFunction<br>';
        parent::testFunction();
    }
}

$test = new Second();

/**
 * output:
 * inSecondConstructor
 * inFirstConstructor
 * inSecondTestFunction
 * inFirstTestFunction
 */
