<?php

namespace MakeItCreative\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Secteurs Model
 *
 * @property \MakeItCreative\Model\Table\KeywordsTable&\Cake\ORM\Association\BelongsToMany $Keywords
 *
 * @method \MakeItCreative\Model\Entity\Secteur get($primaryKey, $options = [])
 * @method \MakeItCreative\Model\Entity\Secteur newEntity($data = null, array $options = [])
 * @method \MakeItCreative\Model\Entity\Secteur[] newEntities(array $data, array $options = [])
 * @method \MakeItCreative\Model\Entity\Secteur|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \MakeItCreative\Model\Entity\Secteur saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \MakeItCreative\Model\Entity\Secteur patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \MakeItCreative\Model\Entity\Secteur[] patchEntities($entities, array $data, array $options = [])
 * @method \MakeItCreative\Model\Entity\Secteur findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SecteursTable extends Table
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

        $this->setTable('secteurs');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Keywords', [
            'foreignKey' => 'secteur_id',
            'targetForeignKey' => 'keyword_id',
            'joinTable' => 'keywords_secteurs',
            'className' => 'MakeItCreative.Keywords',
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
            ->scalar('url_slug')
            ->maxLength('url_slug', 255)
            ->requirePresence('url_slug', 'create')
            ->notEmptyString('url_slug');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('h1')
            ->maxLength('h1', 255)
            ->requirePresence('h1', 'create')
            ->notEmptyString('h1');

        $validator
            ->scalar('presentation')
            ->maxLength('presentation', 16777215)
            ->requirePresence('presentation', 'create')
            ->notEmptyString('presentation');

        $validator
            ->integer('is_active')
            ->notEmptyString('is_active');

        return $validator;
    }
}
