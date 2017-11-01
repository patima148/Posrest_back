<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 4/10/2560
 * Time: 14:28
 */

namespace App\Service;


use App\Payment;
use App\Clocking;

class PaymentService
{
    private $paymentModel;
    function __construct(Payment $payment)
    {
        $this->paymentModel = $payment;
    }

    function calculateUserPayment(array $data)
    {
        $payment = new Payment();
        $All = Clocking::with([])
            ->where('user_id',$data['user_id'])
            ->whereMonth('created_at',$data['month'])
            ->get(['workingDuration_Min'])->pluck('workingDuration_Min');
        $rates = Clocking::with([])
            ->where('user_id',$data['user_id'])
            ->whereMonth('created_at',$data['month'])
            ->get(['payRate'])->pluck('payRate');
        $totalPayment = 0;
        for($index = 0; $index < count($All); $index++)
        {
                $hours = (int)($All[0]/60);
                $min_reminder = (float)(($All[0]%60)*0.01);
                $workingDuration = $hours+$min_reminder;
                $totalPayment = $totalPayment+($workingDuration*$rates[0]);
        }
        $month = date("F", mktime(0, 0, 0, $data['month'], 1));
        $payment->branch_id = $data['branch_id'];
        $payment->user_id = $data['user_id'];
        $payment->month = $month;
        $payment->totalPay = $totalPayment;
        $payment->save();
        return $payment;
    }
}