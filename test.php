<?php

$foo = array('a', 'b', 'c', 'd', 'e', 'f');

echo '<pre>';
print_r($foo);

array_shift($foo);
array_shift($foo);

print_r($foo);
echo '</pre>';