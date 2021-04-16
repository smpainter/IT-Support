<?php
function selectme($a,$b)
{
    if ($a==$b){
        $result = 'selected';
    } else
    {
        $result = '';
    }
    return $result;
}
?>
