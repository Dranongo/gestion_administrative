<?php

namespace DAO;

use Model\AbstractModel;

class SalarieDAO extends DatabaseDAO
{
    /**
     * @var string
     */
    protected $tableName = 'salarie';

    /**
     * @param array $data
     * @param bool $recursive
     * @return AbstractModel
     */
    protected function buildDomainObject(array $data, bool $recursive = false): AbstractModel
    {
        
    }

    /**
     * @return array
     */
    protected function modelToDatabaseFields(): array
    {
        
    }

    /**
     * @return array
     */
    protected function modelToDatabaseForeignKeys(): array
    {

    }
}