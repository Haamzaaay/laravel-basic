<?php

namespace App\classes;

class ParentClass
{

    public function __construct()
    {
        dump("parent class constructor called");
    }
    public function title()
    {
        echo "parent class method called ";
    }
}
