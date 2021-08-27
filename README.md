# limit-by-ip-rotation

##### Problem:
Struggling with 3rd party API limit, they limit n requests per second per IP address


##### Expected:
Easily call api without

##### Solution:
By using this package, you're using:
- ip rotation via proxy 
- rate limiter to control request rate

# Installation
You can install this lib by 2 methods:

## using composer
This project using composer.

```bash
composer require mars-php-utils/rate-limit-bypass
```

## Manual install
checkout repos at:
```
vendor_dev/rate-limiter-bypass
```

composer.json
```
"repositories": [
    {
        "type": "path",
        "url": "vendor_dev/rate-limiter-bypass"
    }
],
```

# How to use

Assuming you're using `curl` to make request:
```php
function getUser($id) {
    $curl = curl("https://example-api.com/user/$id");
    curl_setopt_array($curl, $your_options);
    $response = curl_exec($curl);
    return $response;
}
```

You just need to:
```php
use RateLimitBypass\IpRateLimitHelper;


$max_request_per_second = 10;
$proxies = [...];
$rotator = new IpRateLimitHelper($proxies, $max_request_per_second);

function getUser($id) {
    $proxy_opt = $rotator->tap();
    
    $curl = curl("https://example-api.com/user/$id");

    $your_options = array_merge_recursive($your_options, $proxy_opt);
    
    curl_setopt_array($curl, $your_options);
    $response = curl_exec($curl);
    return $response;
}
```


# Limit by api keys rotation

```php
use RateLimitBypass\ApiKeyRateLimitHelper;

$max_request_per_second = 10;
$api_keys = [...];
$rotator = new ApiKeyRateLimitHelper($api_keys, $max_request_per_second);

function getUser($id) {
    $api_key = $rotator->tap(); // api key can be in query string, headers, path, ... depend on the API endpoint
    
    $curl = curl("https://example-api.com/user/$id?apiKey=$api_key");
    curl_setopt_array($curl, $your_options);
    $response = curl_exec($curl);
    return $response;
}
```


# Local Development

composer.json
```
"repositories": [
        {
            "type": "path",
            "url": "vendor_dev/mars-php-utils/rate-limit-bypass"
        }
    ],
```

then run :
```
composer require mars-php-utils/rate-limit-bypass
```

composer will do symlink vendor/mars-php-utils to vendor_dev/mars-php-utils