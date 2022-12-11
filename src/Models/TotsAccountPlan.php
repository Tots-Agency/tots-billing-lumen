<?php

namespace Tots\Billing\Models;

use Illuminate\Database\Eloquent\Model;
use Tots\Account\Models\TotsAccount;
use Tots\Auth\Models\TotsProvider;

/**
 * Description of Model
 *
 * @author matiascamiletti
 */
class TotsAccountPlan extends Model
{
    protected $table = 'tots_account_plan';
    
    protected $casts = ['data' => 'array'];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
    * 
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function account()
    {
        return $this->belongsTo(TotsAccount::class, 'account_id');
    }
    /**
    * 
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function plan()
    {
        return $this->belongsTo(TotsPlan::class, 'plan_id');
    }
    /**
    * 
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function provider()
    {
        return $this->belongsTo(TotsProvider::class, 'provider_id');
    }
}