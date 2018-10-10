<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Internships Model
 *
 * @property \App\Model\Table\SupervisorsTable|\Cake\ORM\Association\BelongsTo $Supervisors
 * @property \App\Model\Table\MissionsTable|\Cake\ORM\Association\BelongsToMany $Missions
 * @property \App\Model\Table\TypesTable|\Cake\ORM\Association\BelongsToMany $Types
 *
 * @method \App\Model\Entity\Internship get($primaryKey, $options = [])
 * @method \App\Model\Entity\Internship newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Internship[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Internship|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Internship|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Internship patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Internship[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Internship findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InternshipsTable extends Table
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

        $this->setTable('internships');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Supervisors', [
            'foreignKey' => 'supervisor_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Missions', [
            'foreignKey' => 'internship_id',
            'targetForeignKey' => 'mission_id',
            'joinTable' => 'internships_missions'
        ]);
        $this->belongsToMany('Types', [
            'foreignKey' => 'internship_id',
            'targetForeignKey' => 'type_id',
            'joinTable' => 'internships_types'
        ]);
            $this->belongsTo('BuildingsTypes', [
            'foreignKey' => 'buildingType_id',
            'joinType' => 'INNER'
        ]);
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
            ->scalar('title')
            ->maxLength('title', 100)
            ->allowEmpty('title');

        $validator
            ->scalar('address')
            ->maxLength('address', 100)
            ->allowEmpty('address');

        $validator
            ->scalar('city')
            ->maxLength('city', 75)
            ->allowEmpty('city');

        $validator
            ->scalar('province')
            ->maxLength('province', 75)
            ->allowEmpty('province');

        $validator
            ->scalar('postal_code')
            ->maxLength('postal_code', 7)
            ->allowEmpty('postal_code');

        $validator
            ->scalar('administrative_region')
            ->maxLength('administrative_region', 75)
            ->allowEmpty('administrative_region');

        $validator
            ->boolean('actif')
            ->allowEmpty('actif');

        /*
        $validator
            ->scalar('building_type')
            ->maxLength('building_type', 255)
            ->requirePresence('building_type', 'create')
            ->notEmpty('building_type');
         * 
         */
        
        return $validator;
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
        $rules->add($rules->existsIn(['supervisor_id'], 'Supervisors'));

        return $rules;
    }
}
