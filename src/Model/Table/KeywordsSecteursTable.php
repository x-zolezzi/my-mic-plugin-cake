<?php

namespace MakeItCreative\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * KeywordsSecteurs Model
 *
 * @property \MakeItCreative\Model\Table\SecteursTable&\Cake\ORM\Association\BelongsTo $Secteurs
 * @property \MakeItCreative\Model\Table\KeywordsTable&\Cake\ORM\Association\BelongsTo $Keywords
 *
 * @method \MakeItCreative\Model\Entity\KeywordsSecteur get($primaryKey, $options = [])
 * @method \MakeItCreative\Model\Entity\KeywordsSecteur newEntity($data = null, array $options = [])
 * @method \MakeItCreative\Model\Entity\KeywordsSecteur[] newEntities(array $data, array $options = [])
 * @method \MakeItCreative\Model\Entity\KeywordsSecteur|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \MakeItCreative\Model\Entity\KeywordsSecteur saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \MakeItCreative\Model\Entity\KeywordsSecteur patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \MakeItCreative\Model\Entity\KeywordsSecteur[] patchEntities($entities, array $data, array $options = [])
 * @method \MakeItCreative\Model\Entity\KeywordsSecteur findOrCreate($search, callable $callback = null, $options = [])
 */
class KeywordsSecteursTable extends Table
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

        $this->setTable('keywords_secteurs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Secteurs', [
            'foreignKey' => 'secteur_id',
            'joinType' => 'INNER',
            'className' => 'MakeItCreative.Secteurs',
        ]);
        $this->belongsTo('Keywords', [
            'foreignKey' => 'keyword_id',
            'joinType' => 'INNER',
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
        $rules->add($rules->existsIn(['secteur_id'], 'Secteurs'));
        $rules->add($rules->existsIn(['keyword_id'], 'Keywords'));

        return $rules;
    }
}
