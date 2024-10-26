<template>
    <div class="max-w-4xl mx-auto p-6 border rounded-lg bg-gray-100 shadow-md">
        <h1 class="text-3xl font-bold mb-4">{{ campaign.title }}</h1>
        <p class="mb-4">{{ campaign.description }}</p>
        <p class="font-semibold">Goal Amount: {{ campaign.goal_amount }} ETH</p>
        <p class="font-semibold">Wallet Address: {{ campaign.wallet_address }}</p>
        <p class="font-semibold">Deadline: {{ new Date(campaign.deadline).toLocaleDateString() }}</p>

        <!-- Contribution Form -->
        <form @submit.prevent="contribute" class="mt-6 space-y-4">
            <h2 class="text-2xl font-semibold">Make a Contribution</h2>
            <div>
                <label for="amount" class="block font-semibold">Amount (ETH)</label>
                <input type="number" v-model="amount" step="0.01" required class="w-full p-2 border rounded" />
            </div>
            <div>
                <label for="wallet_address" class="block font-semibold">Your Wallet Address</label>
                <input type="text" v-model="walletAddress" required class="w-full p-2 border rounded" />
            </div>
            <button type="submit" class="w-full py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                Contribute
            </button>
        </form>

        <!-- Contributions Section -->
        <div class="mt-6">
            <h2 class="text-2xl font-semibold">Contributions</h2>
            <ul v-if="campaign.contributions.length > 0" class="space-y-2">
                <li v-for="contribution in campaign.contributions" :key="contribution.id" class="p-2 border rounded">
                    <p><strong>Amount:</strong> {{ contribution.amount }} ETH</p>
                    <p><strong>Wallet Address:</strong> {{ contribution.wallet_address }}</p>
                    <p><strong>Date:</strong> {{ new Date(contribution.created_at).toLocaleDateString() }}</p>
                </li>
            </ul>
            <p v-else>No contributions yet.</p>
        </div>

    </div>
</template>

<script>
export default {
    props: {
        campaign: Object,
    },
    data() {
        return {
            amount: null,
            walletAddress: '',
        };
    },
    methods: {
        async contribute() {
            try {
                await this.$inertia.post(`/campaigns/${this.campaign.id}/contribute`, {
                    amount: this.amount,
                    wallet_address: this.walletAddress,
                });
                // Optionally reset the form after successful contribution
                this.amount = null;
                this.walletAddress = '';
            } catch (error) {
                console.error('Error making contribution:', error);
            }
        },
    },
};
</script>
