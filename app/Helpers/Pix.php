<?php

namespace App\Helpers;

class Pix
{
    const ID_PAYLOAD_FORMAT_INDICATOR = '00';
    const ID_MERCHANT_ACCOUNT_INFORMATION = '26';
    const ID_MERCHANT_ACCOUNT_INFORMATION_GUI = '00';
    const ID_MERCHANT_ACCOUNT_INFORMATION_KEY = '01';
    const ID_MERCHANT_ACCOUNT_INFORMATION_DESCRIPTION = '02';
    const ID_MERCHANT_CATEGORY_CODE = '52';
    const ID_TRANSACTION_CURRENCY = '53';
    const ID_TRANSACTION_AMOUNT = '54';
    const ID_COUNTRY_CODE = '58';
    const ID_MERCHANT_NAME = '59';
    const ID_MERCHANT_CITY = '60';
    const ID_ADDITIONAL_DATA_FIELD_TEMPLATE = '62';
    const ID_ADDITIONAL_DATA_FIELD_TEMPLATE_TXID = '05';
    const ID_CRC16 = '63';

    /**
     * Chave Pix
     * @var string
     */
    private $pixKey;

    /**
     * Descrição do Pagamento
     * @var string
     */
    private $description;

    /**
     * Nome do Titular da Conta
     * @var string
     */
    private $merchantName;

    /**
     * Cidade do Titular da Conta
     * @var string
     */
    private $merchantCity;

    /**
     * ID da Transação
     * @var string
     */
    private $txId;

    /**
     * Valor da Transação
     * @var string
     */
    private $amount;

    /**
     * @param string $pixKey
     * @return $this
     */
    public function setPixKey(string $pixKey)
    {
        $this->pixKey = $pixKey;
        return $this;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param string $merchantName
     * @return $this
     */
    public function setMerchantName(string $merchantName)
    {
        $this->merchantName = $merchantName;
        return $this;
    }

    /**
     * @param string $merchantCity
     * @return $this
     */
    public function setMerchantCity(string $merchantCity)
    {
        $this->merchantCity = $merchantCity;
        return $this;
    }

    /**
     * @param string $txid
     * @return $this
     */
    public function setTxId(string $txid)
    {
        $this->txId = $txid;
        return $this;
    }

    /**
     * @param string|null $amount
     * @return $this
     */
    public function setAmount(string $amount = null)
    {
        $this->amount = '0';
        if ($amount) {
            $amount = str_replace(',', '.', str_replace('.', '', $amount));
            $this->amount = (string)number_format($amount, 2, '.', '');
        }
        return $this;
    }

    /**
     * @param string $id
     * @param string $value
     * @return string
     */
    private function getValue(string $id, string $value)
    {
        $size = str_pad(strlen($value), 2, '0', STR_PAD_LEFT);
        return $id . $size . $value;
    }

    /**
     * @return string
     */
    private function getMerchantAccountInformation()
    {
        $gui = $this->getValue(self::ID_MERCHANT_ACCOUNT_INFORMATION_GUI, 'br.gov.bcb.pix');
        $key = $this->getValue(self::ID_MERCHANT_ACCOUNT_INFORMATION_KEY, $this->pixKey);
        $desc = $this->getValue(self::ID_MERCHANT_ACCOUNT_INFORMATION_DESCRIPTION, $this->description);

        return $this->getValue(self::ID_MERCHANT_ACCOUNT_INFORMATION, $gui . $key . $desc);
    }

    /**
     * @return string
     */
    private function getAdditionalDataFieldTemplate()
    {
        $txid = $this->getValue(self::ID_ADDITIONAL_DATA_FIELD_TEMPLATE_TXID, $this->txId);

        return $this->getValue(self::ID_ADDITIONAL_DATA_FIELD_TEMPLATE, $txid);
    }

    /**
     * @param $payload
     * @return string
     */
    private function getCRC16($payload)
    {
        //ADICIONA DADOS GERAIS NO PAYLOAD
        $payload .= self::ID_CRC16 . '04';

        //DADOS DEFINIDOS PELO BACEN
        $polinomio = 0x1021;
        $resultado = 0xFFFF;

        //CHECKSUM
        if (($length = strlen($payload)) > 0) {
            for ($offset = 0; $offset < $length; $offset++) {
                $resultado ^= (ord($payload[$offset]) << 8);
                for ($bitwise = 0; $bitwise < 8; $bitwise++) {
                    if (($resultado <<= 1) & 0x10000) $resultado ^= $polinomio;
                    $resultado &= 0xFFFF;
                }
            }
        }

        //RETORNA CÓDIGO CRC16 DE 4 CARACTERES
        return self::ID_CRC16 . '04' . strtoupper(dechex($resultado));
    }

    /**
     * @return string
     */
    public function getPayload()
    {
        $payload = $this->getValue(self::ID_PAYLOAD_FORMAT_INDICATOR, '01') .
            $this->getMerchantAccountInformation() .
            $this->getValue(self::ID_MERCHANT_CATEGORY_CODE, '0000') .
            $this->getValue(self::ID_TRANSACTION_CURRENCY, '986') .
            $this->getValue(self::ID_TRANSACTION_AMOUNT, $this->amount) .
            $this->getValue(self::ID_COUNTRY_CODE, 'BR') .
            $this->getValue(self::ID_MERCHANT_NAME, $this->merchantName) .
            $this->getValue(self::ID_MERCHANT_CITY, $this->merchantCity) .
            $this->getAdditionalDataFieldTemplate();

        return $payload . $this->getCRC16($payload);
    }
}
