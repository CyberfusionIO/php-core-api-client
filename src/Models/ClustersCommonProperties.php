<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\EncryptionTypeEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClustersCommonProperties extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        string $imapHostname,
        int $imapPort,
        EncryptionTypeEnum $imapEncryption,
        string $smtpHostname,
        int $smtpPort,
        EncryptionTypeEnum $smtpEncryption,
        string $pop3Hostname,
        int $pop3Port,
        EncryptionTypeEnum $pop3Encryption,
        string $phpmyadminUrl,
    ) {
        $this->setImapHostname($imapHostname);
        $this->setImapPort($imapPort);
        $this->setImapEncryption($imapEncryption);
        $this->setSmtpHostname($smtpHostname);
        $this->setSmtpPort($smtpPort);
        $this->setSmtpEncryption($smtpEncryption);
        $this->setPop3Hostname($pop3Hostname);
        $this->setPop3Port($pop3Port);
        $this->setPop3Encryption($pop3Encryption);
        $this->setPhpmyadminUrl($phpmyadminUrl);
    }

    public function getImapHostname(): string
    {
        return $this->getAttribute('imapHostname');
    }

    public function setImapHostname(?string $imapHostname = null): self
    {
        $this->setAttribute('imap_hostname', $imapHostname);
        return $this;
    }

    public function getImapPort(): int
    {
        return $this->getAttribute('imapPort');
    }

    public function setImapPort(?int $imapPort = null): self
    {
        $this->setAttribute('imap_port', $imapPort);
        return $this;
    }

    public function getImapEncryption(): EncryptionTypeEnum
    {
        return $this->getAttribute('imapEncryption');
    }

    public function setImapEncryption(?EncryptionTypeEnum $imapEncryption = null): self
    {
        $this->setAttribute('imap_encryption', $imapEncryption);
        return $this;
    }

    public function getSmtpHostname(): string
    {
        return $this->getAttribute('smtpHostname');
    }

    public function setSmtpHostname(?string $smtpHostname = null): self
    {
        $this->setAttribute('smtp_hostname', $smtpHostname);
        return $this;
    }

    public function getSmtpPort(): int
    {
        return $this->getAttribute('smtpPort');
    }

    public function setSmtpPort(?int $smtpPort = null): self
    {
        $this->setAttribute('smtp_port', $smtpPort);
        return $this;
    }

    public function getSmtpEncryption(): EncryptionTypeEnum
    {
        return $this->getAttribute('smtpEncryption');
    }

    public function setSmtpEncryption(?EncryptionTypeEnum $smtpEncryption = null): self
    {
        $this->setAttribute('smtp_encryption', $smtpEncryption);
        return $this;
    }

    public function getPop3Hostname(): string
    {
        return $this->getAttribute('pop3Hostname');
    }

    public function setPop3Hostname(?string $pop3Hostname = null): self
    {
        $this->setAttribute('pop3_hostname', $pop3Hostname);
        return $this;
    }

    public function getPop3Port(): int
    {
        return $this->getAttribute('pop3Port');
    }

    public function setPop3Port(?int $pop3Port = null): self
    {
        $this->setAttribute('pop3_port', $pop3Port);
        return $this;
    }

    public function getPop3Encryption(): EncryptionTypeEnum
    {
        return $this->getAttribute('pop3Encryption');
    }

    public function setPop3Encryption(?EncryptionTypeEnum $pop3Encryption = null): self
    {
        $this->setAttribute('pop3_encryption', $pop3Encryption);
        return $this;
    }

    public function getPhpmyadminUrl(): string
    {
        return $this->getAttribute('phpmyadminUrl');
    }

    /**
     * @throws ValidationException
     */
    public function setPhpmyadminUrl(?string $phpmyadminUrl = null): self
    {
        Validator::create()
            ->length(min: 1, max: 2083)
            ->assert($phpmyadminUrl);
        $this->setAttribute('phpmyadmin_url', $phpmyadminUrl);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            imapHostname: Arr::get($data, 'imap_hostname'),
            imapPort: Arr::get($data, 'imap_port'),
            imapEncryption: EncryptionTypeEnum::tryFrom(Arr::get($data, 'imap_encryption')),
            smtpHostname: Arr::get($data, 'smtp_hostname'),
            smtpPort: Arr::get($data, 'smtp_port'),
            smtpEncryption: EncryptionTypeEnum::tryFrom(Arr::get($data, 'smtp_encryption')),
            pop3Hostname: Arr::get($data, 'pop3_hostname'),
            pop3Port: Arr::get($data, 'pop3_port'),
            pop3Encryption: EncryptionTypeEnum::tryFrom(Arr::get($data, 'pop3_encryption')),
            phpmyadminUrl: Arr::get($data, 'phpmyadmin_url'),
        ));
    }
}
