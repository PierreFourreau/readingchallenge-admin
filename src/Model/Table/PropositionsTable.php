<?php
namespace App\Model\Table;

use App\Model\Entity\Proposition;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Propositions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Categories
 */
class PropositionsTable extends Table
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

        $this->table('propositions');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Categories', [
            'foreignKey' => 'categorie_id',
            'joinType' => 'INNER'
        ]);
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('libelle_fr', 'create')
            ->notEmpty('libelle_fr');

        $validator
            ->requirePresence('libelle_en', 'create')
            ->notEmpty('libelle_en');

        $validator
            ->add('acceptation', 'valid', ['rule' => 'numeric'])
            ->requirePresence('acceptation', 'create')
            ->notEmpty('acceptation');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['categorie_id'], 'Categories'));
        return $rules;
    }
}
