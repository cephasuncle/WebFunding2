<template>
    <AuthenticatedLayout>
        <template #header>
            <PageHeader>Create Campaign</PageHeader>
        </template>

        <div class="container max-w-4xl mx-auto text-black/70 mt-20">
            <form @submit.prevent="submit" class="w-full">
                <div>
                    <InputLabel class="mb-2 ">Title</InputLabel>
                    <TextInput v-model="form.title" class="w-full placeholder:text-sm" placeholder="What is the title of this campaign"></TextInput>
                    <div v-if="form.errors.title" class="mt-2"></div>
                </div>

                <div class="mt-6">
                    <InputLabel>Section</InputLabel>
                    <TextInput v-model="form.title" class="w-full placeholder:text-sm" placeholder="What is the title of this campaign"></TextInput>
                    <div v-if="form.errors.section" class="mt-2"></div>
                </div>

                <div class="mt-6">
                    <InputLabel for="goal_amount">Goal Amount (ETH)</InputLabel>
                    <TextInput type="number" v-model="goalAmount" placeholder="9.99" step="0.01" required class="w-full p-2 border rounded" />
                </div>

                <div class="mt-6">
                    <InputLabel for="wallet_address">Wallet Address</InputLabel>
                    <TextInput type="text" v-model="walletAddress" placeholder="xxxxxxxxxxxxxxxxxxxxxxxxxxx" required class="w-full p-2 border rounded" />
                </div>

                <div class="mt-6">
                    <InputLabel for="deadline">Deadline</InputLabel>
                    <TextInput type="date" v-model="deadline" required class="w-full p-2 border rounded" />
                </div>

                <div class="mt-4">
                    <PrimaryButton :disabled="form.processing">Submit</PrimaryButton>
                </div>
            </form>
        </div>
        <!--        <div class="max-w-lg mx-auto p-6 border rounded-lg bg-gray-100 shadow-md">
                    <h1 class="text-2xl font-bold text-center mb-6">Create Campaign</h1>
                    <form @submit.prevent="submit" class="space-y-4">
                        <div>
                            <label for="title" class="block font-semibold">Title</label>
                            <input type="text" v-model="title" required class="w-full p-2 border rounded" />
                        </div>
                        <div>
                            <label for="description" class="block font-semibold">Description</label>
                            <textarea v-model="description" required class="w-full p-2 border rounded h-24 resize-none"></textarea>
                        </div>
                        <div>
                            <label for="goal_amount" class="block font-semibold">Goal Amount (ETH)</label>
                            <input type="number" v-model="goalAmount" step="0.01" required class="w-full p-2 border rounded" />
                        </div>
                        <div>
                            <label for="wallet_address" class="block font-semibold">Wallet Address</label>
                            <input type="text" v-model="walletAddress" required class="w-full p-2 border rounded" />
                        </div>
                        <div>
                            <label for="deadline" class="block font-semibold">Deadline</label>
                            <input type="date" v-model="deadline" required class="w-full p-2 border rounded" />
                        </div>
                        <button type="submit" class="w-full py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                            Create Campaign
                        </button>
                    </form>
                </div>-->
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PageHeader from "@/Components/PageHeader.vue";
import {useForm} from "@inertiajs/vue3";

let form = useForm({
    title: '',
    description: '',
    goalAmount: null,
    walletAddress: '',
    deadline: '',
})

let submit = async () => {
    form.post('/campaigns' )


};
</script>
