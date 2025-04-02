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
        return $this->getAttribute('apcEnableCli');
    }

    public function setApcEnableCli(bool $apcEnableCli): self
    {
        $this->setAttribute('apc_enable_cli', $apcEnableCli);
        return $this;
    }

    public function getOpcacheFileCache(): bool
    {
        return $this->getAttribute('opcacheFileCache');
    }

    public function setOpcacheFileCache(bool $opcacheFileCache): self
    {
        $this->setAttribute('opcache_file_cache', $opcacheFileCache);
        return $this;
    }

    public function getOpcacheValidateTimestamps(): bool
    {
        return $this->getAttribute('opcacheValidateTimestamps');
    }

    public function setOpcacheValidateTimestamps(bool $opcacheValidateTimestamps): self
    {
        $this->setAttribute('opcache_validate_timestamps', $opcacheValidateTimestamps);
        return $this;
    }

    public function getShortOpenTag(): bool
    {
        return $this->getAttribute('shortOpenTag');
    }

    public function setShortOpenTag(bool $shortOpenTag): self
    {
        $this->setAttribute('short_open_tag', $shortOpenTag);
        return $this;
    }

    public function getErrorReporting(): string
    {
        return $this->getAttribute('errorReporting');
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
        return $this->getAttribute('opcacheMemoryConsumption');
    }

    public function setOpcacheMemoryConsumption(int $opcacheMemoryConsumption): self
    {
        $this->setAttribute('opcache_memory_consumption', $opcacheMemoryConsumption);
        return $this;
    }

    public function getMaxExecutionTime(): int
    {
        return $this->getAttribute('maxExecutionTime');
    }

    public function setMaxExecutionTime(int $maxExecutionTime): self
    {
        $this->setAttribute('max_execution_time', $maxExecutionTime);
        return $this;
    }

    public function getMaxFileUploads(): int
    {
        return $this->getAttribute('maxFileUploads');
    }

    public function setMaxFileUploads(int $maxFileUploads): self
    {
        $this->setAttribute('max_file_uploads', $maxFileUploads);
        return $this;
    }

    public function getMemoryLimit(): int
    {
        return $this->getAttribute('memoryLimit');
    }

    public function setMemoryLimit(int $memoryLimit): self
    {
        $this->setAttribute('memory_limit', $memoryLimit);
        return $this;
    }

    public function getPostMaxSize(): int
    {
        return $this->getAttribute('postMaxSize');
    }

    public function setPostMaxSize(int $postMaxSize): self
    {
        $this->setAttribute('post_max_size', $postMaxSize);
        return $this;
    }

    public function getUploadMaxFilesize(): int
    {
        return $this->getAttribute('uploadMaxFilesize');
    }

    public function setUploadMaxFilesize(int $uploadMaxFilesize): self
    {
        $this->setAttribute('upload_max_filesize', $uploadMaxFilesize);
        return $this;
    }

    public function getTidewaysApiKey(): string|null
    {
        return $this->getAttribute('tidewaysApiKey');
    }

    public function setTidewaysApiKey(?string $tidewaysApiKey): self
    {
        $this->setAttribute('tideways_api_key', $tidewaysApiKey);
        return $this;
    }

    public function getTidewaysSampleRate(): int|null
    {
        return $this->getAttribute('tidewaysSampleRate');
    }

    public function setTidewaysSampleRate(?int $tidewaysSampleRate): self
    {
        $this->setAttribute('tideways_sample_rate', $tidewaysSampleRate);
        return $this;
    }

    public function getNewrelicBrowserMonitoringAutoInstrument(): bool
    {
        return $this->getAttribute('newrelicBrowserMonitoringAutoInstrument');
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
            ->setApcEnableCli(Arr::get($data, 'apc_enable_cli'))
            ->setOpcacheFileCache(Arr::get($data, 'opcache_file_cache'))
            ->setOpcacheValidateTimestamps(Arr::get($data, 'opcache_validate_timestamps'))
            ->setShortOpenTag(Arr::get($data, 'short_open_tag'))
            ->setErrorReporting(Arr::get($data, 'error_reporting'))
            ->setOpcacheMemoryConsumption(Arr::get($data, 'opcache_memory_consumption'))
            ->setMaxExecutionTime(Arr::get($data, 'max_execution_time'))
            ->setMaxFileUploads(Arr::get($data, 'max_file_uploads'))
            ->setMemoryLimit(Arr::get($data, 'memory_limit'))
            ->setPostMaxSize(Arr::get($data, 'post_max_size'))
            ->setUploadMaxFilesize(Arr::get($data, 'upload_max_filesize'))
            ->setTidewaysApiKey(Arr::get($data, 'tideways_api_key'))
            ->setTidewaysSampleRate(Arr::get($data, 'tideways_sample_rate'))
            ->setNewrelicBrowserMonitoringAutoInstrument(Arr::get($data, 'newrelic_browser_monitoring_auto_instrument'));
    }
}
