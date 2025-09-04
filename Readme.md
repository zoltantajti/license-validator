# License Validator Package

[![Latest Stable Version](https://poser.pugx.org/zoltantajti/license-validator/v/stable)](https://packagist.org/packages/zoltantajti/license-validator)
[![Total Downloads](https://poser.pugx.org/zoltantajti/license-validator/downloads)](https://packagist.org/packages/zoltantajti/license-validator)
[![License](https://poser.pugx.org/zoltantajti/license-validator/license)](https://packagist.org/packages/zoltantajti/license-validator)

A simple, framework-agnostic PHP package for remote license validation.

## Installation

```bash
composer require zoltantajti/license-validator
```

## Usage

```php
<?php

require __DIR__ . '/vendor/autoload.php';

use zoltantajti\LicenseValidator\Validator;

// Set the absolute path to your license.php file
Validator::setLicensePath(__DIR__ . '/path/to/your/license.php');

// Verify the license. The script will halt here if validation fails.
Validator::verify();

// If the script continues, the license is valid.
echo "Application is running with a valid license.";

```

## :warning: Important Notice: Private Use Only

**This package is designed for a specific, private software ecosystem and is not intended for public use.**

The validation logic is tied to a proprietary, closed-source license server (`licensesrv.tajtizoltan.hu`). As a result, this package will **not** function in any other environment. Attempting to use it in your own projects will result in fatal errors, as the validation endpoint will reject all unauthorized license keys.

This repository is maintained for dependency management purposes only. Please do not attempt to integrate it into your own applications.

## License

Proprietary License

Copyright (c) 2025 Zoltán Tajti. All Rights Reserved.

This software is the proprietary property of Zoltán Tajti and is protected by copyright law and international treaties.

**TERMS AND CONDITIONS FOR USE, REPRODUCTION, AND DISTRIBUTION**

Permission to use, copy, modify, or distribute this software and its documentation for any purpose is **hereby strictly prohibited** without the express prior written permission of Zoltán Tajti.

Unauthorized reproduction or distribution of this software, or any portion of it, may result in severe civil and criminal penalties, and will be prosecuted to the maximum extent possible under the law.

**NO WARRANTY**

THIS SOFTWARE IS PROVIDED "AS IS" WITHOUT ANY WARRANTY OF ANY KIND, EITHER EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE. THE ENTIRE RISK AS TO THE QUALITY AND PERFORMANCE OF THE SOFTWARE IS WITH YOU. SHOULD THE SOFTWARE PROVE DEFECTIVE, YOU ASSUME THE COST OF ALL NECESSARY SERVICING, REPAIR, OR CORRECTION.

IN NO EVENT SHALL ZOLTÁN TAJTI BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.