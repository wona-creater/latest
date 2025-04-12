<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CryptoAddress;
use App\Models\Deposit;
use App\Models\Investment;
use App\Models\InvestmentPlan;
use App\Models\Signal;
use App\Models\User;
use App\Models\Withdrawal;
use App\Models\CourseHistory;
use App\Models\CryptoAddres;
use App\Models\SignalHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Loan;
use App\Models\LoanHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class adminController extends Controller
{
    //


    public function copy()
    {


        return view('admin.copy');
    }

    public function course()
    {
        $courses = Course::with('user')->latest()->get();
        return view('admin.course', compact('courses'));
    }



    public function deposit()
    {
        $deposits = Deposit::with('user')->latest()->get();
        return view('admin.deposit', compact('deposits'));
    }

    public function updatestatus(Request $request, Deposit $deposit)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $deposit->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully.',
            'status' => $deposit->status,
        ]);
    }

    public function investment()
    {

        $investmentplans = InvestmentPlan::with('user')->get();
        return view('admin.investment', compact('investmentplans'));
    }
    public function storeInvestmentPlan(Request $request)
    {

        try {
            // Validate the input
            $request->validate([
                'name' => 'required|string|max:255',
                'min_amount' => 'required|numeric|min:0',
                'max_amount' => 'required|numeric|min:0|gte:min_amount',
                'profit_percentage' => 'required|numeric|min:0|max:100',
                'duration' => 'required|integer|min:1',
            ]);

            // Create a new InvestmentPlan record
            InvestmentPlan::create([
                'name' => $request->input('name'),
                'min_amount' => $request->input('min_amount'),
                'max_amount' => $request->input('max_amount'),
                'profit_percentage' => $request->input('profit_percentage'),
                'duration' => $request->input('duration'),
            ]);

            return redirect()->route('admin.investment')
                ->with('success', 'Investment plan saved successfully');
        } catch (\Exception $e) {
            Log::error('Error saving investment plan: ' . $e->getMessage());
            return back()->with('error', 'Failed to save investment plan: ' . $e->getMessage());
        }
    }

    public function loan()
    {
        $loans = Loan::with('user')->latest()->get();
        return view('admin.loan', compact('loans'));
    }

    public function plan()
    {

        return view('admin.plan');
    }

    public function signal()
    {
        $signals = Signal::with('user')->latest()->get();
        return view('admin.signal', compact('signals'));
    }

    public function dashboard()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.board', compact('users'));
    }

    public function user(User $user)
    {
        return view('admin.userdetail', compact('user'));
    }

    public function users(User $user)
    {
        try {
            DB::beginTransaction();

            // Delete related records
            $user->deposits()->delete();     // Assuming a deposits relationship
            $user->withdrawals()->delete();  // Assuming a withdrawals relationship
            $user->signal_histories()->delete();  // Assuming a withdrawals relationship
            $user->loan_histories()->delete();  // Assuming a withdrawals relationship
            $user->course_histories()->delete();  // Assuming a withdrawals relationship

            // Add more related models as needed
            // $user->otherRelations()->delete();

            // Delete the user
            $user->delete();

            DB::commit();
            return redirect()->route('admin.board')
                ->with('success', 'User deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to delete user ID ' . $user->id . ': ' . $e->getMessage());
            return back()->with('error', 'Failed to delete user: ' . $e->getMessage());
        }
        // return view('admin.userdetail', compact('users'));
    }
    public function updatebalance(Request $request, User $user)
    {
        try {
            // Validate the input
            $request->validate([
                'balance' => 'required|numeric|min:0',
            ]);

            // Update the user's balance
            $user->balance = $request->input('balance');
            $user->save();

            return redirect()->route('admin.user', $user->id)
                ->with('success', 'User balance updated successfully');
        } catch (\Exception $e) {
            Log::error('Error updating user balance: ' . $e->getMessage());
            return back()->with('error', 'Failed to update balance: ' . $e->getMessage());
        }
    }

    public function withdraw()
    {
        $withdrawals = Withdrawal::with('user')->get();
        return view('admin.withdraw', compact('withdrawals'));
    }

    public function withdrawStatus(Request $request, Withdrawal $withdrawal)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $withdrawal->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully.',
            'status' => $withdrawal->status,
        ]);
    }

    public function address()
    {
        $cryptoaddresses = CryptoAddress::with('user')->get();
        return view('admin.address', compact('cryptoaddresses'));
    }

    public function storeCryptoAddress(Request $request)
    {
        try {
            // Validate the input
            $request->validate([
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'network' => 'required|string|max:255',
            ]);

            // Create a new CryptoAddress record
            CryptoAddress::create([
                'name' => $request->input('name'),
                'network' => $request->input('network'),
                'address' => $request->input('address'),
            ]);

            return redirect()->route('admin.address')
                ->with('success', 'Crypto address saved successfully');
        } catch (\Exception $e) {
            Log::error('Error saving crypto address: ' . $e->getMessage());
            return back()->with('error', 'Failed to save crypto address: ' . $e->getMessage());
        }
    }
}
