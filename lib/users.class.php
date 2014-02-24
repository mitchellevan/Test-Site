<?php

/**
 * Class users
 */
class users extends testSiteCRUD
{

    public $connection, $dbTable, $PKfield;

    /**
     * @param $connection
     */
    public function __construct($connection)
    {
        parent::__construct($connection);

        $this->PKfield = 'userKey';
        $this->dbTable = 'users';
        $this->connection = $connection
    }

} 