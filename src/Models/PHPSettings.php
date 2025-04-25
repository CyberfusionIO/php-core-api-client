<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

/**
 * Default PHP settings for CLI and FPM pools.
 *
 * To override PHP settings for a specific virtual host, see 'Override PHP settings for virtual host'.
 */
class PHPSettings extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

    public function getApcEnableCli(): bool
    {
        return $this->getAttribute('apc_enable_cli');
    }

    public function setApcEnableCli(bool $apcEnableCli): self
    {
        $this->setAttribute('apc_enable_cli', $apcEnableCli);
        return $this;
    }

    public function getOpcacheFileCache(): bool
    {
        return $this->getAttribute('opcache_file_cache');
    }

    public function setOpcacheFileCache(bool $opcacheFileCache): self
    {
        $this->setAttribute('opcache_file_cache', $opcacheFileCache);
        return $this;
    }

    public function getOpcacheValidateTimestamps(): bool
    {
        return $this->getAttribute('opcache_validate_timestamps');
    }

    public function setOpcacheValidateTimestamps(bool $opcacheValidateTimestamps): self
    {
        $this->setAttribute('opcache_validate_timestamps', $opcacheValidateTimestamps);
        return $this;
    }

    public function getShortOpenTag(): bool
    {
        return $this->getAttribute('short_open_tag');
    }

    public function setShortOpenTag(bool $shortOpenTag): self
    {
        $this->setAttribute('short_open_tag', $shortOpenTag);
        return $this;
    }

    public function getErrorReporting(): string
    {
        return $this->getAttribute('error_reporting');
    }

    /**
     * @throws ValidationException
     */
    public function setErrorReporting(string $errorReporting): self
    {
        Validator::optional(Validator::create()
            ->length(min: 1, max: 255)
            ->regex('/^[A-Z&~_ ]+$/'))
            ->assert($errorReporting);
        $this->setAttribute('error_reporting', $errorReporting);
        return $this;
    }

    public function getOpcacheMemoryConsumption(): int
    {
        return $this->getAttribute('opcache_memory_consumption');
    }

    public function setOpcacheMemoryConsumption(int $opcacheMemoryConsumption): self
    {
        $this->setAttribute('opcache_memory_consumption', $opcacheMemoryConsumption);
        return $this;
    }

    public function getMaxExecutionTime(): int
    {
        return $this->getAttribute('max_execution_time');
    }

    public function setMaxExecutionTime(int $maxExecutionTime): self
    {
        $this->setAttribute('max_execution_time', $maxExecutionTime);
        return $this;
    }

    public function getMaxFileUploads(): int
    {
        return $this->getAttribute('max_file_uploads');
    }

    public function setMaxFileUploads(int $maxFileUploads): self
    {
        $this->setAttribute('max_file_uploads', $maxFileUploads);
        return $this;
    }

    public function getMemoryLimit(): int
    {
        return $this->getAttribute('memory_limit');
    }

    public function setMemoryLimit(int $memoryLimit): self
    {
        $this->setAttribute('memory_limit', $memoryLimit);
        return $this;
    }

    public function getPostMaxSize(): int
    {
        return $this->getAttribute('post_max_size');
    }

    public function setPostMaxSize(int $postMaxSize): self
    {
        $this->setAttribute('post_max_size', $postMaxSize);
        return $this;
    }

    public function getUploadMaxFilesize(): int
    {
        return $this->getAttribute('upload_max_filesize');
    }

    public function setUploadMaxFilesize(int $uploadMaxFilesize): self
    {
        $this->setAttribute('upload_max_filesize', $uploadMaxFilesize);
        return $this;
    }

    public function getTidewaysApiKey(): string|null
    {
        return $this->getAttribute('tideways_api_key');
    }

    public function setTidewaysApiKey(?string $tidewaysApiKey): self
    {
        $this->setAttribute('tideways_api_key', $tidewaysApiKey);
        return $this;
    }

    public function getTidewaysSampleRate(): int|null
    {
        return $this->getAttribute('tideways_sample_rate');
    }

    public function setTidewaysSampleRate(?int $tidewaysSampleRate): self
    {
        $this->setAttribute('tideways_sample_rate', $tidewaysSampleRate);
        return $this;
    }

    public function getNewrelicBrowserMonitoringAutoInstrument(): bool
    {
        return $this->getAttribute('newrelic_browser_monitoring_auto_instrument');
    }

    public function setNewrelicBrowserMonitoringAutoInstrument(bool $newrelicBrowserMonitoringAutoInstrument): self
    {
        $this->setAttribute('newrelic_browser_monitoring_auto_instrument', $newrelicBrowserMonitoringAutoInstrument);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->setApcEnableCli(Arr::get($data, 'apc_enable_cli', false))
            ->setOpcacheFileCache(Arr::get($data, 'opcache_file_cache', false))
            ->setOpcacheValidateTimestamps(Arr::get($data, 'opcache_validate_timestamps', true))
            ->setShortOpenTag(Arr::get($data, 'short_open_tag', false))
            ->setErrorReporting(Arr::get($data, 'error_reporting', 'E_ALL & ~E_DEPRECATED & ~E_STRICT'))
            ->setOpcacheMemoryConsumption(Arr::get($data, 'opcache_memory_consumption', 192))
            ->setMaxExecutionTime(Arr::get($data, 'max_execution_time', 120))
            ->setMaxFileUploads(Arr::get($data, 'max_file_uploads', 100))
            ->setMemoryLimit(Arr::get($data, 'memory_limit', 256))
            ->setPostMaxSize(Arr::get($data, 'post_max_size', 32))
            ->setUploadMaxFilesize(Arr::get($data, 'upload_max_filesize', 32))
            ->setTidewaysApiKey(Arr::get($data, 'tideways_api_key'))
            ->setTidewaysSampleRate(Arr::get($data, 'tideways_sample_rate'))
            ->setNewrelicBrowserMonitoringAutoInstrument(Arr::get($data, 'newrelic_browser_monitoring_auto_instrument', true));
    }
}
