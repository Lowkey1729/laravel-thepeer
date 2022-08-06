<?php

namespace Loki1729\LaravelThePeer\Services;


use Illuminate\Support\Facades\Config;
use Loki1729\LaravelThePeer\Traits\ThePeerRequestTrait;
use Loki1729\LaravelThePeer\Traits\ThePeerConfigurationTrait;

class ThePeer
{
    use ThePeerRequestTrait;

    private const USER = '/users';
    private const TRANSACTIONS = '/transaction';
    private const LINK = '/link';
    private const TEST_CREDIT = '/test/credit';
    private const TEST_CHARGE = '/test/charge';

    public function __construct($mode = '', $secret_key = '')
    {

        $this->setMode($mode)
            ->setConfig($secret_key)
            ->setHeaders();
    }

    public function indexUser(string $name, string $identifier, string $email): array
    {
        $payload = [
            'name' => $name,
            'identifier' => $identifier,
            'email' => $email
        ];
        $url = sprintf('%s%s', $this->baseUrl, self::USER);
        return $this->post($url, $payload);
    }

    public function allUsers(int $page = null, int $perPage = null): array
    {
        $url = sprintf('%s%s%s%s%s%s', $this->baseUrl, self::USER, '?page=', $page, '&perPage=', $perPage);
        return $this->get($url);
    }

    public function updateUser(string $userReference, string $identifier): array
    {
        $payload = [
            'identifier' => $identifier
        ];
        $url = sprintf('%s%s%s%s', $this->baseUrl, self::USER, '/', $userReference);
        return $this->put($url, $payload);

    }

    public function deleteUSer(string $userReference): array
    {
        $url = sprintf('%s%s%s%s', $this->baseUrl, self::USER, '/', $userReference);
        return $this->delete($url);
    }

    public function getUserLink(string $userReference): array
    {
        $url = sprintf('%s%s%s%s%s', $this->baseUrl, self::USER, '/', $userReference, '/links');
        return $this->get($url);
    }


    public function getTransaction(string $transactionId): array
    {
        $url = sprintf('%s%s%s%s', $this->baseUrl, self::TRANSACTIONS, '/', $transactionId);
        return $this->get($url);
    }

    public function refundTransaction(string $transactionId, string $reason): array
    {
        $payload = [
            'reason' => $reason
        ];
        $url = sprintf('%s%s%s%s%s', $this->baseUrl, self::TRANSACTIONS, '/', $transactionId, '/refund');
        return $this->post($url, $payload);
    }


    public function getLink(string $linkId): array
    {
        $url = sprintf('%s%s%s%s', $this->baseUrl, self::LINK, '/', $linkId);
        return $this->get($url);
    }

    public function chargeLink(string $linkId, float $amount, string $remark): array
    {
        $payload = [
            'amount' => $amount,
            'remark' => $remark
        ];
        $url = sprintf('%s%s%s%s', $this->baseUrl, self::LINK, '/', $linkId);
        return $this->post($url, $payload);
    }

    public function testCredit(float $amount, string $currency, string $user_reference): array
    {
        $payload = [
            'amount' => $amount,
            'currency' => $currency,
            'user_reference' => $user_reference
        ];
        $url = sprintf('%s%s', $this->baseUrl, self::TEST_CREDIT);
        return $this->post($url, $payload);
    }

    public function testCharge(float $amount, string $from, string $to, string $currency, string $remark, string $channel): array
    {
        $payload = [
            'amount' => $amount,
            'from' => $from,
            'to' => $to,
            'currency' => $currency,
            'remark' => $remark,
            'channel' => $channel
        ];
        $url = sprintf('%s%s', $this->baseUrl, self::TEST_CHARGE);
        return $this->post($url, $payload);
    }

}