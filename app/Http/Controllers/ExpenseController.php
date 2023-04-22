<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function index()
    {
        return response()->json(Expense::all());
    }

    public function store(StoreExpenseRequest $request, Expense $expense)
    {
        $expense->fill($request->all());
        
        if ( Auth::user()->cannot('create', $expense)) {
            abort(403);
        }

        $expense->save();
        return response()->json($expense, 201);
    }

    public function show(Expense $expense)
    {
        if ( Auth::user()->cannot('view', $expense) ) {
            abort(403);
        }

        return response()->json($expense);
    }

    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        $expense->fill($request->all());

        if ( Auth::user()->cannot('update', $expense) ) {
            return response()->json('Forbiden', 403);
        }

        $expense->save();

        return response()->json($expense);
    }

    public function destroy(Expense $expense)
    {
        if ( Auth::user()->cannot('view', $expense) ) {
            abort(403);
        }

        $expense->delete();
        return response('', 204);
    }
}
