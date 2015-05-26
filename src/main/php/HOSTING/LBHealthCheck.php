<?php

namespace HOSTING;

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

	public static function process($checks)
	{
		$allChecksSuccessful = true;
		foreach($checks as $check)
		{
			if(!call_user_func($check))
			{
				$allChecksSuccessful = false;
			}
		}
		if($allChecksSuccessful)
		{
			self::success();
		}
		else
		{
			self::fail();
		}
	}

	public static function fail($message = self::RESULT_FAIL_MSG, $data = null)
	{
		echo self::internalResult(self::RESULT_FAIL_CODE, $message, $data);
	}

	public static function success($message = self::RESULT_SUCCESS_MSG, $data = null)
	{
		echo self::internalResult(self::RESULT_SUCCESS_CODE, $message, $data);
	}

	private static function internalResult($code, $message, $data)
	{
		http_response_code($code);
		header('Content-Type: application/json');
		return self::result($code, $message, $data);
	}

	public static function result($code, $message, $data)
	{
		return RestUtil::result(false, $code, $message, null, $data);
	}
}