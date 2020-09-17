<?php

namespace MakeItCreative\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Langues Model
 *
 * @method \MakeItCreative\Model\Entity\Langue get($primaryKey, $options = [])
 * @method \MakeItCreative\Model\Entity\Langue newEntity($data = null, array $options = [])
 * @method \MakeItCreative\Model\Entity\Langue[] newEntities(array $data, array $options = [])
 * @method \MakeItCreative\Model\Entity\Langue|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \MakeItCreative\Model\Entity\Langue saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \MakeItCreative\Model\Entity\Langue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \MakeItCreative\Model\Entity\Langue[] patchEntities($entities, array $data, array $options = [])
 * @method \MakeItCreative\Model\Entity\Langue findOrCreate($search, callable $callback = null, $options = [])
 */
class LanguesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('langues');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): \Cake\Validation\Validator
    {
        $validator
            ->scalar('id')
            ->maxLength('id', 2)
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }
}
