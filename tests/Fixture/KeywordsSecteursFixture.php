<?php
namespace MakeItCreative\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * KeywordsSecteursFixture
 */
class KeywordsSecteursFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'secteur_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'keyword_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'url_slug' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'FK_keywords_secteurs_keywords' => ['type' => 'index', 'columns' => ['keyword_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'secteur_id_keyword_id' => ['type' => 'unique', 'columns' => ['secteur_id', 'keyword_id'], 'length' => []],
            'FK_keywords_secteurs_keywords' => ['type' => 'foreign', 'columns' => ['keyword_id'], 'references' => ['keywords', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'FK_keywords_secteurs_secteurs' => ['type' => 'foreign', 'columns' => ['secteur_id'], 'references' => ['secteurs', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'secteur_id' => 1,
                'keyword_id' => 1,
                'url_slug' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
