<?php

namespace MakeItCreative\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cartes Model
 *
 * @property \MakeItCreative\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 *
 * @method \MakeItCreative\Model\Entity\Carte get($primaryKey, $options = [])
 * @method \MakeItCreative\Model\Entity\Carte newEntity($data = null, array $options = [])
 * @method \MakeItCreative\Model\Entity\Carte[] newEntities(array $data, array $options = [])
 * @method \MakeItCreative\Model\Entity\Carte|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \MakeItCreative\Model\Entity\Carte saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \MakeItCreative\Model\Entity\Carte patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \MakeItCreative\Model\Entity\Carte[] patchEntities($entities, array $data, array $options = [])
 * @method \MakeItCreative\Model\Entity\Carte findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CartesTable extends Table
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

        $this->setTable('cartes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
            'className' => 'MakeItCreative.Categories',
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('url_slug')
            ->maxLength('url_slug', 255)
            ->requirePresence('url_slug', 'create')
            ->notEmptyString('url_slug');

        $validator
            ->scalar('img_path')
            ->maxLength('img_path', 255)
            ->requirePresence('img_path', 'create')
            ->notEmptyString('img_path');

        $validator
            ->scalar('content')
            ->maxLength('content', 4294967295)
            ->requirePresence('content', 'create')
            ->notEmptyString('content');

        $validator
            ->integer('is_active')
            ->notEmptyString('is_active');

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
        $rules->add($rules->existsIn(['category_id'], 'Categories'));

        return $rules;
    }
}
