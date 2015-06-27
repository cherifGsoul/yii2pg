<?php
namespace app\core\behaviors;

use yii\db\BaseActiveRecord;
use yii\behaviors\AttributeBehavior;

use ValueObjects\Identity\UUID;

class UUIDBehavior extends AttributeBehavior
{

	public $uuidAttribute='guid';

	public $value;

	public function init()
	{
		parent::init();

		if (empty($this->attributes)) {
            $this->attributes = [BaseActiveRecord::EVENT_BEFORE_VALIDATE => $this->uuidAttribute];
        }
	}

	public function getValue($event)
	{
		$owner = $this->owner;
		$isNew = $owner->isNewRecord;

		if ($isNew) {
			$uuid = UUID::generateAsString();
		} else {
			$uuid = $owner->{$this->uuidAttribute};
		}

		return $uuid;
	}
}