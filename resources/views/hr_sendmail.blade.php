@extends('layout')
@extends('hr_nav')
@section('addemployee')
    <div class="employee-form">
        <div class="col-lg-4"></div>
        <form action="/hr_addmail" method="POST" class="col-lg-4">
            {{ csrf_field() }}
            <h4 class="text-center" style="color: #2a88bd">Mail Form</h4>
            <input type="hidden" id="id" name="id" >
            <div class="form-group">
                <input type="email" class="form-control" id="to" name="to" placeholder="To:" required="required">
            </div>
            <div class="form-group">
                <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" required="required">
            </div>
            <div class="form-group">
                <textarea type="text" name="body" id="body" style="height: 50%" class="form-control" placeholder="Body" required="required"></textarea>
            </div>
            <div class="form-group text-center">
                <button type="submit" id="submit" name="submit" class="btn btn-primary">Send</button>
            </div>
        </form>
    </div>
@endsection