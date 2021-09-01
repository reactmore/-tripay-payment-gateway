<?php

namespace Reactmore\Tripay;

use Dotenv\Dotenv;
use Reactmore\Tripay\Services\Payment\InitPayment;
use Reactmore\Tripay\Services\Merchant\InitMerchant;
use Reactmore\Tripay\Helpers\FileHelper;
use Reactmore\Tripay\Helpers\Validations\MainValidator;


class Main implements MainInterface
{

    const DOT_ENV = '.env';


    public $credential, $stage;

    public function __construct(array $data = [])
    {
        MainValidator::validateCredentialRequest($data);
        $this->setEnvironmentFile();
        $this->setCredential($data);
    }

    private function setEnvironmentFile()
    {
        $envDirectory = FileHelper::getAbsolutePathOfAncestorFile(self::DOT_ENV);

        if (file_exists($envDirectory . '/' . self::DOT_ENV)) {
            $dotEnv = Dotenv::createMutable(FileHelper::getAbsolutePathOfAncestorFile(self::DOT_ENV));
            $dotEnv->load();
        }
    }

    private function setCredential($data)
    {

        if (empty($data['stage'])) {
            $this->stage = isset($_ENV['TRIPAY_STAGE']) ? $_ENV['TRIPAY_STAGE'] : 'SANDBOX';
        } else {
            $this->stage = $data['stage'];
        }

        $this->stage = strtoupper($this->stage) == 'PRODUCTION' ? 'PRODUCTION' : 'SANDBOX';

        if (empty($data['apiKey'])) {
            $this->credential['apiKey'] = isset($_ENV['TRIPAY_APIKEY_' . $this->stage]) ? $_ENV['TRIPAY_APIKEY_' . $this->stage] : '';
        } else {
            $this->credential['apiKey'] = $data['apiKey'];
        }

        if (empty($data['privateKey'])) {
            $this->credential['privateKey'] = isset($_ENV['TRIPAY_PKEY_' . $this->stage]) ? $_ENV['TRIPAY_PKEY_' . $this->stage] : '';
        } else {
            $this->credential['privateKey'] = $data['privateKey'];
        }

        if (empty($data['merchantCode'])) {
            $this->credential['merchantCode'] = isset($_ENV['TRIPAY_MERCHANTCODE_' . $this->stage]) ? $_ENV['TRIPAY_MERCHANTCODE_' . $this->stage] : '';
        } else {
            $this->credential['merchantCode'] = $data['merchantCode'];
        }
    }

    public function initPayment()
    {
        return new InitPayment($this);
    }

    public function initMerchant()
    {
        return new initMerchant($this);
    }

    public function initTransactions()
    {
        return new InitPayment($this);
    }
}
