<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\UserApprovedNotification;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        // Call the function to get new users count and percentage change
        list($newUsersCount, $percentageChange) = $this->getNewUsersData();

        // Call the function to get monthly collection data
        list($monthlyCollection, $percentageChangeCollection) = $this->getMonthlyCollectionData();

        // Call the function to get annual collection data
        list($annualCollection, $percentageChangeAnnualCollection) = $this->getAnnualCollectionData();

        // Pass the data to the view
        return view('adminDashboard', compact('newUsersCount', 'percentageChange', 'monthlyCollection', 'percentageChangeCollection', 'annualCollection', 'percentageChangeAnnualCollection'));
    }

    /**
     * Calculate the count of new users and percentage change since last month.
     *
     * @return array [$newUsersCount, $percentageChange]
     */
    private function getNewUsersData()
    {
        // Get approved users this month
        $thisMonth = now();
        $approvedUsersThisMonth = User::whereNotNull('date_approved')
            ->whereMonth('date_approved', $thisMonth->month)
            ->whereYear('date_approved', $thisMonth->year)
            ->get();

        // Get approved users last month
        $lastMonth = now()->subMonth();
        $approvedUsersLastMonth = User::whereNotNull('date_approved')
            ->whereMonth('date_approved', $lastMonth->month)
            ->whereYear('date_approved', $lastMonth->year)
            ->get();

        // Calculate the percentage change
        $newUsersThisMonthCount = count($approvedUsersThisMonth);
        $newUsersLastMonthCount = count($approvedUsersLastMonth);

        $percentageChange = 0;
        if ($newUsersLastMonthCount > 0) {
            $percentageChange = (($newUsersThisMonthCount - $newUsersLastMonthCount) / $newUsersLastMonthCount) * 100;
        }

        return [$newUsersThisMonthCount, $percentageChange];
    }

    /**
     * Calculate the monthly collection and percentage change since last week.
     *
     * @return array [$monthlyCollection, $percentageChangeCollection]
     */
    private function getMonthlyCollectionData()
    {
        // Get approved users this month
        $thisMonth = now();
        $approvedUsersThisMonth = User::whereNotNull('date_approved')
            ->whereMonth('date_approved', $thisMonth->month)
            ->whereYear('date_approved', $thisMonth->year)
            ->get();

        // Calculate monthly collection
        $membershipCost = 1500;
        $monthlyCollection = $membershipCost * count($approvedUsersThisMonth);

        // Calculate the percentage change since last week (considering a 7-day period)
        $lastWeek = now()->subWeek();
        $approvedUsersLastWeek = User::whereNotNull('date_approved')
            ->where('date_approved', '>', $lastWeek)
            ->get();

        $percentageChangeCollection = 0;
        if (count($approvedUsersLastWeek) > 0) {
            $percentageChangeCollection = (($monthlyCollection - ($membershipCost * count($approvedUsersLastWeek))) / ($membershipCost * count($approvedUsersLastWeek))) * 100;
        }

        return [$monthlyCollection, $percentageChangeCollection];
    }

    /**
     * Calculate the annual collection and percentage change since last month.
     *
     * @return array [$annualCollection, $percentageChangeAnnualCollection]
     */
    private function getAnnualCollectionData()
    {
        // Get approved users this year
        $thisYear = now();
        $approvedUsersThisYear = User::whereNotNull('date_approved')
            ->whereYear('date_approved', $thisYear->year)
            ->get();

        // Calculate annual collection
        $membershipCost = 1500;
        $annualCollection = $membershipCost * count($approvedUsersThisYear);

        // Calculate the percentage change since last month
        $lastMonth = now()->subMonth();
        $approvedUsersLastMonth = User::whereNotNull('date_approved')
            ->whereMonth('date_approved', $lastMonth->month)
            ->whereYear('date_approved', $lastMonth->year)
            ->get();

        $percentageChangeAnnualCollection = 0;
        if (count($approvedUsersLastMonth) > 0) {
            $percentageChangeAnnualCollection = (($annualCollection - ($membershipCost * count($approvedUsersLastMonth))) / ($membershipCost * count($approvedUsersLastMonth))) * 100;
        }

        return [$annualCollection, $percentageChangeAnnualCollection];
    }

    public function showAdminDashboard(Request $request)
    {
        $query = request()->get('query');

        $users = User::where('approved', 0)
            ->when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where(function ($innerQuery) use ($query) {
                    $innerQuery->where('name', 'like', '%' . $query . '%')
                        ->orWhere('email', 'like', '%' . $query . '%');
                });
            })
            ->paginate(10); // Use paginate instead of get

            if ($request->ajax()) {
                return view('partials.approval-table', compact('users'))->render();
            }

        return view('admin', compact('users'));
    }

    public function approveUser($userId)
    {
        $user = User::find($userId);
    
        if ($user) {
            $user->approved = 1;
            $user->date_approved = Carbon::now();
            $user->save();
        }
    
        $perPage = 10; // Set your desired number of items per page
        $users = User::where('approved', 0)->paginate($perPage);
    
        // You can use the approval-table partial view to render the table body
        $tableBody = View::make('partials.approval-table', ['users' => $users])->render();
    
        // Render the pagination links separately
        $pagination = $users->links()->toHtml();
    
        $user->notify(new UserApprovedNotification);
    
        return response()->json(['table_body' => $tableBody, 'pagination' => $pagination]);
    }
    
    

    public function showApprovedUsers()
    {
        $approvedUsers = User::where('approved', 1)->get();

        return view('sidebar_items.membersCrud', compact('approvedUsers'));
    }

   
}
