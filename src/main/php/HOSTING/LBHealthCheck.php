<?php

namespace HOSTING;

use HOSTING\Commons\LogUtil;
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
		$log->error("Failure with load balancer health check logic: '".$message."'");
		echo self::internalResult(self::RESULT_FAIL_CODE, $message, $data);
	}

	public static function success($message = self::RESULT_SUCCESS_MSG, $data = null)
	{
		$log = LogUtil::initStaticLogger(__CLASS__, __METHOD__, func_get_args());
		$log->debug("Success with load balancer health check logic: '".$message."'");
		echo self::internalResult(self::RESULT_SUCCESS_CODE, $message, $data);
	}

	private static function internalResult($code, $message, $data)
	{
		$log = LogUtil::initStaticLogger(__CLASS__, __METHOD__, func_get_args());
		$log->trace("Handling LB health check result");
		http_response_code($code);
		http_send_content_type("application/json");
		return self::result($code, $message, $data);
	}

	public static function result($code, $message, $data)
	{
		$log = LogUtil::initStaticLogger(__CLASS__, __METHOD__, func_get_args());
		$log->trace("Generating JSON result message [".$code."]".": ".$message);
		return RestUtil::result(false, $code, $message, null, $data);
	}
}