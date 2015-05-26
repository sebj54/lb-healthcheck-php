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

	public static function fail($message = self::RESULT_FAIL_MSG, $data = null)
	{
		$log = LogUtil::initStaticLogger(__CLASS__, __METHOD__, func_get_args());
		echo self::internalResult(self::RESULT_FAIL_CODE, $message, $data);
	}

	public static function success($message = self::RESULT_SUCCESS_MSG, $data = null)
	{
		$log = LogUtil::initStaticLogger(__CLASS__, __METHOD__, func_get_args());
		echo self::internalResult(self::RESULT_SUCCESS_CODE, $message, $data);
	}

	private static function internalResult($code, $message, $data)
	{
		$log = LogUtil::initStaticLogger(__CLASS__, __METHOD__, func_get_args());
		http_response_code($code);
		return self::result($code, $message, $data);
	}

	public static function result($code, $message, $data)
	{
		$log = LogUtil::initStaticLogger(__CLASS__, __METHOD__, func_get_args());
		return RestUtil::result(false, $code, $message, null, $data);
	}
}