<?php

/**
 * Copyright (c) 2015 Hosting.com, Inc.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace HOSTING;


class LBHealthCheck
{
	const RESULT_SUCCESS_CODE	= "200";
	const RESULT_SUCCESS_MSG	= "OK";
	const RESULT_FAIL_CODE		= "500";
	const RESULT_FAIL_MSG		= "Internal Server Error";

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

	public static function fail($message = self::RESULT_FAIL_MSG, $data = false)
	{
		echo self::internalResult(self::RESULT_FAIL_CODE, $message, $data);
	}

	public static function success($message = self::RESULT_SUCCESS_MSG, $data = true)
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
		header('HTTP/1.1 ' . $code . ' ' . $message);
		echo \json_encode($data);
	}
}
