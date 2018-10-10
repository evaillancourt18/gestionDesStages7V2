<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Network\Session;
/**
 * Users Model
 *
 * @property \App\Model\Table\StudentsTable|\Cake\ORM\Association\HasMany $Students
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Students', [
            'foreignKey' => 'user_id'
        ]);

        $this->hasMany('Supervisors', [
            'foreignKey' => 'user_id'
        ]);

        $this->hasMany('Admins', [
            'foreignKey' => 'user_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->integer('id')
                ->allowEmpty('id', 'create');

        $validator
                ->email('email')
                ->requirePresence('email', 'create')
                ->notEmpty('email');

        $validator
                ->scalar('password')
                ->maxLength('password', 255)
                ->requirePresence('password', 'create')
                ->notEmpty('password');

        $validator
                ->scalar('role')
                ->maxLength('role', 255)
                ->requirePresence('role', 'create')
                ->notEmpty('role');
		
		$loguser = $this->getSessionUser();
		
		if($loguser == null OR $loguser['role'] == 'student') {
			$validator
                ->requirePresence('student_number', 'create')
                ->integer('student_number')
                ->notEmpty('student_number')
                ->add('student_number', [
                    'length' => [
                        'rule' => ['lengthBetween', 9, 9],
                        'message' => __('The student number must be 9 digits long')
                    ]
			]);
			
			$validator
                ->decimal('grade')
                ->requirePresence('grade', 'create')
                ->notEmpty('grade');
		}
		
        
		
        $validator
                ->requirePresence('last_name', 'create')
                ->scalar('last_name')
                ->maxLength('last_name', 255)
                ->notEmpty('last_name')
                ->add('last_name', [
                    'custom' => [
                        'rule' => function ($value, $context) {
                            $array = str_split($value);

                            if (!ctype_upper($array[0])) {
                                $message = _('The last name must start with an uppercase letter');
                                return $message;
                            } else {
                                return true;
                            }
                        }
                    ]
        ]);

        $validator
                ->requirePresence('first_name', 'create')
                ->scalar('first_name')
                ->maxLength('first_name', 255)
                ->notEmpty('first_name')
                ->add('first_name', [
                    'custom' => [
                        'rule' => function ($value, $context) {
                            $array = str_split($value);

                            if (ctype_upper($array[0])) {
                                return true;
                            } else {
                                $message = _('The first name must start with an uppercase letter');
                                return $message;
                            }
                        }
                    ]
        ]);

        $validator
                ->scalar('phone')
                ->requirePresence('phone', 'create')
                ->notEmpty('phone')
                ->add('phone', [
                    'custom' => [
                        'rule' => function ($value, $context) {
                            $pattern = '/^(\+0?1\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/';
                            if (preg_match($pattern, $value)) {
                                return true;
                            } else {
                                $message = _('The phone must follow the format 999-999-9999');
                                return $message;
                            }
                        }
                    ]
        ]);
                    
        if ($loguser['role'] == 'admin' || $loguser['role'] == 'supervisor') {
            $validator
                    ->scalar('cellphone')
                    ->requirePresence('cellphone', 'create')
                    ->notEmpty('cellphone')
                    ->add('cellphone', [
                        'custom' => [
                            'rule' => function ($value, $context) {
                                $pattern = '/^(\+0?1\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/';
                                if (preg_match($pattern, $value)) {
                                    return true;
                                } else {
                                    $message = _('The cellphone must follow the format 999-999-9999');
                                    return $message;
                                }
                            }
                        ]
            ]);
                        
            $validator
                    ->scalar('fax')
                    ->requirePresence('fax', 'create')
                    ->notEmpty('fax')
                    ->add('fax', [
                        'custom' => [
                            'rule' => function ($value, $context) {
                                $pattern = '/^(\+0?1\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/';
                                if (preg_match($pattern, $value)) {
                                    return true;
                                } else {
                                    $message = _('The fax must follow the format 999-999-9999');
                                    return $message;
                                }
                            }
                        ]
            ]);
            
            $validator
                ->scalar('gender')
                ->maxLength('gender', 255)
                ->requirePresence('gender', 'create')
                ->notEmpty('gender');            
        }

        return $validator;
		
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
	
	public function getSessionUser() {
		$session = new Session();
		return $session->read('Auth.User');
	}
}
