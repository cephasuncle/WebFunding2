<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Contribution;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Web3\Contract;
use Web3\Web3;

class CampaignController extends Controller
{
    public function index()
    {
        // Retrieve all campaigns from the database
        $campaigns = Campaign::all(); // You can also use pagination if needed

        // Pass the campaigns to the Inertia response
        return Inertia::render('Campaigns/Index', [
            'campaigns' => $campaigns,
        ]);
    }

    public function create()
    {
        return Inertia::render('Campaigns/Create');
    }

    // Handle form submission and store campaign in the database
    public function store(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'goalAmount' => 'required|numeric|min:0',
            'walletAddress' => 'required|string',  // MetaMask wallet address
            'deadline' => 'required|date',
        ]);


        // Store the new campaign in the database
        Campaign::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'goal_amount' => $validated['goal_amount'],
            'owner' => $validated['wallet_address'],  // Wallet address
            'deadline' => $validated['deadline'],
        ]);

        // Redirect the user back to the campaign list or a confirmation page
        return redirect()->route('campaigns.index')->with('success', 'Campaigns created successfully.');
    }

    public function show($id)
    {
        // Find the campaign by ID
        $campaign = Campaign::with('contributions')->findOrFail($id); // Load contributions

        // Pass the campaign details to the Inertia response
        return Inertia::render('Campaigns/Show', [
            'campaign' => $campaign,
        ]);
    }


    public function contribute(Request $request, $id)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'wallet_address' => 'required|string|size:42',
        ]);

        // Find the campaign by ID
        $campaign = Campaign::findOrFail($id);

        // Get the smart contract instance
        $web3 = new Web3('https://YOUR_INFURA_OR_ALCHEMY_ENDPOINT'); // Replace with your provider
        $contract = new Contract($web3->getProvider(), 'YOUR_CONTRACT_ABI', 'YOUR_CONTRACT_ADDRESS');

        // Prepare to send a transaction
        $fromAddress = $validated['wallet_address'];
        $amountInWei = $web3->toWei($validated['amount'], 'ether'); // Convert ETH to Wei

        // Call the contribute function of the smart contract
        $contract->send('contribute', [$id], [
            'from' => $fromAddress,
            'value' => $amountInWei,
        ], function ($err, $transactionHash) use ($validated, $campaign, $fromAddress) {
            if ($err) {
                return back()->with('error', 'Transaction failed: ' . $err->getMessage());
            }

            // Create the contribution record in the database
            Contribution::create([
                'campaign_id' => $campaign->id,
                'amount' => $validated['amount'],
                'wallet_address' => $fromAddress,
            ]);

            return redirect()->route('campaigns.show', $campaign->id)->with('success', 'Contribution successful! Transaction Hash: ' . $transactionHash);
        });
    }
}
