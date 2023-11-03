<?php
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

$test = new classprivate();
echo $test->getivpriv();
