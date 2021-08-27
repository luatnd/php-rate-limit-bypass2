<?php

namespace RateLimitBypass;

interface RateLimitBypass {
    public function __construct($data, $request_per_second);

    public function tap($foo_data = null);
}
