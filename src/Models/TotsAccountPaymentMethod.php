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
class TotsAccountPaymentMethod extends Model
{
    protected $table = 'tots_account_payment_method';
    
    //protected $casts = ['data' => 'array'];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    //public $timestamps = false;

    /**
    * 
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function account()
    {
        return $this->belongsTo(TotsAccount::class, 'account_id');
    }
}