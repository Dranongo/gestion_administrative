<?php

namespace DAO;

use Model\AbstractModel;
use Model\Formation;
use Utils\DateHelper;

class FormationDAO extends DatabaseDAO
{
  /**
   * @var string
   */
  protected $configFileName = 'formation';

  /**
   * @var string
   */
  protected $tableName = 'formation';

  /**
   * @var DatabaseDAO
   */
  protected static $_instance = null;

  /**
   * @param array $data
   * @param bool $recursive
   * @return AbstractModel
   */
  protected function buildDomainObject(array $data, bool $recursive = false): AbstractModel
  {
    $formation = new Formation();
    if (array_key_exists('id', $data) && $data['id'] != null) {
      $formation->setId($data['id']);
    }
    $formation->setNom($data['nom'])
              ->setNiveau($data['niveau'])
              ->setOrganisme($data['organisme'])
              ->setLieu($data['lieu'])
              ->setDateDebut(DateHelper::convertDatabaseDateToDateTime($data['date_debut']))
              ->setDateFin(DateHelper::convertDatabaseDateToDateTime($data['date_fin']))
              ->setObtenu($data['obtenu']);

    if ($recursive) {
      $salarieDAO = \Model\Salarie::getDAOInstance();
      $salarie = $salarieDAO->find($data['id_salarie'], false);
      $formation->setSalarie($salarie);
    }

    return $formation;
  }
}