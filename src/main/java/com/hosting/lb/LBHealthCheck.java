package com.hosting.lb;

public interface LBHealthCheck
{
	public void success ();

	public void success (String message);

	public void fail ();

	public void fail (String message);

	public void result (int code, String message);
}