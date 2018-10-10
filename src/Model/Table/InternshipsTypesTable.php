<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InternshipsTypes Model
 *
 * @property \App\Model\Table\InternshipsTable|\Cake\ORM\Association\BelongsTo $Internships
 * @property \App\Model\Table\TypesTable|\Cake\ORM\Association\BelongsTo $Types
 *
 * @method \App\Model\Entity\InternshipsType get($primaryKey, $options = [])
 * @method \App\Model\Entity\InternshipsType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InternshipsType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InternshipsType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InternshipsType|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InternshipsType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InternshipsType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InternshipsType findOrCreate($search, callable $callback = null, $options = [])
 */
class InternshipsTypesTable extends Table
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

        $this->setTable('internships_types');
        $this->setDisplayField('internship_id');
        $this->setPrimaryKey(['internship_id', 'type_id']);

        $this->belongsTo('Internships', [
            'foreignKey' => 'internship_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Types', [
            'foreignKey' => 'type_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['internship_id'], 'Internships'));
        $rules->add($rules->existsIn(['type_id'], 'Types'));

        return $rules;
    }
}
