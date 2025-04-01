<?php

namespace Cyberfusion\CoreApi\Enums;

enum RedisEvictionPolicyEnum: string
{
    case VolatileTtl = 'volatile-ttl';
    case VolatileRandom = 'volatile-random';
    case AllkeysRandom = 'allkeys-random';
    case VolatileLfu = 'volatile-lfu';
    case VolatileLru = 'volatile-lru';
    case AllkeysLfu = 'allkeys-lfu';
    case AllkeysLru = 'allkeys-lru';
    case Noeviction = 'noeviction';
}
