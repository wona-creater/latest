<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseHistory;
use App\Models\CryptoAddress;
use App\Models\Deposit;
use App\Models\SignalHistory;
use App\Models\InvestmentPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Withdrawal;
use App\Models\Investment;
use App\Models\Loan;
use App\Models\LoanHistory;
use App\Models\Signal;
use App\Models\User;

class userController extends Controller
{
    //


    public function view()
    {
        // Total approved deposits for the authenticated user
        $deposits = Deposit::where('user_id', Auth::id())
            ->where('status', 'approved')
            ->sum('amount');

        // Total approved withdrawals for the authenticated user
        $withdrawals = Withdrawal::where('user_id', Auth::id())
            ->where('status', 'approved')
            ->sum('amount');


        $user = Auth::user();
        // return view('user.dashboard');
        if ($user->role === 'user') {
            return view('user.dashboard', compact('user', 'deposits', 'withdrawals'));
            
        } elseif ($user->role === 'admin') {
            $users = User::where('role', 'user')->get(); // Fetch users for admin
            return view('admin.board', compact('users'));
        }

        // Optional: Handle unexpected roles
        return redirect()->route('login')->with('error', 'Invalid user role');
    }

    public function deposit()
    {
        $user = Auth::user();
        $deposits = $user->deposits;
        $cryptoaddresses = CryptoAddress::all();

        return view('user.deposit', compact('deposits', 'cryptoaddresses'));
    }


    public function deposits(Request $request)
    {


        $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'image' => 'nullable|image|max:2048',
        ]);

        // Debug the request
        \Log::info('Request data:', $request->all());
        \Log::info('Files:', $request->files->all());

        do {
            $transactionId = Str::upper(Str::random(5));
        } while (Deposit::where('transaction_id', $transactionId)->exists());

        $imagePath = null;
        if ($request->hasFile('image')) {
            // Ensure the deposits directory exists
            Storage::disk('public')->makeDirectory('deposits');

            $imagePath = Storage::disk('public')->put('deposits', $request->file('image'));
            \Log::info('Image stored at: ' . $imagePath);
        } else {
            \Log::info('No image file received');
        }

        Deposit::create([
            'user_id' => Auth::id(),
            'transaction_id' => $transactionId,
            'amount' => $request->amount,
            'status' => 'pending',
            'image' => $imagePath,
        ]);

        return redirect()->route('user.deposit')->with('success', 'Deposit submitted successfully!');
    }




    public function deposithistory(Request $request)
    {
        $currentUser = $request->user();
        $deposits = $currentUser->deposits()->latest()->get();


        return view('user.deposithis', compact('deposits'));
    }

    public function withdrawal()
    {

        $user = Auth::user();
        return view('user.withdrawal');
    }

    public function withdrawals(Request $request)
    {

        $user = Auth::user();
        $request->validate([
            'crypto_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0.01',
            'crypto_address' => 'required|string|max:255',
            'network' => 'required|string|max:255',
        ]);

        // Generate a unique 5-character transaction ID
        do {
            $transactionId = Str::upper(Str::random(5));
        } while (Withdrawal::where('transaction_id', $transactionId)->exists());

        Withdrawal::create([
            'user_id' => auth()->id(),
            'transaction_id' => $transactionId,
            'amount' => $request->amount,
            'crypto_name' => $request->crypto_name,
            'network' => $request->network,
            'status' => 'pending', // Default value
            'crypto_address' => $request->crypto_address,
        ]);

        return redirect()->route('user.withdraw')->with('success', 'Withdrawal request submitted successfully!');
    }

    public function withdrawalhistory(Request $request)
    {
        $currentUser = $request->user();
        $withdrawals = $currentUser->withdrawals()->latest()->get();
        return view('user.withdrawalhis', compact('withdrawals'));
    }


    public function invest()
    {
        $user = Auth::user();
        $investments = $user->investments;
        $investmentplans = InvestmentPlan::all();

        return view('user.invest', compact('investments', 'investmentplans'));
    }


    public function invests(Request $request)
    {
        // Fetch the plan to get min_amount and max_amount
        $plan = InvestmentPlan::findOrFail($request->input('plan_id'));

        $request->validate([
            'plan_id' => 'required|exists:investmentplans,id', // Match table name
            'amount' => "required|numeric|min:{$plan->min_amount}|max:{$plan->max_amount}",
            'expected_profit' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        Investment::create([
            'user_id' => auth()->id(),
            'plan_id' => $request->plan_id,
            'amount' => $request->amount,
            'expected_profit' => $request->expected_profit,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => 'active', // Default value from schema
        ]);

        return redirect()->route('user.invest')->with('success', 'Plan chosen successfully!');
    }
    public function investhistory(Request $request)
    {
        $currentUser = $request->user();
        $investments = $currentUser->investments()->latest()->get();

        return view('user.investhis', compact('investments'));
    }

    public function course()
    {
        $courses = Course::all();
        return view('user.course', compact('courses'));
    }
    public function coursestore(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        $course = Course::findOrFail($request->course_id);
        $user = auth()->user();

        // Store purchase details in course_histories
        CourseHistory::create([
            'course_id' => $course->id,
            'user_id' => $user->id,
            'title' => $course->title,
            'instructor' => $course->instructor,
            'rating' => $course->rating,
            'student_count' => $course->student_count,
            'price' => $course->price,
            'duration' => $course->duration,
            'category' => $course->category,
            'status' => 'pending', // Default status
        ]);

        return redirect()->route('course')->with('success', 'Course purchase request submitted successfully!');
    }

    public function signal()
    {
        $signals = Signal::all();
        return view('user.signal', compact('signals'));
    }

    public function signalstore(Request $request)
    {

        // Validate that a signal_id was provided
        $validated = $request->validate([
            'signal_id' => 'required|exists:signals,id', // Ensure the signal exists in the database
        ]);

        // Find the selected signal
        $signal = Signal::findOrFail($validated['signal_id']);

        // Store the signal plan details in the signal_histories table
        SignalHistory::create([
            'user_id' => Auth::id(), // Authenticated user's ID
            'signal_id' => $signal->id, // Selected signal's ID
            'name' => $signal->name,
            'monthly_price' => $signal->monthly_price,
            'signal_count' => $signal->signal_count,
            'timeframes' => $signal->timeframes,
            'alert_types' => $signal->alert_types,
            'status' => 'pending', // Default status
        ]);

        // Redirect back with a success message
        return redirect()->route('signal')->with('success', 'Plan selected successfully!');
    }

    public function copytrade()
    {

        return view('user.copy');
    }

    public function loan()
    {
        $loans = Loan::all();
        return view('user.loan', compact('loans'));
    }

    public function loanstore(Request $request)
    {
        $request->validate([
            'loan_id' => 'required|exists:loans,id',
        ]);

        $loan = Loan::findOrFail($request->loan_id);
        $user = auth()->user();

        // Store loan details in loans_histories
        LoanHistory::create([
            'loan_id' => $loan->id,
            'user_id' => $user->id,
            'amount' => $loan->amount,
            'repayment_period' => $loan->repayment_period,
            'interest_rate' => $loan->interest_rate,
            'monthly_repayment' => $loan->monthly_repayment,
            'status' => 'pending', // Default status
            'loan_type' => $loan->loan_type,
        ]);

        return redirect()->route('loan')->with('success', 'Loan plan selected successfully!');
    }
}
