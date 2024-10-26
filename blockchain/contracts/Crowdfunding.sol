// contracts/Crowdfunding.sol
// SPDX-License-Identifier: MIT
pragma solidity ^0.8.0;

contract Crowdfunding {
    struct Campaign {
        address payable owner;
        uint256 goal;
        uint256 pledged;
        bool completed;
    }

    mapping(uint256 => Campaign) public campaigns;
    uint256 public campaignCount;

    event CampaignCreated(uint256 id, address owner, uint256 goal);
    event PledgeReceived(uint256 id, address contributor, uint256 amount);

    function createCampaign(uint256 _goal) public {
        campaignCount++;
        campaigns[campaignCount] = Campaign(payable(msg.sender), _goal, 0, false);
        emit CampaignCreated(campaignCount, msg.sender, _goal);
    }

    function pledge(uint256 _id) public payable {
        Campaign storage campaign = campaigns[_id];
        require(!campaign.completed, "Campaign completed");
        campaign.pledged += msg.value;
        emit PledgeReceived(_id, msg.sender, msg.value);

        if (campaign.pledged >= campaign.goal) {
            campaign.completed = true;
            campaign.owner.transfer(campaign.pledged);
        }
    }

    function getCampaign(uint256 _id) public view returns (Campaign memory) {
        return campaigns[_id];
    }
}
