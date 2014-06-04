<?php

require "Queue.php";

$queue = new Queue();

for($i = 0; $i < 10; $i++) {
	$queue->enqueue($i);
}

for($i = 0; $i < 4; $i++) {
	echo $queue->dequeue();
}

echo $queue->peek();

echo $queue->search(9);

echo "<pre>";
print_r($queue);
echo "</pre>";
