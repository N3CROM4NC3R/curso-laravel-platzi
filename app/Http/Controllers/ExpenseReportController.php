<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SummaryReport;
use Illuminate\Support\Facades\Auth;

class ExpenseReportController extends Controller
{


    public function __construct(){
        $this->middleware('auth');
        // parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $expenseReports = \App\ExpenseReport::all()->where('user_id','=',$user->id);
        $context = [
            'expenseReports' => $expenseReports
        ];
        return view('expenseReport.index',$context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('expenseReport.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'title' => 'required|min:3'
        ]);

        $report = new \App\ExpenseReport ();
        $report->title = $validData['title'];
        $report->user_id = Auth::user()->id;
        $report->save();
        $data = [
            "id" => $report->id,
            "title"=>$report->title
        ];
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $report = \App\ExpenseReport::where('user_id','=',$user->id)->findOrFail($id);

        $context = [
            'report' => $report
        ];

        return view('expenseReport.show', $context);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $report = \App\ExpenseReport::where('user_id','=',$user->id)->findOrFail($id);

        $context = [
            'report' => $report
        ];


        return view(
            'expenseReport.edit',
            $context
        );
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
        $user = Auth::user();
        $report = \App\ExpenseReport::where('user_id','=',$user->id)->findOrFail($id);


        $validData = $request->validate(
            [
                'title' => 'required|min:3'
            ]
        );

        $report->title = $request->get('title');
        $report->save();
        $dataJson = [
            'title' => $request->get('title'),
        ];
        return $dataJson;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $report = \App\ExpenseReport::where('user_id','=',$user->id)->findOrFail($id);

        $report->delete();
        return redirect('/expense_reports');
    }


    public function confirmDelete($id){

        $user = Auth::user();
        $report = \App\ExpenseReport::where('user_id','=',$user->id)->findOrFail($id);


        $context = [
            'report' => $report
        ];

        return view('expenseReport.confirmDelete',$context);

    }

    public function confirmSendMail($id){
        $user = Auth::user();
        $report = \App\ExpenseReport::where('user_id','=',$user->id)->findOrFail($id);


        $context = [
            'report' => $report
        ];

        return view('expenseReport.confirmSendMail',$context);
    }

    public function sendMail(Request $request,$id){

        $dataValidated = $request->validate([
            'email' => 'required'
        ]);

        $user = Auth::user();
        $report = \App\ExpenseReport::where('user_id','=',$user->id)->findOrFail($id);

        $email = $request->get('email');
        Mail::to($email)->send(new SummaryReport($report));


        return redirect('/expense_reports/' . $id);
    }
}
