<?php
    class BaseClass{
        protected $name = "BaseClass";
        function __construct()
        {
            print("In ".$this->name. "constructors<br>");
        }
        function __destruct()
        {
            // TODO: Implement __destruct() method.
            print("Destroying " . $this->name. "<br>");
        }

    }
    class SubClass extends BaseClass{
        function __construct()
        {
            $this->name = "SubClass";
            parent::__construct();
        }
        function __destruct()
        {
            parent::__destruct(); // TODO: Change the autogenerated stub
        }

    }
$obj1 = new SubClass();
    $obj1 = NULL;
$obj2 = new BaseClass();


?>
