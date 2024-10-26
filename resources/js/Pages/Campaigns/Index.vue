<template>
    <AuthenticatedLayout>
        <template #header class="flex">
            <PageHeader class="flex justify-between">
                <p>Show Campaigns</p>
                <Link :href="route('campaigns.create')"
                      class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 border border-transparent rounded-md hover:bg-gray-700">
                    Create Campaigns
                </Link>
            </PageHeader>
        </template>

        <BodyCard>
            <ul class="grid grid-cols-2 md:grid-cols-3 gap-8">
                <li href="#" class="flex flex-col justify-between block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray/20">

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Child Funding</h5>
                    <p class="font-normal text-gray-700 ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aperiam at debitis dolore ducimus et ipsa
                        laudantium magni modi, molestiae, nis reprehenderit tempore ut! Totam, vel.
                    </p>
                    <button @click="pledgeToCampaign" class="mt-3 w-1/2 ms-auto items-center px-3 py-2 text-xs font-semibold tracking-widest
                     text-white uppercase bg-gray-800 border border-transparent rounded-md hover:bg-gray-700">
                        Contribute
                    </button>
                </li>
                <li href="#" class="flex flex-col justify-between block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray/20">

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Food Provisions</h5>
                    <p class="font-normal text-gray-700">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, temporibus?
                    </p>
                    <button class="mt-3  w-1/2 ms-auto px-3 py-2 text-xs font-semibold tracking-widest
                     text-white uppercase bg-gray-800 border border-transparent rounded-md hover:bg-gray-700">
                        Contribute
                    </button>
                </li>
                <li href="#" class="flex flex-col justify-between block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray/20">

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Shelter</h5>
                    <p class="font-normal text-gray-700 ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aperiam at debitis dolore ducimus et ipsa
                        laudantium magni modi, molestiae, nis reprehenderit tempore ut! Totam, vel.
                    </p>
                    <button class="mt-3 w-1/2 ms-auto items-center px-3 py-2 text-xs font-semibold tracking-widest
                     text-white uppercase bg-gray-800 border border-transparent rounded-md hover:bg-gray-700">
                        Contribute
                    </button>
                </li>
                <li href="#" class="flex flex-col justify-between block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray/20">

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">School Funding</h5>
                    <p class="font-normal text-gray-700 ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aperiam at debitis dolore ducimus et ipsa
                        laudantium magni modi, molestiae, nis reprehenderit tempore ut! Totam, vel.
                    </p>
                    <button class="mt-3 w-1/2 ms-auto items-center px-3 py-2 text-xs font-semibold tracking-widest
                     text-white uppercase bg-gray-800 border border-transparent rounded-md hover:bg-gray-700">
                        Contribute
                    </button>
                </li>
                <li href="#" class="flex flex-col justify-between block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray/20">

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Youth Empowerment</h5>
                    <p class="font-normal text-gray-700 ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aperiam at debitis dolore ducimus et ipsa
                        laudantium magni modi, molestiae, nis reprehenderit tempore ut! Totam, vel.
                    </p>
                    <button class="mt-3 w-1/2 ms-auto items-center px-3 py-2 text-xs font-semibold tracking-widest
                     text-white uppercase bg-gray-800 border border-transparent rounded-md hover:bg-gray-700">
                        Contribute
                    </button>
                </li>
                <li href="#" class="flex flex-col justify-between block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray/20">

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Job provisions</h5>
                    <p class="font-normal text-gray-700 ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aperiam at debitis dolore ducimus et ipsa
                        laudantium magni modi, molestiae, nis reprehenderit tempore ut! Totam, vel.
                    </p>
                    <button class="mt-3 w-1/2 ms-auto items-center px-3 py-2 text-xs font-semibold tracking-widest
                     text-white uppercase bg-gray-800 border border-transparent rounded-md hover:bg-gray-700">
                        Contribute
                    </button>
                </li>
                <li href="#" class="flex flex-col justify-between block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray/20">

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Child Funding</h5>
                    <p class="font-normal text-gray-700 ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aperiam at debitis dolore ducimus et ipsa
                        laudantium magni modi, molestiae, nis reprehenderit tempore ut! Totam, vel.
                    </p>
                    <button class="mt-3 w-1/2 ms-auto items-center px-3 py-2 text-xs font-semibold tracking-widest
                     text-white uppercase bg-gray-800 border border-transparent rounded-md hover:bg-gray-700">
                        Contribute
                    </button>
                </li>
            </ul>

        </BodyCard>
        <!--        <div class="max-w-4xl mx-auto p-6">
                    <h1 class="text-3xl font-bold mb-4">Campaigns</h1>
                    <div v-if="campaigns.length === 0" class="text-center">
                        <p>No campaigns available.</p>
                    </div>
                    <ul class="space-y-4">
                        <li v-for="campaign in campaigns" :key="campaign.id" class="p-4 border rounded-lg bg-gray-50">
                            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow bg-gray-800 border-gray-700">
                                <a href="#">
                                    <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
                                </a>
                                <div class="p-5">
                                    <a href="#">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 text-white">Noteworthy technology acquisitions 2021</h5>
                                    </a>
                                    <p class="mb-3 font-normal text-gray-700 text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                                        Read more
                                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>

                        </li>
                        <li v-for="campaign in campaigns" :key="campaign.id" class="p-4 border rounded-lg bg-gray-50">
                            <h2 class="text-xl font-semibold">{{ campaign.title }}</h2>
                            <p>{{ campaign.description }}</p>
                            <p><strong>Goal Amount:</strong> {{ campaign.goal_amount }} ETH</p>
                            <p><strong>Wallet Address:</strong> {{ campaign.wallet_address }}</p>
                            <p><strong>Deadline:</strong> {{ new Date(campaign.deadline).toLocaleDateString() }}</p>
                            <Link :href="`/campaigns/${campaign.id}`" class="text-blue-500 hover:underline">View Details</Link>
                        </li>
                    </ul>
                </div>-->
    </AuthenticatedLayout>
</template>

<script setup>
import {Link} from "@inertiajs/vue3";
import {defineProps, ref} from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PageHeader from "@/Components/PageHeader.vue";
import BodyCard from "@/Components/BodyCard.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {ethers} from "ethers";

defineProps({
    campaigns: Array,
})

let connectWallet = async () => {
    if (typeof window.ethereum !== 'undefined') {
        // Request account access if needed
        try {
            const accounts = await window.ethereum.request({
                method: "eth_requestAccounts",
            });
            // Create an ethers provider
            const provider = new ethers.BrowserProvider(window.ethereum);
            // Get the signer
            const signer = provider.getSigner();

            // Store the user's account address
            userAddress.value = accounts[0];


            console.log("Connected:", userAddress.value);
        } catch (error) {
            console.error("User denied account access or error occurred", error);
        }
    } else {
        console.error("Please install MetaMask!");
    }
};

let userAddress = ref(null);
let campaignId = ref(null);


const pledgeToCampaign = async () => {
    await connectWallet()
    const contractAddress = "0x5fbdb2315678afecb367f032d93f642f64180aa3"; // Replace with your contract address
    const contractABI = [
        {
            "anonymous": false,
            "inputs": [
                {
                    "indexed": false,
                    "internalType": "uint256",
                    "name": "id",
                    "type": "uint256"
                },
                {
                    "indexed": false,
                    "internalType": "address",
                    "name": "owner",
                    "type": "address"
                },
                {
                    "indexed": false,
                    "internalType": "uint256",
                    "name": "goal",
                    "type": "uint256"
                }
            ],
            "name": "CampaignCreated",
            "type": "event"
        },
        {
            "anonymous": false,
            "inputs": [
                {
                    "indexed": false,
                    "internalType": "uint256",
                    "name": "id",
                    "type": "uint256"
                },
                {
                    "indexed": false,
                    "internalType": "address",
                    "name": "contributor",
                    "type": "address"
                },
                {
                    "indexed": false,
                    "internalType": "uint256",
                    "name": "amount",
                    "type": "uint256"
                }
            ],
            "name": "PledgeReceived",
            "type": "event"
        },
        {
            "inputs": [],
            "name": "campaignCount",
            "outputs": [
                {
                    "internalType": "uint256",
                    "name": "",
                    "type": "uint256"
                }
            ],
            "stateMutability": "view",
            "type": "function"
        },
        {
            "inputs": [
                {
                    "internalType": "uint256",
                    "name": "",
                    "type": "uint256"
                }
            ],
            "name": "campaigns",
            "outputs": [
                {
                    "internalType": "address payable",
                    "name": "owner",
                    "type": "address"
                },
                {
                    "internalType": "uint256",
                    "name": "goal",
                    "type": "uint256"
                },
                {
                    "internalType": "uint256",
                    "name": "pledged",
                    "type": "uint256"
                },
                {
                    "internalType": "bool",
                    "name": "completed",
                    "type": "bool"
                }
            ],
            "stateMutability": "view",
            "type": "function"
        },
        {
            "inputs": [
                {
                    "internalType": "uint256",
                    "name": "_goal",
                    "type": "uint256"
                }
            ],
            "name": "createCampaign",
            "outputs": [],
            "stateMutability": "nonpayable",
            "type": "function"
        },
        {
            "inputs": [
                {
                    "internalType": "uint256",
                    "name": "_id",
                    "type": "uint256"
                }
            ],
            "name": "getCampaign",
            "outputs": [
                {
                    "components": [
                        {
                            "internalType": "address payable",
                            "name": "owner",
                            "type": "address"
                        },
                        {
                            "internalType": "uint256",
                            "name": "goal",
                            "type": "uint256"
                        },
                        {
                            "internalType": "uint256",
                            "name": "pledged",
                            "type": "uint256"
                        },
                        {
                            "internalType": "bool",
                            "name": "completed",
                            "type": "bool"
                        }
                    ],
                    "internalType": "struct Crowdfunding.Campaign",
                    "name": "",
                    "type": "tuple"
                }
            ],
            "stateMutability": "view",
            "type": "function"
        },
        {
            "inputs": [
                {
                    "internalType": "uint256",
                    "name": "_id",
                    "type": "uint256"
                }
            ],
            "name": "pledge",
            "outputs": [],
            "stateMutability": "payable",
            "type": "function"
        }
    ]

    if (!userAddress.value) {
        console.error("Please connect your wallet first!");
        return;
    }

    try {
        const provider = new ethers.BrowserProvider(window.ethereum);
        const signer = provider.getSigner();
        const contract = new ethers.Contract(contractAddress, contractABI, signer);

        // Pledge to the campaign
        let pledgeAmount = ref(0)
        const tx = await contract.pledge(campaignId.value, { value: ethers.parseEther(pledgeAmount.value.toString()) });
        await tx.wait(); // Wait for the transaction to be mined

        console.log("Pledge successful:", tx);
    } catch (error) {
        console.error("Error pledging to campaign:", error);
    }
};
</script>
