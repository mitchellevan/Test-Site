<?php

/**
 * Class results
 */
class results extends testSiteCRUD
{

    public $connection, $dbTable, $PKfield;

    /**
     * @param $connection
     */
    public function __construct($connection)
    {
        parent::__construct($connection);

        $this->PKfield = 'resultID';
        $this->dbTable = 'results';
        $this->connection = $connection
    }

} 