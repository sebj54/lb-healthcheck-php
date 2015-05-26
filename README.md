# lb-healthcheck

## LB Health Check for PHP
We recommend you install the LB Health Check functions with the [Composer] dependency manager. Run this bash command in your project's root directory to download and install the latest stable version into your project's vendor/ directory.

```composer require hosting/lb-healthcheck```

Next, require the Composer autoloader into your PHP application:

```php
<?php
require 'vendor/autoload.php';
```

And you're ready to go.

Here's a fully functional example health check script using this library:

```php
<?php
require 'vendor/autoload.php';

function myHealthCheck()
{
  // simply return true if all of your health check logic works
  return true; // this example will always succeed if PHP is working
  // return false if you want to indicate a failure
}

\HOSTING\LBHealthCheck::process(myHealthCheck());
```

You can put all of your custom health check logic in the `myHealthCheck` function and then return `true` if it all worked out as expected or `false` if you encountered an error and the server should be removed from the load balancing group.

If you just want to make sure that the web server is working and that PHP is functioning properly, you can even use the script shown above as-is. Just drop it into the root of your PHP application as `health.php` and set your LB health check to use a standard status code check against `/health.php`.

Here is what that configuration would look like in the [HOSTING Customer Portal].

![HOSTING Cloud Load Balancer Example Config](https://raw.github.com/HOSTINGLabs/lb-healthcheck/master/examples/config/config-screencap.png)

[Composer]: https://getcomposer.org
[HOSTING Customer Portal]: https://portal.hosting.com
