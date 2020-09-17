<?php

namespace MakeItCreative\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Categories Model
 *
 * @property \MakeItCreative\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 * @property \MakeItCreative\Model\Table\CartesTable&\Cake\ORM\Association\HasMany $Cartes
 * @property \MakeItCreative\Model\Table\CategoriesTable&\Cake\ORM\Association\HasMany $Categories
 * @property \MakeItCreative\Model\Table\TagsTable&\Cake\ORM\Association\HasMany $Tags
 *
 * @method \MakeItCreative\Model\Entity\Category get($primaryKey, $options = [])
 * @method \MakeItCreative\Model\Entity\Category newEntity($data = null, array $options = [])
 * @method \MakeItCreative\Model\Entity\Category[] newEntities(array $data, array $options = [])
 * @method \MakeItCreative\Model\Entity\Category|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \MakeItCreative\Model\Entity\Category saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \MakeItCreative\Model\Entity\Category patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \MakeItCreative\Model\Entity\Category[] patchEntities($entities, array $data, array $options = [])
 * @method \MakeItCreative\Model\Entity\Category findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CategoriesTable extends Table
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

        $this->setTable('categories');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'className' => 'MakeItCreative.Categories',
        ]);
        $this->hasMany('Cartes', [
            'foreignKey' => 'category_id',
            'className' => 'MakeItCreative.Cartes',
        ]);
        $this->hasMany('Categories', [
            'foreignKey' => 'category_id',
            'className' => 'MakeItCreative.Categories',
        ]);
        $this->hasMany('Tags', [
            'foreignKey' => 'category_id',
            'className' => 'MakeItCreative.Tags',
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
            ->scalar('h1')
            ->maxLength('h1', 255)
            ->allowEmptyString('h1');

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
