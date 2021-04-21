<?php

namespace App\Http\Controllers;

use App\Application;
use App\Workexperiance;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    

        $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required|unique:applications',
                'contact' => 'required',
                'university' => 'required',
                'year' => 'required',
                'percentage' => 'required',
                'preffered_location' => 'required',
                'ectc' => 'required',
                'cctc' => 'required',
                'notice_period' => 'required',

            ], [
                'university.required' => 'Board/University field is required.',
                'preffered_location.required' => 'Location field is required.',
                'ectc.required' => 'Expected CTC field is required.',
                'cctc.required' => 'Current CTC field is required.',
                'notice_period.required' => 'Notice Period field is required.',
            ]
        );

        $applicaton = new Application; 
        $applicaton->name = $request->name; 
        $applicaton->email = $request->email; 
        $applicaton->contact = $request->contact; 
        $applicaton->gender = $request->gender; 
        $applicaton->address = $request->address; 
        $applicaton->university = $request->university; 
        $applicaton->year = $request->year; 
        $applicaton->percentage = $request->percentage; 
        $applicaton->hindiread = $request->hinreadCheck ? 1 : 0; 
        $applicaton->hindiwrite = $request->hinwriteCheck ? 1 : 0; 
        $applicaton->hindispeak = $request->hinspeakCheck ? 1 : 0; 
        $applicaton->engread = $request->engreadCheck ? 1 : 0; 
        $applicaton->engwrite = $request->engwriteCheck ? 1 : 0; 
        $applicaton->engspeak = $request->engspeakCheck ? 1 : 0; 
        $applicaton->gujaratiread = $request->gujreadCheck ? 1 : 0; 
        $applicaton->gujaratiwrite = $request->gujwriteCheck ? 1 : 0; 
        $applicaton->gujaratispeak = $request->gujspeakCheck ? 1 : 0; 
        $applicaton->phpbeginner = $request->phpbeginner ? 1 : 0; 
        $applicaton->phpmediator = $request->phpmediator ? 1 : 0; 
        $applicaton->phpexpert = $request->phpexpert ? 1 : 0; 
        $applicaton->mysqlbeginner = $request->mysqlbeginner ? 1 : 0; 
        $applicaton->mysqlmediator = $request->mysqlmediator ? 1 : 0; 
        $applicaton->mysqlexpert = $request->mysqlexpert ? 1 : 0; 
        $applicaton->laravelbeginner = $request->laravelbeginner ? 1 : 0; 
        $applicaton->laravelmediator = $request->laravelmediator ? 1 : 0; 
        $applicaton->laravelexpert = $request->laravelexpert ? 1 : 0; 
        $applicaton->location = $request->preffered_location; 
        $applicaton->ectc = $request->ectc; 
        $applicaton->cctc = $request->cctc; 
        $applicaton->notice_period = $request->notice_period; 
        $applicaton->save(); 


        $workexperiance = new Workexperiance;
        $workexperiance->application_id = $applicaton->id;
        $workexperiance->company = $request->company;
        $workexperiance->designation =  $request->designation;
        $workexperiance->from =  date('Y-m-d',strtotime($request->from_date));
        $workexperiance->to = date('Y-m-d',strtotime($request->to_date));
        $workexperiance->save();
        
        $repeatExps = $request->workExperiances;
        foreach($repeatExps as  $experiance){
            $workexperiance = new Workexperiance;
            $workexperiance->application_id = $applicaton->id;
            $workexperiance->company = $experiance['company'];
            $workexperiance->designation =  $experiance['designation'];
            $workexperiance->from =  date('Y-m-d',strtotime($experiance['from_date']));
            $workexperiance->to =  date('Y-m-d',strtotime($experiance['to_date']));
            $workexperiance->save();
        }

        return back()->with('success', 'Application Submitted Successfully.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        $workExperiances = $application->workExperiances ; 
        return view('application.show',compact('application','workExperiances'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        $workExperiances = $application->workExperiances ; 
        return view('application.edit',compact('application','workExperiances'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {

        $this->validate(
            $request,
            [
                'name' => 'required',
                'contact' => 'required',
                'university' => 'required',
                'year' => 'required',
                'percentage' => 'required',
                'preffered_location' => 'required',
                'ectc' => 'required',
                'cctc' => 'required',
                'notice_period' => 'required',

            ], [
                'university.required' => 'Board/University field is required.',
                'preffered_location.required' => 'Location field is required.',
                'ectc.required' => 'Expected CTC field is required.',
                'cctc.required' => 'Current CTC field is required.',
                'notice_period.required' => 'Notice Period field is required.',
            ]
        );


        $applicaton = $application; 
        $applicaton->name = $request->name; 
        $applicaton->email = $request->email; 
        $applicaton->contact = $request->contact; 
        $applicaton->gender = $request->gender; 
        $applicaton->address = $request->address; 
        $applicaton->university = $request->university; 
        $applicaton->year = $request->year; 
        $applicaton->percentage = $request->percentage; 
        $applicaton->hindiread = $request->hinreadCheck ? 1 : 0; 
        $applicaton->hindiwrite = $request->hinwriteCheck ? 1 : 0; 
        $applicaton->hindispeak = $request->hinspeakCheck ? 1 : 0; 
        $applicaton->engread = $request->engreadCheck ? 1 : 0; 
        $applicaton->engwrite = $request->engwriteCheck ? 1 : 0; 
        $applicaton->engspeak = $request->engspeakCheck ? 1 : 0; 
        $applicaton->gujaratiread = $request->gujreadCheck ? 1 : 0; 
        $applicaton->gujaratiwrite = $request->gujwriteCheck ? 1 : 0; 
        $applicaton->gujaratispeak = $request->gujspeakCheck ? 1 : 0; 
        $applicaton->phpbeginner = $request->phpbeginner ? 1 : 0; 
        $applicaton->phpmediator = $request->phpmediator ? 1 : 0; 
        $applicaton->phpexpert = $request->phpexpert ? 1 : 0; 
        $applicaton->mysqlbeginner = $request->mysqlbeginner ? 1 : 0; 
        $applicaton->mysqlmediator = $request->mysqlmediator ? 1 : 0; 
        $applicaton->mysqlexpert = $request->mysqlexpert ? 1 : 0; 
        $applicaton->laravelbeginner = $request->laravelbeginner ? 1 : 0; 
        $applicaton->laravelmediator = $request->laravelmediator ? 1 : 0; 
        $applicaton->laravelexpert = $request->laravelexpert ? 1 : 0; 
        $applicaton->location = $request->preffered_location; 
        $applicaton->ectc = $request->ectc; 
        $applicaton->cctc = $request->cctc; 
        $applicaton->notice_period = $request->notice_period; 
        $applicaton->save(); 


        Workexperiance::where('application_id',$applicaton->id)->delete();
        $companies = $request->company ; 
        foreach($companies as $key => $company){
            $workexperiance = new Workexperiance;
            $workexperiance->application_id = $applicaton->id;
            $workexperiance->company = $company;
            $workexperiance->designation =  $request->designation[$key];
            $workexperiance->from =  date('Y-m-d',strtotime($request->from_date[$key]));
            $workexperiance->to = date('Y-m-d',strtotime($request->to_date[$key]));
            $workexperiance->save();
        }

        
        if($request->workExperiances){
            $repeatExps = $request->workExperiances;
            foreach($repeatExps as  $experiance){
                $workexperiance = new Workexperiance;
                $workexperiance->application_id = $applicaton->id;
                $workexperiance->company = $experiance['company'];
                $workexperiance->designation =  $experiance['designation'];
                $workexperiance->from =  date('Y-m-d',strtotime($experiance['from_date']));
                $workexperiance->to =  date('Y-m-d',strtotime($experiance['to_date']));
                $workexperiance->save();
            }
        }
        return redirect()->route('home')->with('success', 'Application Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        $application->delete();
        if($application->workExperiances){
            $application->workExperiances->delete();
        }
        return redirect()->route('home')->with('success', 'Application Deleted Successfully.');
    }
}
