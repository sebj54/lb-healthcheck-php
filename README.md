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

Here's the simplest fully functional example health check script using this library:

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
