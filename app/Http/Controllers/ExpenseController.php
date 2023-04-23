<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ExpenseCreatedNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ExpenseResource;

class ExpenseController extends Controller
{
    public function index()
    {
        try {
            $user = Auth::user();

            return ExpenseResource::collection($user->expenses);

        } catch (Exception $e) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }

    public function store(StoreExpenseRequest $request, Expense $expense)
    {
        try {
            DB::beginTransaction();

            $expense->fill($request->all());
        
            if ( Auth::user()->cannot('create', $expense)) {
                return response()->json(['error' => 'Forbiden'], 403);
            }

            $expense->save();
            
            Notification::send( Auth::user(), new ExpenseCreatedNotification($expense) );
            
            DB::commit();
            
            return new ExpenseResource($expense);

        } catch (Exception $e) {
            DB::rollBack();

            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }    

    public function show($id)
    {
        try {
            $expense = Expense::find($id);

            if ( empty( $expense ) ) {
                return response()->json(['error' => 'Not found'], 404);
            }

            if ( Auth::user()->cannot('view', $expense) ) {
                return response()->json(['error' => 'Forbiden'], 403);
            }

            return new ExpenseResource($expense);

        } catch (Exception $e) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }

    public function update($id, UpdateExpenseRequest $request)
    {
        try {
            DB::beginTransaction();

            $expense = Expense::find($id);

            if ( empty( $expense ) ) {
                return response()->json(['error' => 'Not found'], 404);
            }

            if ( Auth::user()->cannot('update', $expense) ) {
                return response()->json(['error' => 'Forbiden'], 403);
            }

            $expense->fill($request->all());
            $expense->save();

            DB::commit();

            return new ExpenseResource($expense);

        } catch (Exception $e) {
            DB::rollBack();

            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $expense = Expense::find($id);

            if ( empty( $expense ) ) {
                return response()->json(['error' => 'Not found'], 404);
            }

            if ( Auth::user()->cannot('view', $expense) ) {
                return response()->json(['error' => 'Forbiden'], 403);
            }

            $expense->delete();

            DB::commit();

            return response('', 204);

        } catch (Exception $e) {
            DB::rollBack();

            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }
}