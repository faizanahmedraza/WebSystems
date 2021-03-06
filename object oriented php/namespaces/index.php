<?php
    /*
        PHP Namespaces provide a way in which to group related classes, interfaces, functions and constants.
        NameSpaces Solve two problems:
        1-Name collisions between code you create, and internal PHP classes/functions/constants or third-party classes/functions/constants.
        2-Ability to alias (or shorten) Extra_Long_Names designed to alleviate the first problem, improving readability of source code.
        3-They allow the same name to be used for more than one class in different namespace.

        Declaration just below php opening tag or before everything(set of instructions of script)
        Namespace names are case-insensitive.
        In simple words this is an virtual directory structure for classes and interfaces
        */

    // namespace first; 
    namespace second;
    include 'firstnamespace.php';
    include 'secondnamespace.php';
    include 'thirdnamespace.php';
    // use first\ABC;
    use first\ABC as FirstABC;
    use second\ABC as ABC;
    
    $obj1 = new FirstABC;
    $obj2 = new ABC; 
    $obj2->greeting();
    $obj2_1 = new DEF;
    $obj2_1->greeting();
    $obj3 = new \ABC; //from global space
?>