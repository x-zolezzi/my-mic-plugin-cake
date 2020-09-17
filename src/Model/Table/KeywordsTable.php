<?php

namespace MakeItCreative\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Keywords Model
 *
 * @property \MakeItCreative\Model\Table\SecteursTable&\Cake\ORM\Association\BelongsToMany $Secteurs
 *
 * @method \MakeItCreative\Model\Entity\Keyword get($primaryKey, $options = [])
 * @method \MakeItCreative\Model\Entity\Keyword newEntity($data = null, array $options = [])
 * @method \MakeItCreative\Model\Entity\Keyword[] newEntities(array $data, array $options = [])
 * @method \MakeItCreative\Model\Entity\Keyword|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \MakeItCreative\Model\Entity\Keyword saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \MakeItCreative\Model\Entity\Keyword patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \MakeItCreative\Model\Entity\Keyword[] patchEntities($entities, array $data, array $options = [])
 * @method \MakeItCreative\Model\Entity\Keyword findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class KeywordsTable extends Table
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

        $this->setTable('keywords');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Secteurs', [
            'foreignKey' => 'keyword_id',
            'targetForeignKey' => 'secteur_id',
            'joinTable' => 'keywords_secteurs',
            'className' => 'MakeItCreative.Secteurs',
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
            ->scalar('presentation')
            ->maxLength('presentation', 4294967295)
            ->requirePresence('presentation', 'create')
            ->notEmptyString('presentation');

        $validator
            ->integer('is_active')
            ->notEmptyString('is_active');

        return $validator;
    }
}
