<div class="clearfix"></div>
<div>
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h4 class="green"><i class="fa fa-paint-brush"></i> {{$project->name}}</h4>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">

                <div class="col-md-12 col-sm-12 col-xs-12">

                    <ul class="stats-overview">
                        <li>
                            <span class="name"> Client company </span>
                            <span class="value text-success"> {{$project->client}} </span>
                        </li>
                        <li>
                            <span class="name"> Total amount spent </span>
                            <span class="value text-success"> $ 2000 </span>
                        </li>
                        <li class="hidden-phone">
                            <span class="name"> Estimated project duration </span>
                            <span class="value text-success"> {{$project->estimate_manday}} manday </span>
                        </li>
                    </ul>
                    <br />

                    <div id="mainb">
                        <h4>Booking</h4>
                        <div class="gantt"></div>
                    </div>
                    <br/>
                    <div>

                        <h4>Recent Activity</h4>

                        <!-- end of user messages -->
                        <ul class="messages">
                            <li>
                                <img src="images/img.jpg" class="avatar" alt="Avatar">
                                <div class="message_date">
                                    <h3 class="date text-info">24</h3>
                                    <p class="month">May</p>
                                </div>
                                <div class="message_wrapper">
                                    <h4 class="heading">Desmond Davison</h4>
                                    <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                    <br />
                                    <p class="url">
                                        <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                        <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <img src="images/img.jpg" class="avatar" alt="Avatar">
                                <div class="message_date">
                                    <h3 class="date text-error">21</h3>
                                    <p class="month">May</p>
                                </div>
                                <div class="message_wrapper">
                                    <h4 class="heading">Brian Michaels</h4>
                                    <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                    <br />
                                    <p class="url">
                                        <span class="fs1" aria-hidden="true" data-icon=""></span>
                                        <a href="#" data-original-title="">Download</a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <img src="images/img.jpg" class="avatar" alt="Avatar">
                                <div class="message_date">
                                    <h3 class="date text-info">24</h3>
                                    <p class="month">May</p>
                                </div>
                                <div class="message_wrapper">
                                    <h4 class="heading">Desmond Davison</h4>
                                    <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                    <br />
                                    <p class="url">
                                        <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                        <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                                    </p>
                                </div>
                            </li>
                        </ul>
                        <!-- end of user messages -->


                    </div>


                </div>


            </div>
        </div>
    </div>
</div>

<script>
    /*jslint unparam: true */
    /*global window, $ */
    $(function () {
        'use strict';

        $.ajax({
            url: "{{ url('project/booking-data/' . $project->id) }}",
            dataType: "json",
            success: function(reponse) {
                $(".gantt").gantt({
                    source: reponse,
                    navigate: "scroll",
                    scale: "days",
                    maxScale: "months",
                    minScale: "days",
                    itemsPerPage: 10,
                    useCookie: false,
                    onItemClick: function(data) {
                        alert("Item clicked - show some details");
                    },
                    onAddClick: function(dt, rowId) {
                        alert("Empty space clicked - add an item!");
                    },
                    onRender: function() {
                        if (window.console && typeof console.log === "function") {
                            console.log("chart rendered");
                        }
                    }
                });

//                $(".gantt").popover({
//                    selector: ".bar",
//                    title: "I'm a popover",
//                    content: "And I'm the content of said popover.",
//                    trigger: "hover"
//                });

                prettyPrint();
            }

        });




    });


</script>