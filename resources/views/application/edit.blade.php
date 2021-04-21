@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Job Application') }}</div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            <div class="alert-text">
                                {{ session('success') }}
                            </div>
                        </div>
                @endif
                <span style="color: red;">* Compulsory</span>
                <div class="card-body">
                    <form method="POST" class="repeater" action="{{ route('application.update',$application->id)}}">
                        @csrf
                        @method('PUT')
                        <h5>Basic Details:</h5>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for=""> Name <span style="color: red;">*</span></label>
                                    <input type="text" name="name" class="form-control" id="" value="{{ $application->name}}">
                                </div>    
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Email <span style="color: red;">*</span></label>
                                    <input type="email" name="email" class="form-control" value="{{ $application->email}}">
                                </div>  
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Gender </label>
                                        <div class="form-group">
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" value="male" {{ $application->gender == 'male' ? 'checked': ''}}>Male
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" value="female" {{ $application->gender == 'female' ? 'checked' : ''}}>Female
                                        </label>
                                    </div>    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <textarea class="form-control"  name="address" id="" cols="0" rows="3"> {{ $application->address}}</textarea>
                                </div>    
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Contact <span style="color: red;">*</span></label>
                                    <input type="number" name="contact" class="form-control" id="" value="{{ $application->contact}}">
                                </div>     
                            </div>
                        </div>
                        <hr>
                        <h5>Education details:</h5>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for=""> Board/University <span style="color: red;">*</span></label>
                                    <input type="text" name="university" class="form-control" id="" value="{{ $application->university}}">
                                </div>    
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Year <span style="color: red;">*</span></label>
                                    <input type="number" name="year" class="form-control" id="" value="{{ $application->year}}" >
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">CGPA/Percentage <span style="color: red;">*</span></label>
                                    <input type="number" name="percentage"  class="form-control" step=".01" id="" value="{{ $application->percentage}}">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5>Work Experience:</h5>
                        @foreach($workExperiances as $experiance)
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for=""> Company</label>
                                    <input type="text" name="company[]" class="form-control" id=""  value="{{ $experiance->company}}">
                                </div>    
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Designation</label>
                                    <input type="text" name="designation[]" class="form-control" id="" value="{{ $experiance->designation}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">From</label>
                                    <input type="text" name="from_date[]" class="form-control datepicker" id="" value="{{ date('d-m-Y',strtotime($experiance->from))}}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">TO</label>
                                    <input type="text" name="to_date[]" class="form-control datepicker" id="" value="{{ date('d-m-Y',strtotime($experiance->to))}}">
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div data-repeater-list="workExperiances">
                            <div data-repeater-item>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for=""> Company</label>
                                            <input type="text" name="company" class="form-control" id="" aria-describedby="emailHelp" placeholder="">
                                        </div>    
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Designation</label>
                                            <input type="year" name="designation" class="form-control" id="" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label for="">From</label>
                                            <input type="text" name="from_date" class="form-control datepicker" id="" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label for="">TO</label>
                                            <input type="text" name="to_date" class="form-control datepicker" id="" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <button data-repeater-delete type="button" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button data-repeater-create type="button" class="btn btn-secondary">Add Another</button>
                        <hr>
                        <h5>Known Languages:</h5>
                        <div class="langueage_row">
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col-6">
                                    <div class="form-group">    
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="hindiCheck" name="hindiCheck" value="hindiCheck" class="custom-control-input" {{ ($application->hindiread == '1') || ($application->hindiwrite == '1') || ($application->hindispeak == '1') ? 'checked': ''}}>
                                                <label class="custom-control-label" for="hindiCheck">Hindi</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="hinreadCheck" name="hinreadCheck" value="hinreadCheck" class="custom-control-input" {{ $application->hindiread == '1' ? 'checked': ''}} {{ ($application->hindiread == '0') && ($application->hindiwrite == '0') && ($application->hindispeak == '0') ? 'disabled': ''}}>
                                                <label class="custom-control-label" for="hinreadCheck">Read</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="hinwriteCheck" name="hinwriteCheck" value="hinwriteCheck" class="custom-control-input" {{ $application->hindiwrite == '1' ? 'checked': ''}} {{ ($application->hindiread == '0') && ($application->hindiwrite == '0') && ($application->hindispeak == '0') ? 'disabled': ''}}>
                                                <label class="custom-control-label" for="hinwriteCheck">Write</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="hinspeakCheck"  name="hinspeakCheck" value="hinspeakCheck" class="custom-control-input" {{ $application->hindispeak == '1' ? 'checked': ''}} {{ ($application->hindiread == '0') && ($application->hindiwrite == '0') && ($application->hindispeak == '0') ? 'disabled': ''}}>
                                                <label class="custom-control-label" for="hinspeakCheck">Speak</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col-6">
                                    <div class="form-group">        
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="engCheck" name="engCheck"  value="engCheck" class="custom-control-input" {{ ($application->engread == '1') || ($application->engwrite == '1') || ($application->engspeak == '1') ? 'checked': ''}}>
                                                <label class="custom-control-label" for="engCheck">English</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="engreadCheck" name="engreadCheck"  value="engreadCheck" class="custom-control-input" {{ $application->engread == '1' ? 'checked': ''}}  {{ ($application->engread == '0') && ($application->engwrite == '0') && ($application->engspeak == '0') ? 'disabled': ''}}>
                                                <label class="custom-control-label" for="engreadCheck">Read</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="engwriteCheck"  name="engwriteCheck"  value="engwriteCheck" class="custom-control-input indeterminate-checkbox" {{ $application->engwrite == '1' ? 'checked': ''}} {{ ($application->engread == '0') && ($application->engwrite == '0') && ($application->engspeak == '0') ? 'disabled': ''}}>
                                                <label class="custom-control-label" for="engwriteCheck">Write</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="engspeakCheck"  name="engspeakCheck"  value="engspeakCheck" class="custom-control-input" {{ $application->engspeak == '1' ? 'checked': ''}} {{ ($application->engread == '0') && ($application->engwrite == '0') && ($application->engspeak == '0') ? 'disabled': ''}}>
                                                <label class="custom-control-label" for="engspeakCheck">Speak</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col-6">
                                    <div class="form-group">        
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="gujaratiCheck" name="gujaratiCheck"  value="gujaratiCheck" class="custom-control-input" {{ ($application->gujaratiread == '1') || ($application->gujaratiwrite == '1') || ($application->gujaratispeak == '1') ? 'checked': ''}}>
                                                <label class="custom-control-label" for="gujaratiCheck">Gujarati</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="gujreadCheck" name="gujreadCheck"  value="gujreadCheck"  class="custom-control-input" {{ $application->gujaratiread == '1' ? 'checked': ''}} {{ ($application->gujaratiread == '0') && ($application->gujaratiwrite == '0') && ($application->gujaratispeak == '0') ? 'disabled': ''}}>
                                                <label class="custom-control-label" for="gujreadCheck">Read</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="gujwriteCheck" name="gujwriteCheck"  value="gujwriteCheck"  class="custom-control-input" {{ $application->gujaratiwrite == '1' ? 'checked': ''}} {{ ($application->gujaratiread == '0') && ($application->gujaratiwrite == '0') && ($application->gujaratispeak == '0') ? 'disabled': ''}}>
                                                <label class="custom-control-label" for="gujwriteCheck">Write</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="gujspeakCheck" name="gujspeakCheck"  value="gujspeakCheck"  class="custom-control-input" {{ $application->gujaratispeak == '1' ? 'checked': ''}} {{ ($application->gujaratiread == '0') && ($application->gujaratiwrite == '0') && ($application->gujaratispeak == '0') ? 'disabled': ''}}>
                                                <label class="custom-control-label" for="gujspeakCheck">Speak</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5>Technical Experience:</h5>
                        <div class="Technical_Experience">
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col-6">
                                    <div class="form-group">    
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="php" name="php" value="php" class="custom-control-input" {{ ($application->phpbeginner == '1') || ($application->phpmediator == '1') || ($application->phpexpert == '1') ? 'checked': ''}}>
                                                <label class="custom-control-label" for="php">PHP</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="phpbeginner" name="phpbeginner" value="phpbeginner"  class="custom-control-input"  {{ $application->phpbeginner == '1' ? 'checked': ''}} {{ ($application->phpbeginner == '0') && ($application->phpmediator == '0') && ($application->phpexpert == '0') ? 'disabled': ''}}>
                                                <label class="custom-control-label" for="phpbeginner">Beginner</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="phpmediator" name="phpmediator" value="phpmediator" class="custom-control-input"  {{ $application->phpmediator == '1' ? 'checked': ''}} {{ ($application->phpbeginner == '0') && ($application->phpmediator == '0') && ($application->phpexpert == '0') ? 'disabled': ''}}>
                                                <label class="custom-control-label" for="phpmediator">Mediator</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="phpexpert" name="phpexpert" value="phpexpert" class="custom-control-input"  {{ $application->phpexpert == '1' ? 'checked': ''}} {{ ($application->phpbeginner == '0') && ($application->phpmediator == '0') && ($application->phpexpert == '0') ? 'disabled': ''}}>
                                                <label class="custom-control-label" for="phpexpert">Expert</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col-6">
                                    <div class="form-group">        
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="mysql" name="mysql"  value="mysql" class="custom-control-input" {{ ($application->mysqlbeginner == '1') || ($application->mysqlmediator == '1') || ($application->mysqlexpert == '1') ? 'checked': ''}}>
                                                <label class="custom-control-label" for="mysql">MYSQL</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="mysqlbeginner" name="mysqlbeginner" value="mysqlbeginner" class="custom-control-input" {{ $application->mysqlbeginner == '1' ? 'checked': ''}} {{ ($application->mysqlbeginner == '0') && ($application->mysqlmediator == '0') && ($application->mysqlexpert == '0') ? 'disabled': ''}}>
                                                <label class="custom-control-label" for="mysqlbeginner">Beginner</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="mysqlmediator" name="mysqlmediator" value="mysqlmediator" class="custom-control-input" {{ $application->mysqlmediator == '1' ? 'checked': ''}} {{ ($application->mysqlbeginner == '0') && ($application->mysqlmediator == '0') && ($application->mysqlexpert == '0') ? 'disabled': ''}}>
                                                <label class="custom-control-label" for="mysqlmediator">Mediator</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="mysqlexpert" name="mysqlexpert" value="mysqlexpert" class="custom-control-input" {{ $application->mysqlexpert == '1' ? 'checked': ''}} {{ ($application->mysqlbeginner == '0') && ($application->mysqlmediator == '0') && ($application->mysqlexpert == '0') ? 'disabled': ''}}>
                                                <label class="custom-control-label" for="mysqlexpert">Expert</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col-6">
                                    <div class="form-group">        
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="laravel" name="laravel"  value="laravel" c class="custom-control-input" {{ ($application->laravelbeginner == '1') || ($application->laravelmediator == '1') || ($application->laravelexpert == '1') ? 'checked': ''}}>
                                                <label class="custom-control-label" for="laravel">Laravel</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="laravelbeginner"  name="laravelbeginner" value="laravelbeginner"  class="custom-control-input" {{ $application->laravelbeginner == '1' ? 'checked': ''}} {{ ($application->laravelbeginner == '0') && ($application->laravelmediator == '0') && ($application->laravelexpert == '0') ? 'disabled': ''}}>
                                                <label class="custom-control-label" for="laravelbeginner">Beginner</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="laravelmediator"  name="laravelmediator" value="laravelmediator" class="custom-control-input indeterminate-checkbox" {{ $application->laravelmediator == '1' ? 'checked': ''}} {{ ($application->laravelbeginner == '0') && ($application->laravelmediator == '0') && ($application->laravelexpert == '0') ? 'disabled': ''}}>
                                                <label class="custom-control-label" for="laravelmediator">Mediator</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="laravelexpert" name="laravelexpert" value="laravelexpert" class="custom-control-input" {{ $application->laravelexpert == '1' ? 'checked': ''}} {{ ($application->laravelbeginner == '0') && ($application->laravelmediator == '0') && ($application->laravelexpert == '0') ? 'disabled': ''}}>
                                                <label class="custom-control-label" for="laravelexpert">Expert</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5>Preference :</h5>
                        <div class="preference_row">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for=""> Preffered Location <span style="color: red;">*</span></label>
                                        <select class="form-control" id=""  name="preffered_location">
                                            <option value="">Select Location</option>
                                            <option value="Ahmedabad" {{ $application->location == 'Ahmedabad' ? 'selected' : ''}}>Ahmedabad</option>
                                            <option value="Gandhinagar" {{ $application->location == 'Gandhinagar' ? 'selected' : ''}}>Gandhinagar</option>
                                        </select>
                                    </div>    
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Expected CTC <span style="color: red;">*</span></label>
                                        <input type="number" name="ectc" class="form-control" value="{{ $application->ectc}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Current CTC <span style="color: red;">*</span></label>
                                        <input type="number" name="cctc" class="form-control" value="{{ $application->cctc}}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Notice Period(In month) <span style="color: red;">*</span></label>
                                        <input type="number" name="notice_period" class="form-control" value="{{ $application->cctc}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit Application') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
<script>
$(document).ready(function(){
    $('body').on('focus',".datepicker", function(){
        $(this).datepicker({
                dateFormat: "dd-mm-yy"
        });
    });
    $('.repeater').repeater({
 
    initEmpty: true,
   
    show: function () {
        $(this).slideDown();
    },

    hide: function (deleteElement) {
        if(confirm('Are you sure you want to delete ?')) {
            $(this).slideUp(deleteElement);
        }
    },
    isFirstItemUndeletable: true
    });
  
    
    $('input[type="checkbox"]').click(function(){
        if($(this).is(":checked")){
            var lang = $(this).val();
            if(lang == 'hindiCheck'){
                $('#hinreadCheck').prop('disabled', false);
                $("#hinwriteCheck").prop('disabled', false);
                $("#hinspeakCheck").prop('disabled', false);
            }else if(lang == 'engCheck'){
                $('#engreadCheck').prop('disabled', false);
                $("#engwriteCheck").prop('disabled', false);
                $("#engspeakCheck").prop('disabled', false);
            }else if(lang == 'gujaratiCheck'){
                $('#gujreadCheck').prop('disabled', false);
                $("#gujwriteCheck").prop('disabled', false);
                $("#gujspeakCheck").prop('disabled', false)
            }else if(lang == 'php'){
                $('#phpbeginner').prop('disabled', false);
                $("#phpmediator").prop('disabled', false);
                $("#phpexpert").prop('disabled', false);
            }
            else if(lang == 'mysql'){
                $('#mysqlbeginner').prop('disabled', false);
                $("#mysqlmediator").prop('disabled', false);
                $("#mysqlexpert").prop('disabled', false);
            }
            else if(lang == 'laravel'){
                $('#laravelbeginner').prop('disabled', false);
                $("#laravelmediator").prop('disabled', false);
                $("#laravelexpert").prop('disabled', false);
            }

        }
        else if($(this).is(":not(:checked)")){
            var lang = $(this).val();
            if(lang == 'hindiCheck'){
                $('#hinreadCheck').prop('checked',false);
                $('#hinwriteCheck').prop('checked',false);
                $('#hinspeakCheck').prop('checked',false);

                $('#hinreadCheck').prop('disabled', true);
                $("#hinwriteCheck").prop('disabled', true);
                $("#hinspeakCheck").prop('disabled', true);
            }else if(lang == 'engCheck'){
                $('#engreadCheck').prop('disabled', true);
                $("#engwriteCheck").prop('disabled', true);
                $("#engspeakCheck").prop('disabled', true);

                $('#engreadCheck').prop('checked', false);
                $("#engwriteCheck").prop('checked', false);
                $("#engspeakCheck").prop('checked', false);

            }else if(lang == 'gujaratiCheck'){
                $('#gujreadCheck').prop('disabled', true);
                $("#gujwriteCheck").prop('disabled', true);
                $("#gujspeakCheck").prop('disabled', true);

                $('#gujreadCheck').prop('checked', false);
                $("#gujwriteCheck").prop('checked', false);
                $("#gujspeakCheck").prop('checked', false)
            }
            else if(lang == 'php'){
                $('#phpbeginner').prop('disabled', true);
                $("#phpmediator").prop('disabled', true);
                $("#phpexpert").prop('disabled', true);

                $('#phpbeginner').prop('checked', false);
                $("#phpmediator").prop('checked', false);
                $("#phpexpert").prop('checked', false);
            }
            else if(lang == 'mysql'){
                $('#mysqlbeginner').prop('disabled', true);
                $("#mysqlmediator").prop('disabled', true);
                $("#mysqlexpert").prop('disabled', true);

                $('#mysqlbeginner').prop('checked', false);
                $("#mysqlmediator").prop('checked', false);
                $("#mysqlexpert").prop('checked', false);
            }
            else if(lang == 'laravel'){
                $('#laravelbeginner').prop('disabled', true);
                $("#laravelmediator").prop('disabled', true);
                $("#laravelexpert").prop('disabled', true);

                $('#laravelbeginner').prop('checked', false);
                $("#laravelmediator").prop('checked', false);
                $("#laravelexpert").prop('checked', false);
            }
        }
    }); 


});
</script>
@endpush
