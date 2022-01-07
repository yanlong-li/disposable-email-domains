<?php

$newList = array_values(
    array_filter(
        array_unique(
            explode(
                "\n",
                file_get_contents('list.txt')
            )
        ),
        function ($item) {
            return str_contains(ltrim($item, "."), '.');
        }
    )
);
is_dir('log') || mkdir('log');
copy('list.txt', 'log/' . time() . '.txt');
sort($newList, SORT_STRING);

file_put_contents("list.txt", implode("\n", $newList));

