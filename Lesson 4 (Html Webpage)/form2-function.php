<?php
function displayOptions($option, $selectedValue){
    foreach ($option as $option) {
        $selected = '';
        $option = strtolower($option);
        if(in_array($option, $selectedValue)){
            $selected = ' selected';
        }
        printf("<option value='%s' %s>%s</option>\n", $option, $selected, ucwords($option));
    }
}