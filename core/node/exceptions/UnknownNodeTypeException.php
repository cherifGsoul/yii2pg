<?php
namespace app\core\node\exceptions;


class UnknownNodeTypeException extends \Exception
{
	
	function getName()
	{
		return 'Unknow node type';
	}
}