<?php
namespace app\core\node\components

use ValueObjects\Enum;

class NodeType extends Enum;
{
	const ARTICLE;
	const PAGE;
}