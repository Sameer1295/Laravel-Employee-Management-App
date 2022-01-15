

<h2>code for index for showing all payrolls with respective employeeids n name</h2>
@foreach($payrolls as $payroll)
    {{$payroll->id}}
    {{$payroll->employer->id}}
    {{$payroll->employee->name}}
    <hr>
@endforeach

<div class="form-group row">
            <label class="col-sm-3 col-form-label" for="employer">Employer:</label>
            <select class="col-sm-8 form-control" name="employer_id" id="employer_id">
                <option value="">Select Employer</option>
                @foreach($payrolls as $employer)
                    @if($payroll->employer_id == $payroll->Employer->id)
                        <option value="{{$payroll->Employer->id}}" selected="selected">{{$payroll->Employer->name}}</option>
                    @else
                        <option value="{{$payroll->Employer->id}}">{{$payroll->Employer->name}}</option>
                    @endif
                @endforeach    
            </select>
        </div>