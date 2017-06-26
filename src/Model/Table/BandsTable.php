<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bands Model
 *
 * @method \App\Model\Entity\Band get($primaryKey, $options = [])
 * @method \App\Model\Entity\Band newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Band[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Band|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Band patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Band[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Band findOrCreate($search, callable $callback = null, $options = [])
 */
class BandsTable extends Table
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

        $this->setTable('bands');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');
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
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->decimal('frequency_start')
            ->requirePresence('frequency_start', 'create')
            ->notEmpty('frequency_start');

        $validator
            ->decimal('frequency_end')
            ->requirePresence('frequency_end', 'create')
            ->notEmpty('frequency_end');

        return $validator;
    }
}
