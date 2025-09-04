<?php
require __DIR__ . '/vendor/autoload.php';

use zoltantajti\LicenseValidator\Validator;

echo "Validator is starting...<br/>";

Validator::setLicensePath('' /*Insert your license.php file path*/);
Validator::verify();

echo "A license activated";