<?php

function x($a)
{
    y($a);
}

function y($b)
{
    z($b * 2);
}

function z($c)
{
    if ($c < 20) {
        trigger_error("Too Small {$c}\n");
    } else {
        echo "{$c} is okay\n";
    }

    debug_print_backtrace();
    // print_r(debug_backtrace(0, 2));
}

function w($d, $e)
{
    x($d + $e);
}

z(23);

w(3, 2);
