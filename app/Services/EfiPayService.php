<?php

namespace App\Services;

use Efi\Exception\EfiException;
use Efi\EfiPay;

class EfiPayService {

    protected $options;
    protected $api;

    public function __construct() {
        $this->options = config('services.efipay');
        $this->api = EfiPay::getInstance($this->options);
    }

    public function createCharge(array $params, array $body) {
        try {
            $pix = $this->api->pixCreateCharge($params, $body);

            if (isset($pix['txid'])) {
                $qrcode = $this->generateQRCode(['id' => $pix['loc']['id']]);
                return [
                    'pix' => $pix,
                    'qrcode' => $qrcode
                ];
            }

            return $pix;
        } catch (EfiException $e) {
            return [
                'code' => $e->code,
                'error' => $e->error,
                'errorDescription' => $e->errorDescription,
            ];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function generateQRCode(array $params) {
        try {
            return $this->api->pixGenerateQRCode($params);
        } catch (EfiException $e) {
            return [
                'code' => $e->code,
                'error' => $e->error,
                'errorDescription' => $e->errorDescription,
            ];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function generateTxid() {
        $baseStr = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $txid = '';
        for ($i = 0; $i < 26; $i++) {
            $txid .= $baseStr[random_int(0, strlen($baseStr) - 1)];
        }
        return $txid;
    }

    public function getCharge(string $inicio, string $fim) {
        try {
            $api = EfiPay::getInstance($this->options);
            //dd($api);
            $params = [
                "inicio" => $inicio,
                "fim" => $fim
                
            ];
            $response = $api->pixListCharges($params);

            return $response;
        } catch (Exception $e) {
            return [
                'code' => $e->code,
                'error' => $e->error,
                'errorDescription' => $e->errorDescription,
            ];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
