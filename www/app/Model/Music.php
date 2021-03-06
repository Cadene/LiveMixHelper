<?php
App::uses('AppModel', 'Model');
/**
 * Music Model
 *
 * @property Label $Label
 * @property Album $Album
 * @property Artist $Artist
 * @property Kind $Kind
 * @property Set $Set
 */
class Music extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'Musics';

/**
 * Use behaviour
 *
 *
 */
	/*public $actsAs = array(
		'Upload.Upload' => array(
			'fields' => array(
				'music' => 'files/:id'
			)
		)
	);*/

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'label_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'album_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)/*,
		'music_file' => array(
			'rule' => array('fileExtension', array('mp3','aac','jpg'))
		)*/
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Label' => array(
			'className' => 'Label',
			'foreignKey' => 'label_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Album' => array(
			'className' => 'Album',
			'foreignKey' => 'album_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Artist' => array(
			'className' => 'Artist',
			'joinTable' => 'Artists_Musics',
			'foreignKey' => 'music_id',
			'associationForeignKey' => 'artist_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Kind' => array(
			'className' => 'Kind',
			'joinTable' => 'Kinds_Musics',
			'foreignKey' => 'music_id',
			'associationForeignKey' => 'kind_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Set' => array(
			'className' => 'Set',
			'joinTable' => 'Sets_Musics',
			'foreignKey' => 'music_id',
			'associationForeignKey' => 'set_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

	public function beforeSave($options=array()) {
		if(!empty($this->data['Music']['youtube'])){
			$pattern = "/v=([a-zA-Z0-9_]*)/";//\^[&|#]/";
			$subject = $this->data['Music']['youtube'];
			if(preg_match($pattern,$subject,$matches)){
				$this->data['Music']['youtube'] = $matches[1];
			}else{
				$youtube = explode('/',$this->data['Music']['youtube']);
				$this->data['Music']['youtube'] = $youtube[count($youtube)-1];
			}
		}
		return true;
	}

	public function afterFind($results, $primary = false){
		return $results;
	}

}
