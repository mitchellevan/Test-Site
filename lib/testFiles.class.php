<?php

/**
 * Class testFiles
 */
class testFiles extends testSiteCRUD
{

    public $connection, $dbTable, $PKfield;

    /**
     * @param $connection
     */
    public function __construct($connection)
    {
        parent::__construct($connection);

        $this->PKfield = 'testFileID';
        $this->dbTable = 'testFiles';
        $this->connection = $connection
    }


} 