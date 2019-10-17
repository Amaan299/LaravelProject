@extends('layout')
@extends('employee_nav')
@section('markattend')
    <div id="page-wrapper" style="height: 200px">

        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css" />
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

        {!! $calendar->calendar() !!}
        {!! $calendar->script() !!}
       {{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
    <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Employee Attendance</h4>
                    </div>
                    <div class="modal-body">
                        <p>Some text in the modal.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>

            </div>
        </div>--}}
    <!-- The Modal -->
        <div id="myModal" style="margin-left: 35%" class="modal" >

            <!-- Modal content -->
            <div class="modal-content" style="width:45%">
                <span class="close" style="margin-top: 3px;margin-right: 10px">&times;</span>
                <div class="container" style="width: 84%;">
                    <h4>Employee Attendance</h4>

                    <form method="POST" action="/employee_markattend/timein">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-6"><button required id="in" type="button" class="btn btn-success" onclick="DothisFun()" style="font-size:16px;padding: 8px;font-size: 16px;width: 100%; " >Time in </button>
                            </div>
                            <div class="col-sm-6"><input class="ShowTime" type="text"  placeholder="Starting Time"  disabled style="width: 100%;padding: 8px;border-radius: 8px;border: 2px solid #411c0e;" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6"><button required type="button" class="btn btn-danger" onclick="DothisFun2()" style="font-size:16px;padding: 8px;font-size: 16px;width: 100%; margin-top: 5px;"  >Time Out </button>
                            </div>
                            <div class="col-sm-6"><input  class="ShowEndTime" type="text"  placeholder="Leaving Time"  disabled style="width: 100%;padding: 8px;border-radius: 8px;border: 2px solid #411c0e ;margin-top: 5px;" ></div>
                            <p class="demo-picked" >
                                <span data-calendar-label="picked" id="pick" style="display: none"></span>

                                <input style="display: none" type="text" class="ShowTime" name="CurrTime">
                                <input style="display: none" type="text" class="ShowEndTime" name="EndTime">

                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success" style="font-size:16px;padding: 8px;font-size: 16px;width: 100%; inherit ; margin-top: 10px; ">Save Time</button>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" id="CancelBox" class="btn btn-danger" style="font-size: 16px;margin: auto;margin-top: 10px;width: 100%;background-color: #be3a31;padding: 8px;">Cancel</button>
                            </div>

                            </p>
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
    {{--    <script>

            $(document).ready(function(){
                $.ajax({
                    url: 'checkSign',
                    success: function (response){
                        if(response === undefined || response == null || response.length <= 0){
                            $("#in").attr("active", true);
                        }
                        else{
                            $("#in").attr("disabled", true);
                            $(".ShowTime").val(response);

                        }

                    }
                });
            });

        </script>--}}

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
    </div>
@endsection