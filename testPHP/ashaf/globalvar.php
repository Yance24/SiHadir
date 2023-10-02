<?php
$globalVar = 10;
$initvalue = $globalVar;

class classprivate
{
    private $privatvar = 100;

    function getivpriv()
    {
        return $this->privatvar;
    }
    function modpriv($newprivate)
    {
        return $this->privatvar = $newprivate;
    }
}
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
//global
accessGlobal();
modifyGlobal();
accessGlobal();
mod();
accessGlobal();
modifyGlobal();
accessGlobal();
resetglobal();
echo "after reset " . $globalVar . "<br>";

//private
$objectprivate = new classprivate();
echo "nilai object private " . $objectprivate->getivpriv() . "<br>";
$objectprivate->modpriv(200);
echo "Nlai object private setelah dirubah " . $objectprivate->getivpriv();
