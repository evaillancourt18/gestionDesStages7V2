<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InternshipsMissions Model
 *
 * @property \App\Model\Table\InternshipsTable|\Cake\ORM\Association\BelongsTo $Internships
 * @property \App\Model\Table\MissionsTable|\Cake\ORM\Association\BelongsTo $Missions
 *
 * @method \App\Model\Entity\InternshipsMission get($primaryKey, $options = [])
 * @method \App\Model\Entity\InternshipsMission newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InternshipsMission[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InternshipsMission|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InternshipsMission|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InternshipsMission patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InternshipsMission[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InternshipsMission findOrCreate($search, callable $callback = null, $options = [])
 */
class InternshipsMissionsTable extends Table
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

        $this->setTable('internships_missions');
        $this->setDisplayField('internship_id');
        $this->setPrimaryKey(['internship_id', 'mission_id']);

        $this->belongsTo('Internships', [
            'foreignKey' => 'internship_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Missions', [
            'foreignKey' => 'mission_id',
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
        $rules->add($rules->existsIn(['mission_id'], 'Missions'));

        return $rules;
    }
}
