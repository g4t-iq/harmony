<?php

namespace Tune\Support;

class DefaultProviders
{
    /**
     * The current providers.
     *
     * @var array
     */
    protected $providers;

    /**
     * Create a new default provider collection.
     *
     * @return void
     */
    public function __construct(?array $providers = null)
    {
        $this->providers = $providers ?: [
            \Tune\Auth\AuthServiceProvider::class,
            \Tune\Broadcasting\BroadcastServiceProvider::class,
            \Tune\Bus\BusServiceProvider::class,
            \Tune\Cache\CacheServiceProvider::class,
            \Tune\Foundation\Providers\ConsoleSupportServiceProvider::class,
            \Tune\Cookie\CookieServiceProvider::class,
            \Tune\Database\DatabaseServiceProvider::class,
            \Tune\Encryption\EncryptionServiceProvider::class,
            \Tune\Filesystem\FilesystemServiceProvider::class,
            \Tune\Foundation\Providers\FoundationServiceProvider::class,
            \Tune\Hashing\HashServiceProvider::class,
            \Tune\Mail\MailServiceProvider::class,
            \Tune\Notifications\NotificationServiceProvider::class,
            \Tune\Pagination\PaginationServiceProvider::class,
            \Tune\Pipeline\PipelineServiceProvider::class,
            \Tune\Queue\QueueServiceProvider::class,
            \Tune\Redis\RedisServiceProvider::class,
            \Tune\Auth\Passwords\PasswordResetServiceProvider::class,
            \Tune\Session\SessionServiceProvider::class,
            \Tune\Translation\TranslationServiceProvider::class,
            \Tune\Validation\ValidationServiceProvider::class,
            \Tune\View\ViewServiceProvider::class,
        ];
    }

    /**
     * Merge the given providers into the provider collection.
     *
     * @param  array  $providers
     * @return static
     */
    public function merge(array $providers)
    {
        $this->providers = array_merge($this->providers, $providers);

        return new static($this->providers);
    }

    /**
     * Replace the given providers with other providers.
     *
     * @param  array  $items
     * @return static
     */
    public function replace(array $replacements)
    {
        $current = collect($this->providers);

        foreach ($replacements as $from => $to) {
            $key = $current->search($from);

            $current = $key ? $current->replace([$key => $to]) : $current;
        }

        return new static($current->values()->toArray());
    }

    /**
     * Disable the given providers.
     *
     * @param  array  $providers
     * @return static
     */
    public function except(array $providers)
    {
        return new static(collect($this->providers)
                ->reject(fn ($p) => in_array($p, $providers))
                ->values()
                ->toArray());
    }

    /**
     * Convert the provider collection to an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->providers;
    }
}
