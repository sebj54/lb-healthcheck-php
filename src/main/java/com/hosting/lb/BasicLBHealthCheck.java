package com.hosting.lb;

public class BasicLBHealthCheck implements LBHealthCheck
{
	private static final int	RESULT_SUCCESS_CODE	= 200;
	private static final String	RESULT_SUCCESS_MSG	= "OK";
	private static final int	RESULT_ERROR_CODE	= 500;
	private static final String	RESULT_ERROR_MSG	= "Unspecified error";

	@Override
	public void success ()
	{
		success (RESULT_SUCCESS_MSG);
	}

	@Override
	public void success (String message)
	{
		result (RESULT_SUCCESS_CODE, message);
	}

	@Override
	public void fail ()
	{
		fail (RESULT_ERROR_MSG);
	}

	@Override
	public void fail (String message)
	{
		result (RESULT_ERROR_CODE, message);
	}

	@Override
	public void result (int code, String message)
	{
		// TODO Auto-generated method stub
		throw new UnsupportedOperationException ("Your coder neglected to build this method");
	}
}
