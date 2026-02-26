<?php

declare(strict_types=1);

namespace Gridwb\LaravelFunnelFox\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

readonly class VerifyWebhookAuthorization
{
    public function handle(Request $request, Closure $next): Response
    {
        $this->verify($request);

        return $next($request);
    }

    private function verify(Request $request): void
    {
        /** @var string|null $token */
        $token = $request->header('Fox-Secret-Key');

        if (empty($token)) {
            throw new AuthorizationException('Webhook token is not provided.');
        }

        /** @var string|null $secret */
        $secret = Config::get('funnelfox.webhook.secret');

        if (empty($secret)) {
            throw new AuthorizationException('Webhook secret is not configured.');
        }

        if (! hash_equals($token, $secret)) {
            throw new AuthorizationException('Invalid webhook authorization.');
        }
    }
}
