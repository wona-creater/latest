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

    public function admincourse(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'instructor' => 'required|string|max:255',
            'rating' => 'required|numeric|min:0|max:5',
            'student_count' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'category' => 'required|string|max:255',
        ]);

        Course::create([
            'title' => $request->input('title'),
            'instructor' => $request->input('instructor'),
            'rating' => $request->input('rating'),
            'student_count' => $request->input('student_count'),
            'price' => $request->input('price'),
            'duration' => $request->input('duration'),
            'category' => $request->input('category'),
        ]);

        return redirect()->back()->with('success', 'Course saved!');
    }

    public function courseHistories()
    {
        $courseHistories = CourseHistory::with('user')->get();
        return view('admin.coursetable', compact('courseHistories'));
    }
    public function updateCourseHistoryStatus(Request $request, CourseHistory $courseHistory)
    {
        Log::info('Request payload for course history:', $request->all());
        $request->validate([
            'status' => 'required|in:pending,active,Paid',
        ]);

        $courseHistory->update(['status' => $request->status]);
        Log::info('New status for course history ID ' . $courseHistory->id . ': ' . $courseHistory->fresh()->status);

        return response()->json([
            'success' => true,
            'message' => 'Course history status updated successfully.',
            'status' => $courseHistory->status,
        ]);
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
    }

    public function loan()
    {
        $loans = Loan::with('user')->get();
        return view('admin.loan', compact('loans'));
    }

    public function adminloan(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'repayment_period' => 'required|integer|min:1',
            'interest_rate' => 'required|numeric|min:0|max:100',
            'monthly_repayment' => 'required|numeric|min:0',
            'loan_type' => 'required|string|max:255',
        ]);
        Loan::create([
            'amount' => $request->input('amount'),
            'repayment_period' => $request->input('repayment_period'),
            'interest_rate' => $request->input('interest_rate'),
            'monthly_repayment' => $request->input('monthly_repayment'),
            'loan_type' => $request->input('loan_type'),
        ]);


        return redirect()->back()->with('success', 'Loan saved!');
    }

    public function loanHistories()
    {
        $loanHistories = LoanHistory::with('user')->get();
        return view('admin.loantable', compact('loanHistories'));
    }

    public function updateLoanHistoryStatus(Request $request, LoanHistory $loanHistory)
    {
        Log::info('Request payload for loan history:', $request->all());
        $request->validate([
            'status' => 'required|in:pending,active,Paid',
        ]);

        $loanHistory->update(['status' => $request->status]);
        Log::info('New status for loan history ID ' . $loanHistory->id . ': ' . $loanHistory->fresh()->status);

        return response()->json([
            'success' => true,
            'message' => 'Loan history status updated successfully.',
            'status' => $loanHistory->status,
        ]);
    }


    public function signal()
    {

        $signals = Signal::with('user')->get();
        return view('admin.signal', compact('signals'));
    }

    public function adminsignal(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'monthly_price' => 'required|numeric|min:0',
            'signal_count' => 'required|integer',
            'timeframes' => 'required|string|max:255',
            'alert_types' => 'required|string|max:255',
        ]);

        Signal::create([
            'name' => $request->input('name'),
            'monthly_price' => $request->input('monthly_price'),
            'signal_count' => $request->input('signal_count'),
            'timeframes' => $request->input('timeframes'),
            'alert_types' => $request->input('alert_types'),
        ]);

        return redirect()->back()->with('success', 'Signal saved!');
    }


    public function signalHistories()
    {
        $signalHistories = SignalHistory::with('user')->get();
        return view('admin.signaltable', compact('signalHistories'));
    }

    public function updateSignalHistoryStatus(Request $request, SignalHistory $signalHistory)
    {
        Log::info('Request payload for signal history:', $request->all());
        $request->validate([
            'status' => 'required|in:pending,Paid',
        ]);

        $signalHistory->update(['status' => $request->status]);
        Log::info('New status for signal history ID ' . $signalHistory->id . ': ' . $signalHistory->fresh()->status);

        return response()->json([
            'success' => true,
            'message' => 'Signal history status updated successfully.',
            'status' => $signalHistory->status,
        ]);
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


    public function deleteSignal($id)
    {
        $signal = Signal::findOrfail($id);
        $signal->delete();

        return redirect()->back()->with('success', 'Signal deleted!');
    }

    public function deleteLoan($id)
    {
        $loan = Loan::findOrfail($id);
        $loan->delete();
        return redirect()->back()->with('success', 'Loan deleted!');
    }

    public function deleteCourse($id)
    {
        $course = Course::findOrfail($id);
        $course->delete();

        return redirect()->back()->with('success', 'Course deleted!');
    }

    public function deleteInvestment($id)
    {
        $investmentplan = InvestmentPlan::findOrFail($id);
        $investmentplan->delete();
        return redirect()->back()->with('success', 'Investment plan deleted!');
    }


    public function destroyaddress($id)
    {
        $cryptoAddress = CryptoAddress::findOrFail($id);
        $cryptoAddress->delete();

        return redirect()->back()->with('success', 'Crypto address deleted successfully.');
    }
}
