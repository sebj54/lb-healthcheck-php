<?php

namespace HOSTING\LBHealth;

use HOSTING\Commons\RestUtil;

class LBHealthCheckException extends \Exception
{
}

class LBHealthCheck
{

	const RESULT_SUCCESS_CODE	= "200";
	const RESULT_SUCCESS_MSG	= "OK";
	const RESULT_FAIL_CODE		= "500";
	const RESULT_FAIL_MSG		= "Unspecified error";

	public static function fail($message = self::RESULT_FAIL_MSG)
	{
		http_response_code($code);
		echo self::result(self::RESULT_FAIL_CODE, $message);
	}

	public static function success($message = self::RESULT_SUCCESS_MSG)
	{
		http_response_code($code);
		echo self::result(self::RESULT_SUCCESS_CODE, $message);
	}

	public static function result($code, $message)
	{
		return RestUtil::result(false, $code, $message, null, null);
	}
}