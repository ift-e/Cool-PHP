<?php
// Learn glob() funciton
echo "search only directory with a or s letter\n";

print_r(glob('./*{a,s}*', GLOB_ONLYDIR | GLOB_BRACE));

// Search All Jpg img
echo "Search All Jpg img recursive folders\n";
print_r(glob('./all_image/*/*.jpg'));

// Search All Png without overview specific name img
print_r(glob('./all_image/*/*[!overview].png')); 

