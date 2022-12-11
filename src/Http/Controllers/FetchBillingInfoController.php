<?php

namespace Tots\Billing\Http\Controllers;

use Illuminate\Http\Request;
use Tots\Account\Models\TotsAccount;
use Tots\Billing\Models\TotsAccountBillingInfo;
use Tots\Billing\Models\TotsAccountPlan;

class FetchBillingInfoController extends \Laravel\Lumen\Routing\Controller
{
    public function handle($account_id, Request $request)
    {
        /** @var \Tots\Account\Models\TotsAccount $account */
        $account = $request->input(TotsAccount::class);

        $accBilling = TotsAccountBillingInfo::where('account_id', $account->id)->orderBy('id', 'desc')->first();
        if($accBilling == null){
            throw new \Exception('The account not has billing');
        }

        return $accBilling;
    }
}