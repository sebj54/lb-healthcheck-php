# lb-healthcheck

## LB Health Check for Java
This is just being built out, please stand by

## LB Health Check for PHP
We recommend you install the LB Health Check functions with the [Composer] dependency manager. Run this bash command in your project's root directory to download and install the latest stable version into your project's vendor/ directory.

```composer require hosting/lb-healthcheck```

Next, require the Composer autoloader into your PHP application:

```php
<?php
require 'vendor/autoload.php';
```

And you're ready to go.

This library is intended to be used most often with custom health check logic that you write and tests the critical components of your application. Examples of things to test would be:

* Connectivity to your database or other storage repository
* Availabilty of critical services (e.g., payment gateway, service bus)
* Functionality of core business logic (e.g., call some controller functions)

You can find examples of how to implement a health check script using your own custom logic in the [examples/php](examples/php) folder.

If you're just wanting to get started with the bare minimum or if you're only concerned about the web server responding to requests and executing PHP scripts, perhaps the bare minimum implementation is for you:

```php
<?php
require 'vendor/autoload.php';

\HOSTING\LBHealthCheck::success();
```

If PHP is working, that single call to \HOSTING\LBHealthCheck::success() will complete and return the necessary HTTP status code and string to inform the load balancer to keep the server as an active member of the cluster. If the webserver or PHP processing is broken, it will return an error or timeout which will cause the load balacner to eject the server from the load balancing group.

Here is what that Cloud Load Balancer configuration would look like in the [HOSTING Customer Portal].

![HOSTING Cloud Load Balancer Example Config](https://raw.github.com/HOSTINGLabs/lb-healthcheck/master/examples/config/config-screencap.png)

[Composer]: https://getcomposer.org
[HOSTING Customer Portal]: https://portal.hosting.com
