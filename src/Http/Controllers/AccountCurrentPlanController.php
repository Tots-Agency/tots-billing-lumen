<?php

namespace Tots\Billing\Http\Controllers;

use Illuminate\Http\Request;
use Tots\Billing\Models\TotsAccountPlan;

class AccountCurrentPlanController extends \Laravel\Lumen\Routing\Controller
{
    public function handle($account_id, Request $request)
    {
        /** @var \Tots\Account\Models\TotsAccount $account */
        $account = $request->input(TotsAccount::class);

        $accPlan = TotsAccountPlan::where('account_id', $account->id)->orderBy('id', 'desc')->first();
        if($accPlan == null){
            throw new \Exception('The account not has plan');
        }

        return $accPlan;
    }
}