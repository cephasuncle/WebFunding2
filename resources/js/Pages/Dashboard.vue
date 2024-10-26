<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import SecondaryButton from "@/Components/SecondaryButton.vue";
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div>
                        <div class="container px-6 mt-4">
                            <div class="flex justify-between">
                                <div>
                                    <h3 class="text-base font-semibold leading-7 text-gray-900">User Information</h3>
                                    <p class="max-w-2xl mt-1 text-sm leading-6 text-gray-500">Personal details and application.</p>
                                </div>
                                <div class="">
                                    <Link :href="route('profile.edit')"
                                          class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 border border-transparent rounded-md hover:bg-gray-700">
                                        Edit Profile
                                    </Link>
                                </div>
                            </div>
                            <div class="mt-6 border-t border-gray-100">
                                <dl class="divide-y divide-gray-100">
                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm font-medium leading-6 text-gray-900">Full name</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $attrs.auth.user.name }}</dd>
                                    </div>
                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm font-medium leading-6 text-gray-900">Role</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">User</dd>
                                    </div>
                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm font-medium leading-6 text-gray-900">Email address</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $attrs.auth.user.email }}</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="py-2">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900 flex justify-between">
                        <div>
                            Check out our recent campaigns
                        </div>
                        <div>
                            <Link :href="route('profile.edit')"
                                  class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 border border-transparent rounded-md hover:bg-gray-700">
                                View Campaigns
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900 flex justify-between">
                        <div>
                            <p v-if="userAddress">Connected: {{ userAddress }}</p>
                            <div v-else class="flex">
                                <p >Connect your wallet to start funding</p>
                                <Link @click="connectWallet" preserve-scroll
                                      class="ms-[750px] inline-flex items-center px-3 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 border border-transparent rounded-md hover:bg-gray-700">
                                    Connect wallet
                                </Link>
                            </div>
                        </div>
                        <div>
                            <button v-if="userAddress" @click="disconnectWallet">Disconnect Wallet</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import {ethers} from "ethers";
import {ref} from "vue";
import {Link} from "@inertiajs/vue3";

let userAddress = ref(null);

const disconnectWallet = () => {
    userAddress.value = null; // Clear the reactive reference
    console.log("Disconnected"); // Optional: Log for debugging
};

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

</script>
