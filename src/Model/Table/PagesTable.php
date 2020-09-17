<?php

namespace MakeItCreative\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pages Model
 *
 * @property &\Cake\ORM\Association\BelongsTo $PageCms
 * @property \MakeItCreative\Model\Table\ContentsTable&\Cake\ORM\Association\HasMany $Contents
 *
 * @method \MakeItCreative\Model\Entity\Page get($primaryKey, $options = [])
 * @method \MakeItCreative\Model\Entity\Page newEntity($data = null, array $options = [])
 * @method \MakeItCreative\Model\Entity\Page[] newEntities(array $data, array $options = [])
 * @method \MakeItCreative\Model\Entity\Page|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \MakeItCreative\Model\Entity\Page saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \MakeItCreative\Model\Entity\Page patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \MakeItCreative\Model\Entity\Page[] patchEntities($entities, array $data, array $options = [])
 * @method \MakeItCreative\Model\Entity\Page findOrCreate($search, callable $callback = null, $options = [])
 */
class PagesTable extends Table
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

        $this->setTable('pages');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('PageCms', [
            'foreignKey' => 'page_cms_id',
            'joinType' => 'INNER',
            'className' => 'MakeItCreative.PageCms',
        ]);
        $this->hasMany('Contents', [
            'foreignKey' => 'page_id',
            'className' => 'MakeItCreative.Contents',
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
            ->scalar('identifiant')
            ->maxLength('identifiant', 255)
            ->requirePresence('identifiant', 'create')
            ->notEmptyString('identifiant');

        $validator
            ->scalar('langue')
            ->maxLength('langue', 2)
            ->requirePresence('langue', 'create')
            ->notEmptyString('langue');

        $validator
            ->scalar('url')
            ->maxLength('url', 255)
            ->requirePresence('url', 'create')
            ->notEmptyString('url');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('h1')
            ->maxLength('h1', 255)
            ->requirePresence('h1', 'create')
            ->notEmptyString('h1');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->scalar('controller')
            ->maxLength('controller', 255)
            ->requirePresence('controller', 'create')
            ->notEmptyString('controller');

        $validator
            ->scalar('action')
            ->maxLength('action', 255)
            ->requirePresence('action', 'create')
            ->notEmptyString('action');

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
        $rules->add($rules->existsIn(['page_cms_id'], 'PageCms'));

        return $rules;
    }
}
