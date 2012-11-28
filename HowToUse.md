# How To Use this library

## In standalone mode
Open a command line interface and type :
``` bash
php console.php
```

## Using this library without symfony2
Perhaps you should have to modify the autoloader.
See the file test WAMService1Test.php for a real example
<pre><code class="php">
    $wam = new WAMService();
    $solve = $wam->runQuery("consult('" . FIXTURES_DIR . "fixtures1.pro').");
    $solve = $wam->runQuery("grandmother(X, luke).");
</code></pre>

## CLI with symfony2.1
Open a command line interface and type :
``` bash
php app/console wam:prolog:console
```

## service for symfony2.1
You can read PrologGuiController.php
Here is an example :
<pre><code class="php">
    $machine = $this->get('prolog.wam');
    $compiler = new Prolog\PrologCompiler($machine);
    $code = $compiler->compile($prog);
    $machine->addProgram($code);
    $result = $machine->runQuery($query);
</code></pre>