<?php
$globalVar = 10;
$initvalue = $globalVar;

function accessGlobal()
{
    global $globalVar;
    echo "Accessing globalVar from within the function: $globalVar<br>";
}

function modifyGlobal()
{
    global $globalVar;
    $globalVar = 20;
}

function mod()
{
    global $globalVar;
    $globalVar = 50;
}
function resetglobal()
{
    global $globalVar, $initvalue;
    $globalVar = $initvalue;
}
accessGlobal();
modifyGlobal();
accessGlobal();
mod();
accessGlobal();
modifyGlobal();
accessGlobal();
resetglobal();
echo "after reset " . $globalVar;
