
<div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>@ MURIS STUDIO 2020 | Aplikasi Absensi Berbasis Website Menggunakan Codeignitier.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="<?php echo base_url('');?>asset/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?php echo base_url('');?>asset/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?php echo base_url('');?>asset/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?php echo base_url('');?>asset/vendor/slick/slick.min.js">
    </script>
    <script src="<?php echo base_url('');?>asset/vendor/wow/wow.min.js"></script>
    <script src="<?php echo base_url('');?>asset/vendor/animsition/animsition.min.js"></script>
    <script src="<?php echo base_url('');?>asset/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?php echo base_url('');?>asset/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url('');?>asset/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?php echo base_url('');?>asset/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?php echo base_url('');?>asset/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?php echo base_url('');?>asset/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?php echo base_url('');?>asset/vendor/select2/select2.min.js"></script>

    <!-- full calendar requires moment along jquery which is included above -->
    <script src="<?php echo base_url('');?>asset/vendor/fullcalendar-3.10.0/lib/moment.min.js"></script>
    <script src="<?php echo base_url('');?>asset/vendor/fullcalendar-3.10.0/fullcalendar.js"></script>

    <!-- Main JS-->
    <script src="<?php echo base_url('');?>asset/js/main.js"></script>
<script src="<?php echo base_url('');?>asset/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript">
$(function() {
  // for now, there is something adding a click handler to 'a'
  var tues = moment().day(2).hour(19);

  // build trival night events for example data
  var events = [
    {
      title: "Special Conference",
      start: moment().format('YYYY-MM-DD'),
      url: '#'
    },
    {
      title: "Doctor Appt",
      start: moment().hour(9).add(2, 'days').toISOString(),
      url: '#'
    }

  ];

  var trivia_nights = []

  for(var i = 1; i <= 4; i++) {
    var n = tues.clone().add(i, 'weeks');
    console.log("isoString: " + n.toISOString());
    trivia_nights.push({
      title: 'Trival Night @ Pub XYZ',
      start: n.toISOString(),
      allDay: false,
      url: '#'
    });
  }

  // setup a few events
  $('#calendar').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay,listWeek'
    },
    events: events.concat(trivia_nights)
  });
});
    </script>

<script type="text/javascript">
        $(function(){
            $(".datepicker").datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
                todayHighlight: true,
            });
        });
    </script>

</body>

</html>
<!-- end document-->
