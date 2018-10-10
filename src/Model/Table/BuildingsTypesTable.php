<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BuildingsTypes Model
 *
 * @method \App\Model\Entity\BuildingsType get($primaryKey, $options = [])
 * @method \App\Model\Entity\BuildingsType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BuildingsType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BuildingsType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BuildingsType|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BuildingsType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BuildingsType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BuildingsType findOrCreate($search, callable $callback = null, $options = [])
 */
class BuildingsTypesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('buildings_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
		$this->hasMany('Internships', ['foreignKey'=>'buildingType_id']);
		
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }
}
