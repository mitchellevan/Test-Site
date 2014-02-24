<?php

/**
 * Class testSiteCRUD
 */
class testSiteCRUD extends CRUDAdminPDO
{

    public $connection, $dbTable, $PKfield;

    /**
     * @param $connection
     */
    public function __construct($connection)
    {
        $this->connection = $connection;
        parent::__construct($connection['dbName'], $connection['user'], $connection['pass'], $connection['opts'], $connection['dbType']);
    }
} 