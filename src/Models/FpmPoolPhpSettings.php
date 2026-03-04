<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class FpmPoolPhpSettings extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

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

    public function setErrorReporting(string $errorReporting): self
    {
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

    public function getSessionGcMaxlifetime(): int
    {
        return $this->getAttribute('session_gc_maxlifetime');
    }

    public function setSessionGcMaxlifetime(int $sessionGcMaxlifetime): self
    {
        $this->setAttribute('session_gc_maxlifetime', $sessionGcMaxlifetime);
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
            ->when(Arr::has($data, 'apc_enable_cli'), fn (self $model) => $model->setApcEnableCli(Arr::get($data, 'apc_enable_cli')))
            ->when(Arr::has($data, 'opcache_file_cache'), fn (self $model) => $model->setOpcacheFileCache(Arr::get($data, 'opcache_file_cache')))
            ->when(Arr::has($data, 'opcache_validate_timestamps'), fn (self $model) => $model->setOpcacheValidateTimestamps(Arr::get($data, 'opcache_validate_timestamps')))
            ->when(Arr::has($data, 'short_open_tag'), fn (self $model) => $model->setShortOpenTag(Arr::get($data, 'short_open_tag')))
            ->when(Arr::has($data, 'error_reporting'), fn (self $model) => $model->setErrorReporting(Arr::get($data, 'error_reporting')))
            ->when(Arr::has($data, 'opcache_memory_consumption'), fn (self $model) => $model->setOpcacheMemoryConsumption(Arr::get($data, 'opcache_memory_consumption')))
            ->when(Arr::has($data, 'session_gc_maxlifetime'), fn (self $model) => $model->setSessionGcMaxlifetime(Arr::get($data, 'session_gc_maxlifetime')))
            ->when(Arr::has($data, 'max_execution_time'), fn (self $model) => $model->setMaxExecutionTime(Arr::get($data, 'max_execution_time')))
            ->when(Arr::has($data, 'max_file_uploads'), fn (self $model) => $model->setMaxFileUploads(Arr::get($data, 'max_file_uploads')))
            ->when(Arr::has($data, 'memory_limit'), fn (self $model) => $model->setMemoryLimit(Arr::get($data, 'memory_limit')))
            ->when(Arr::has($data, 'post_max_size'), fn (self $model) => $model->setPostMaxSize(Arr::get($data, 'post_max_size')))
            ->when(Arr::has($data, 'upload_max_filesize'), fn (self $model) => $model->setUploadMaxFilesize(Arr::get($data, 'upload_max_filesize')))
            ->when(Arr::has($data, 'tideways_api_key'), fn (self $model) => $model->setTidewaysApiKey(Arr::get($data, 'tideways_api_key')))
            ->when(Arr::has($data, 'tideways_sample_rate'), fn (self $model) => $model->setTidewaysSampleRate(Arr::get($data, 'tideways_sample_rate')))
            ->when(Arr::has($data, 'newrelic_browser_monitoring_auto_instrument'), fn (self $model) => $model->setNewrelicBrowserMonitoringAutoInstrument(Arr::get($data, 'newrelic_browser_monitoring_auto_instrument')));
    }
}
