<?php

class ParentClass {
    protected $table_name;

    public function __construct() {
        $this->table_name = "parent_table";
    }

    public function getTableName() {
        return $this->table_name;
    }

    public function check()
    {
        return $this->table_name;
    }
}

class ChildA extends ParentClass {
    public function __construct() {
        parent::__construct();
        $this->table_name = "child_a_table";
    }

    public function getParentTableName() {
        return parent::getTableName();
    }

}

class ChildB extends ParentClass {
    public function __construct() {
        parent::__construct();
        $this->table_name = "child_b_table";
    }

    public function getParentTableName() {
        return parent::getTableName();
    }
}

// Example usage
$parent = new ParentClass();
$childA = new ChildA();
$childB = new ChildB();
$a=$childA->check();
echo "$a";
?>
