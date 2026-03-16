<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Notification;
use Carbon\Carbon;

class CheckSubscriptions extends Command
{

protected $signature = 'subscriptions:check';

protected $description = 'Check students subscriptions and send notifications';

public function handle()
{

$students = User::whereNotNull('subscription_end')->get();

foreach($students as $student){

$days = Carbon::parse($student->subscription_end)->diffInDays(now());

if($days <= 3){

Notification::create([

'user_id' => $student->id,

'title' => '⚠️ اشتراكك سينتهي قريباً',

'message' => 'باقي '.$days.' أيام على انتهاء اشتراكك. يرجى التجديد.'

]);

}

}

$this->info('Subscriptions checked successfully.');

}

}