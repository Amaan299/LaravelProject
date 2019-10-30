@extends('layout')
@extends('hr_nav')
@section('markattend')
    <div id="page-wrapper" style="height: 200px">

        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css" />
        <link rel="stylesheet" href="/css/MyStyle1.css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

    {!! $calendar->calendar() !!}
    {!! $calendar->script() !!}

    <!-- The Modal -->
        <div id="myModal" style="margin-left: 35%" class="modal" >

            <!-- Modal content -->
            <div class="modal-content" style="width:45%">
                <span class="close" style="margin-top: 3px;margin-right: 10px">&times;</span>
                <div class="container" style="width: 84%;">
                    <h4 style="text-align: center">Employee Attendance</h4>

                    <form method="POST" action="/hr_markattend/{{$emp->id}}/timein">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-6 ml-5"><input name="mydate"   type="hidden"   value="{{date('Y-m-d')}}"  style="width: 100%;padding: 8px;border-radius: 8px;border: 2px solid #411c0e;" >
                            </div>
                            <div class="col-sm-6 ml-5"><input name="emp_id"   type="hidden"   value={{$emp->id}}  style="width: 100%;padding: 8px;border-radius: 8px;border: 2px solid #411c0e;" >
                            </div>

                            <div class="col-sm-6 ml-5"><input name="emp_name"   type="hidden"   value={{$emp->name}}  style="width: 100%;padding: 8px;border-radius: 8px;border: 2px solid #411c0e;" >
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-6"><button required id="in" {{(isset($myTime->time_in)) ? "disabled" : '' }} type="button" class="btn btn-primary" onclick="DothisFun()" style="font-size:16px;padding: 8px;font-size: 16px;width: 100%; " >Time in </button>
                            </div>
                            <div class="col-sm-6"><input readonly name="CurrTime" value="{{ (isset($myTime->time_in) && $myTime->emp_id==$emp->id) ? $myTime->time_in : '' }}" class="ShowTime" type="text"  placeholder="Starting Time" style="width: 100%;padding: 8px;border-radius: 8px;border: 2px solid #411c0e;" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6"><button required type="button" {{(isset($myTime->time_out) && ($myTime->time_out!='')) ? "disabled" : '' }} class="btn btn-danger" onclick="DothisFun2()" style="font-size:16px;padding: 8px;font-size: 16px;width: 100%; margin-top: 5px;"  >Time Out </button>
                            </div>
                            <div class="col-sm-6"><input readonly name="EndTime" value="{{ (isset($myTime->time_out) && $myTime->emp_id==$emp->id) ? $myTime->time_out : '' }}" class="ShowEndTime" type="text"  placeholder="Leaving Time" style="width: 100%;padding: 8px;border-radius: 8px;border: 2px solid #411c0e ;margin-top: 5px;" ></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <button type="submit" {{((isset($myTime->time_in)) && (isset($myTime->time_out)) && ($myTime->time_out!='') ) ? "disabled" : '' }} class="btn btn-success" style="font-size:16px;padding: 8px;font-size: 16px;width: 100%; inherit ; margin-top: 10px; ">Save Time</button>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" id="CancelBox" class="btn btn-danger" style="font-size: 16px;margin: auto;margin-top: 10px;width: 100%;background-color: #be3a31;padding: 8px;">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>



        <script>

            window.addEventListener('load', function () {

                $(".fc-state-highlight").click(function () {
                    var modal = document.getElementById("myModal");
                    modal.style.display = "block";

                });
            });

            function DothisFun() {

                var today = new Date();
                var tt= today.toLocaleTimeString('en-US');
                $(".ShowTime").val(tt);
                console.log($(".ShowTime").val());
            }

            function DothisFun2() {

                var today = new Date();
                var tt= today.toLocaleTimeString('en-US');
                $(".ShowEndTime").val(tt);
                console.log($(".ShowTime").val());
            }

        </script>


        <script>// Get the modal

            var modal = document.getElementById("myModal");

            var span = document.getElementsByClassName("close")[0];
            var CancelBOX = document.getElementById("CancelBox");

            CancelBOX.onclick = function() {
                modal.style.display = "none";
                $(".ShowEndTime").val("");
            }

            span.onclick = function() {
                modal.style.display = "none";
                $(".ShowEndTime").val("");
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }

        </script>



@endsection