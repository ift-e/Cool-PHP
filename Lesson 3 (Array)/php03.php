<?php
$food_name =  explode(', ', 'Apple, Briyani, Lebu');
echo join(', ',$food_name);
echo "\n";

// ================== multidimensional array

$food = [
    'fav_food' => explode(', ', 'biryani, Beef, Chicken'),
    'drink' => '7up, Pepsi, Cocacola',
    'fruits' => 'Apple, Orange',
];
array_push($food['fav_food'], 'Kacchi');
print_r($food['fav_food']);

$simple = [
    'test' => [
        'value1'=>[
            'a',
            'b',
            'c',
            'd',
        ]
    ],
    'test2' => [
        'e',
        'f',
        'g',
    ]
];

echo $simple['test']['value1'][2]."\n";

$simple2 = [
    [1, 2, 3, 4],
    [11, 22, 33, 44],
    [111, 222, 333, [5, 6, 7]],
];
print_r($simple2[2][3][2]);