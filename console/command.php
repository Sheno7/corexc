<?php

function run($option)
{
    switch ($option) {
        case 'test':

            echo "running ... \n" ;
            exec('nohup php -S 127.0.0.1:5001 ' . __DIR__ . '/../public/index.php > /dev/null  2>&1 & echo $!', $output, $returnVar);
            $pid = $output[0];
            exec('./vendor/bin/phpunit' . ' 2>&1', $output2, $returnVar);
            exec('kill ' . $pid);
            foreach ($output2 as $line){
                echo $line . "\n";
            }
            break;

        case 'serve' :

            echo "running ... \n" ;
            exec('php -S 127.0.0.1:5000 ' . __DIR__ . '/../public/index.php  2>&1 ', $output, $returnVar);

    }
}
