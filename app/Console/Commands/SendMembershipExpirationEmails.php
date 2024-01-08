<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\CorporateUser;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\MembershipExpirationNotification;
use App\Mail\CorporateMembershipExpirationNotification;

class SendMembershipExpirationEmails extends Command
{
    protected $signature = 'membership:send-expiration-emails';
    protected $description = 'Send email notifications for expiring memberships';

    public function handle()
    {
        $expirationThreshold = Carbon::now()->addYear();

        // Send emails for individual users
        $users = User::where('approved', true)
            ->where('membership_expiration_date', '<=', $expirationThreshold)
            ->get();

        foreach ($users as $user) {
            Mail::to($user->email)->send(new MembershipExpirationNotification($user));
            // You can also update the membership_expiration_date here if needed.
        }

        // Send emails for corporate users
        $corporateUsers = CorporateUser::where('approved', true)
            ->where('membership_expiration_date', '<=', $expirationThreshold)
            ->get();

        foreach ($corporateUsers as $corporateUser) {
            Mail::to($corporateUser->email)->send(new CorporateMembershipExpirationNotification($corporateUser));
            // You can also update the membership_expiration_date here if needed.
        }

        $this->info('Membership expiration emails sent successfully.');
    }
}
