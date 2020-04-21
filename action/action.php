<?php
include_once '../class/QueueChain.php';
include_once '../class/StackChain.php';

$queue = new Queue();
$stack = new Stack(100);
$string = $_POST['string'];
try {
    for ($i = 0; $i < strlen($string); $i++) {
        $queue->enqueue($string[$i]);
        $stack->push($string[$i]);
    }
    $count = 0;
    $halfString = floor(strlen($string) / 2);
    for ($i = 0; $i < $halfString; $i++) {
        if ($queue->dequeue() != $stack->pop()) {
            break;
        } else {
            $count++;
        }
    }
    if ($count == $halfString) {
        echo "String is symmetric.";
    } else {
        echo "String isn't symmetric.";
    }
} catch (Exception $exception) {
    echo $exception->getMessage();
}