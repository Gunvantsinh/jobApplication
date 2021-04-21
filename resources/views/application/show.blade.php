@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Show Application') }}
                <a href="{{ route('home') }}" class="btn btn-primary float-right">
                    <span class="kt-hidden-mobile">Back</span>
                </a>

                </div>
                            
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            <div class="alert-text">
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif
                    <h5>Basic Details:</h5>
                    <dl class="row">
                        <dt class="col-sm-1">Name : </dt>
                        <dd class="col-sm-3"> {{ $application->name }}</dd>
                        
                        <dt class="col-sm-1">Email :</dt>
                        <dd class="col-sm-3"> {{ $application->email }}</dd>
                        
                        <dt class="col-sm-1">Gender :</dt>
                        <dd class="col-sm-3"> {{ $application->gender }}</dd>
                        
                        <dt class="col-sm-1">Address</dt>
                        <dd class="col-sm-3"> {{ $application->address }}</dd>

                        <dt class="col-sm-1">contact</dt>
                        <dd class="col-sm-3"> {{ $application->contact }}</dd>
                    </dl>
                    <hr>
                    <h5>Education details:</h5>
                    <dl class="row">
                        <dt class="col-sm-2">Board/University : </dt>
                        <dd class="col-sm-3"> {{ $application->university }}</dd>
                        
                        <dt class="col-sm-2">Year :</dt>
                        <dd class="col-sm-3"> {{ $application->year }}</dd>
                        
                        <dt class="col-sm-3">CGPA/Percentage :</dt>
                        <dd class="col-sm-3"> {{ $application->percentage }}</dd>
                        
                    </dl>
                    <hr>
                    <h5>Work Experience:</h5>
                    @foreach($workExperiances as $experiance)
                    <dl class="row">
                        <dt class="col-sm-2">Company : </dt>
                        <dd class="col-sm-2"> {{ $experiance->company }}</dd>
                        
                        <dt class="col-sm-2">Designation :</dt>
                        <dd class="col-sm-2"> {{ $experiance->designation }}</dd>
                        
                        <dt class="col-sm-2">From :</dt>
                        <dd class="col-sm-2"> {{ $experiance->from }}</dd>

                        <dt class="col-sm-2">TO :</dt>
                        <dd class="col-sm-3"> {{ $experiance->to }}</dd>
                        
                    </dl>
                    @endforeach
                    <hr>
                    <h5>Known Languages:</h5>
                    <h6>Hindi:</h6>
                    <dl class="row">
                        <dt class="col-sm-1">Read : </dt>
                        <dd class="col-sm-3"> {{ $application->hindiread == 1 ? 'Yes' : 'No' }}</dd>
                        
                        <dt class="col-sm-1">Write :</dt>
                        <dd class="col-sm-3"> {{ $application->hindiwrite == 1 ? 'Yes' : 'No' }}</dd>
                        
                        <dt class="col-sm-1">Speak :</dt>
                        <dd class="col-sm-3"> {{ $application->hindispeak == 1 ? 'Yes' : 'No' }}</dd>
                    </dl>
                    <h6>Englist:</h6>
                    <dl class="row">
                        <dt class="col-sm-1">Read : </dt>
                        <dd class="col-sm-3"> {{ $application->engdiresd == 1 ? 'Yes' : 'No' }}</dd>
                        
                        <dt class="col-sm-1">Write :</dt>
                        <dd class="col-sm-3"> {{ $application->engwrite == 1 ? 'Yes' : 'No' }}</dd>
                        
                        <dt class="col-sm-1">Speak :</dt>
                        <dd class="col-sm-3"> {{ $application->engspeak == 1 ? 'Yes' : 'No' }}</dd>
                    </dl>
                    <h6>Gujarati:</h6>
                    <dl class="row">
                        <dt class="col-sm-1">Read : </dt>
                        <dd class="col-sm-3">{{ $application->gujaratiread == 1 ? 'Yes' : 'No' }}</dd>
                        
                        <dt class="col-sm-1">Write :</dt>
                        <dd class="col-sm-3"> {{ $application->gujaratiwrite == 1 ? 'Yes' : 'No' }}</dd>
                        
                        <dt class="col-sm-1">Speak :</dt>
                        <dd class="col-sm-3">{{ $application->gujaratispeak == 1 ? 'Yes' : 'No' }}</dd>
                    </dl>
                    <hr>
                    <h5>Technical Experience:</h5>
                    <h6>PHP:</h6>
                    <dl class="row">
                        <dt class="col-sm-2">Beginner : </dt>
                        <dd class="col-sm-2">{{ $application->phpbeginner == 1 ? 'Yes' : 'No' }}</dd>
                        
                        <dt class="col-sm-2">Mediator :</dt>
                        <dd class="col-sm-2"> {{ $application->phpmediator == 1 ? 'Yes' : 'No' }}</dd>
                        
                        <dt class="col-sm-2">Expert :</dt>
                        <dd class="col-sm-2">{{ $application->phpexpert == 1 ? 'Yes' : 'No' }}</dd>
                    </dl>   
                    <h6>MYSQL:</h6>
                    <dl class="row">
                        <dt class="col-sm-2">Beginner : </dt>
                        <dd class="col-sm-2">{{ $application->mysqlbeginner == 1 ? 'Yes' : 'No' }}</dd>
                        
                        <dt class="col-sm-2">Mediator :</dt>
                        <dd class="col-sm-2"> {{ $application->mysqlmediator == 1 ? 'Yes' : 'No' }}</dd>
                        
                        <dt class="col-sm-2">Expert :</dt>
                        <dd class="col-sm-2">{{ $application->mysqlexpert == 1 ? 'Yes' : 'No' }}</dd>
                    </dl>   
                    <h6>Laravel:</h6>
                    <dl class="row">
                        <dt class="col-sm-2">Beginner : </dt>
                        <dd class="col-sm-2">{{ $application->laravelbeginner == 1 ? 'Yes' : 'No' }}</dd>
                        
                        <dt class="col-sm-2">Mediator :</dt>
                        <dd class="col-sm-2"> {{ $application->laravelmediator == 1 ? 'Yes' : 'No' }}</dd>
                        
                        <dt class="col-sm-2">Expert :</dt>
                        <dd class="col-sm-2">{{ $application->laravelexpert == 1 ? 'Yes' : 'No' }}</dd>
                    </dl>  
                    <hr>
                    <h5>Preference :</h5>
                    <dl class="row">
                        <dt class="col-sm-2">Preffered Location: </dt>
                        <dd class="col-sm-2">{{ $application->location }}</dd>
                        
                        <dt class="col-sm-2">Expected CTC :</dt>
                        <dd class="col-sm-2"> {{ $application->ectc }}</dd>
                        
                        <dt class="col-sm-2">Current CTC :</dt>
                        <dd class="col-sm-2">{{ $application->cctc }}</dd>
                        <dt class="col-sm-3">Notice Period(In month) :</dt>
                        <dd class="col-sm-2">{{ $application->notice_period }}</dd>
                    </dl>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
