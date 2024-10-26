<?php
namespace App\Services;

use Web3\Web3;
use Web3\Contracts\Contract;
use Web3\Utils;

class EthereumService
{
    protected $web3;
    protected $contract;

    public function __construct()
    {
        $this->web3 = new Web3(env('ETH_NODE_URL'));
        $this->contract = new Contract($this->web3->provider, $this->getAbi());
    }

    public function getAbi()
    {
        // Replace with your actual contract ABI
        return '[...]'; // JSON ABI goes here
    }

    public function getContractAddress()
    {
        return 'YOUR_DEPLOYED_CONTRACT_ADDRESS'; // Replace with your contract address
    }

    public function contribute($amount, $fromAddress)
    {
        $this->contract->at($this->getContractAddress())->send('contribute', [
            'from' => $fromAddress,
            'value' => Utils::toWei($amount, 'ether'),
        ]);
    }

    public function getCampaignDetails()
    {
        $this->contract->at($this->getContractAddress())->call('getCampaignDetails', function ($err, $result) {
            if ($err !== null) {
                throw new \Exception($err);
            }
            return $result;
        });
    }

}
