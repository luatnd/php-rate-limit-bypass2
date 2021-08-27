<?php

namespace RateLimitBypass;


class ApiKeyLimitHelper implements RateLimitBypassInterface {

    public function __construct($data, $request_per_second) {

    }

    public function tap($foo_data = null) {
        // TODO: Implement tap() method.
        return null;
    }
}
