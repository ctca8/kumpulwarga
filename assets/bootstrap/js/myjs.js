$(function () {
      // datepicker
      $('.tanggal').datepicker({
          format: "yyyy-mm-dd",
          autoclose:true
      });

      //Initialize Select2 Elements
      $(".select2").select2();


      /* initialize the calendar
       -----------------------------------------------------------------*/
      var base_url='http://localhost/kumpulwarga/'; // Here i define the base_url
      $('#calendar').fullCalendar({
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
        },
        buttonText: {
          today: 'today',
          month: 'month',
          week: 'week',
          day: 'day'
        },
        //Random default events
        events: base_url+'agenda/getEvents',
        // allow "more" link when too many events
        eventLimit: true,

        // Event Click
        eventClick: function(calEvent) {
          if (calEvent.id_agenda) {
              location.assign(base_url+'agenda/detail_agenda/'+calEvent.id_agenda); 
          }
        }
      });
      // end of fullcalendar

  });

  // fungsi untuk menambahkan format uang
  function formatCurrency(num) {
    num = num.toString().replace(/\$|\,/g,'');
    if(isNaN(num))
      num = "0";
      sign = (num == (num = Math.abs(num)));
      num = Math.floor(num*100+0.50000000001);
      cents = num%100;
      num = Math.floor(num/100).toString();
    if(cents<10)
      cents = "0" + cents;
    for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
      num = num.substring(0,num.length-(4*i+3))+'.'+
      num.substring(num.length-(4*i+3));
    return (((sign)?'':'-') + ' Rp ' + num + ',' + cents);
  }