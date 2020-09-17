<?php

namespace MakeItCreative\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contents Model
 *
 * @property \MakeItCreative\Model\Table\PagesTable&\Cake\ORM\Association\BelongsTo $Pages
 *
 * @method \MakeItCreative\Model\Entity\Content get($primaryKey, $options = [])
 * @method \MakeItCreative\Model\Entity\Content newEntity($data = null, array $options = [])
 * @method \MakeItCreative\Model\Entity\Content[] newEntities(array $data, array $options = [])
 * @method \MakeItCreative\Model\Entity\Content|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \MakeItCreative\Model\Entity\Content saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \MakeItCreative\Model\Entity\Content patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \MakeItCreative\Model\Entity\Content[] patchEntities($entities, array $data, array $options = [])
 * @method \MakeItCreative\Model\Entity\Content findOrCreate($search, callable $callback = null, $options = [])
 */
class ContentsTable extends Table
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

        $this->setTable('contents');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Pages', [
            'foreignKey' => 'page_id',
            'joinType' => 'INNER',
            'className' => 'MakeItCreative.Pages',
        ]);
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
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('partie')
            ->maxLength('partie', 255)
            ->requirePresence('partie', 'create')
            ->notEmptyString('partie');

        $validator
            ->scalar('champ')
            ->maxLength('champ', 255)
            ->requirePresence('champ', 'create')
            ->notEmptyString('champ');

        $validator
            ->scalar('content')
            ->requirePresence('content', 'create')
            ->notEmptyString('content');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): \Cake\ORM\RulesChecker
    {
        $rules->add($rules->existsIn(['page_id'], 'Pages'));

        return $rules;
    }
}
