<?php

/**
 * Class reports
 */
class reports extends dbPDO
{


    public $connection;

    /**
     * @param $connection
     */
    public function __construct($connection)
    {
        $this->connection = $connection;
        parent::__construct($connection['dbName'], $connection['user'], $connection['pass'], $connection['opts'], $connection['dbType']);
    }


} 