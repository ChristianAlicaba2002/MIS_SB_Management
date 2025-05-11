<?php

namespace App\Http\Controllers\Expenses;

use Illuminate\Http\Request;
use App\Services\ExpenseService;
use App\Http\Controllers\Controller;
use App\Models\ArchiveExpenses;
use App\Models\Expense;
use Illuminate\Support\Facades\Validator;

class ExpenseController extends Controller
{
    protected $expenseService;

    public function __construct(ExpenseService $expenseService)
    {
        $this->expenseService = $expenseService;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'datetime'  => 'required|date',
            'category' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back('expensesPage')
                ->withErrors($validator)
                ->withInput();
        }

        $expense = Expense::create([
            'name' => $request->name,
            'amount' => $request->amount,
            'datetime' => $request->datetime,
            'category' => $request->category,
        ]);
        return redirect()->route('expensesPage')->with('success', 'Expense created successfully');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'datetime'  => 'required|date',
            'category' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back('expensesPage')
                ->withErrors($validator)
                ->withInput();
        }

        $expense = Expense::findOrFail($id);
        if (!$expense) {
            return redirect()->route('expensesPage')->with('error', 'Expense not found');
        }

        $expense->update([
            'name' => $request->name,
            'amount' => $request->amount,
            'datetime' => $request->datetime,
            'category' => $request->category,
        ]);
        
        return redirect()->route('expensesPage')->with('success', 'Expense updated successfully');
    }


    public function archive($id)
    {
        $expensedId = Expense::findOrFail($id);

        if (!$expensedId) {
            return redirect()->route('expensesPage')->with('error', 'Expense not found');
        }

        $expensedId->delete();

        ArchiveExpenses::insert([
            'expense_id' => $expensedId->id,
            'name' => $expensedId->name,
            'amount' => $expensedId->amount,
            'datetime' => $expensedId->datetime,
            'category' => $expensedId->category,
        ]);
        
        return redirect()->route('expensesPage')->with('success', 'Expense archived successfully');
    }

    public function restore($id)
    {
        $expensedId = ArchiveExpenses::findOrFail($id);
        
        if (!$expensedId) {
            return redirect()->route('expensesArchive')->with('error', 'Expense not found');
        }

        $expensedId->delete();

        Expense::insert([
            'id' => $expensedId->id,
            'name' => $expensedId->name,
            'amount' => $expensedId->amount,
            'datetime' => $expensedId->datetime,
            'category' => $expensedId->category,
        ]);
        
        return redirect()->route('expensesArchive')->with('success', 'Expense restore successfully');
    }

    public function destroy($id)
    {
        $archiveExpense = ArchiveExpenses::findOrFail($id);
        if (!$archiveExpense) {
            return redirect()->route('expensesArchive')->with('error', 'Expense not found');
        }
        $archiveExpense->delete();
        
        return redirect()->route('expensesArchive')->with('error', 'Expense not found');
    }

    public function index()
    {
        $expenses = $this->expenseService->getAllExpenses();
        return response()->json($expenses, 200);
    }
}
