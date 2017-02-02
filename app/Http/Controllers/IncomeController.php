<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\income;
use App\Models\source;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class IncomeController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	
    	$incomes = income::orderBy('year', 'DESC')->orderBy('month', 'DESC')->paginate(15);
        $inc_monthly = DB::table('income')
                     ->select(DB::raw('year'), DB::raw('month'), DB::raw('sum(ammount) as ammount'))
                     ->where('paid', 1)
                     ->groupBy('year','month')
                     ->orderBy('year', 'DESC')
                     ->orderBy('month', 'DESC')
                     ->paginate(15);

        $inc_yearly = DB::table('income')
                     ->select(DB::raw('year'), DB::raw('sum(ammount) as ammount'))
                     ->where('paid', 1)
                     ->groupBy('year')
                     ->orderBy('year', 'DESC')
                     ->paginate(15);  

    	return \View::make('income.index', compact('incomes','inc_monthly', 'inc_yearly'

            )); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2()
    {   
        $incomes = income::orderBy('year', 'DESC')->orderBy('month', 'DESC')->paginate(15);
        return \View::make('income.index', compact('incomes'

            )); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	# show some income
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        $sources = Source::all('name','id');

        # Grab the income
        $income = income::find($id);

        return \View::make('income._edit_form', compact('income','sources','month','year'

            ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        # Grab the income
        $income = income::find($id);

        $income->month = $request->month;
        $income->year = $request->year;
        $income->ammount = $request->ammount;
        $income->comment = $request->comment;
        $income->paid = $request->paid;
        $income->source_id = $request->source;

        # Save request
        $income->save();

        # Display message for successfully database save
        flash('You have successfully updated income ('.$id.')!', 'success');

        # Return to index view
        return redirect()->action('IncomeController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
    	# Check if exists then remove the requested row
        $row = Income::findOrFail($id);
        income::destroy($id);

        # Display message for successfull database save
        flash('You have successfully deleted income ('.$id.')!', 'success');

        # Return to index view
        return redirect('income');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {			
        $month = Carbon::now()->month;
    	$year = Carbon::now()->year;
    	$sources = Source::all('name','id');

        return \View::make('income._form', compact('sources','month','year'

            ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	# Validate the request...

        $income = new income;
		$income->month = $request->month;
		$income->year = $request->year;
		$income->ammount = $request->ammount;
		$income->comment = $request->comment;
		$income->paid = $request->paid;
        $income->source_id = $request->source;

        # Save request
        $income->save();

        # Display message for successfully database save
        flash('You have successfully added a new income!', 'success');

        # Return to index view
        return redirect()->action('IncomeController@index');
    }
}