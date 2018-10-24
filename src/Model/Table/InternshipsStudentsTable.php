<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Internshipsstudents Model
 *
 * @property \App\Model\Table\InternshipsTable|\Cake\ORM\Association\BelongsTo $Internships
 * @property \App\Model\Table\StudentsTable|\Cake\ORM\Association\BelongsTo $Students
 *
 * @method \App\Model\Entity\Internshipsstudent get($primaryKey, $options = [])
 * @method \App\Model\Entity\Internshipsstudent newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Internshipsstudent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Internshipsstudent|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Internshipsstudent|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Internshipsstudent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Internshipsstudent[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Internshipsstudent findOrCreate($search, callable $callback = null, $options = [])
 */
class InternshipsStudentsTable extends Table
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

        $this->setTable('internships_students');
        $this->setDisplayField('internship_id');
        $this->setPrimaryKey(['internship_id', 'student_id']);

        $this->belongsTo('Internships', [
            'foreignKey' => 'internship_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Students', [
            'foreignKey' => 'student_id',
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
        $rules->add($rules->existsIn(['internship_id'], 'Internships'));
        $rules->add($rules->existsIn(['student_id'], 'Students'));

        return $rules;
    }
}
