<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <title>Document</title>
  <!-- https://stackoverflow.com/questions/24487115/disable-enable-selected-date-range-on-jquery-datepicker-ui -->
</head>
<body>

<p>Date: <input type="text" id="datepicker"></p>

<script>

var unavailableDates = ["21-7-2021", "14-3-2012", "15-3-2012"];
function unavailable(date) {
    dmy = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
    if ($.inArray(dmy, unavailableDates) == -1) {
        return [true, ""];
    } else {
        return [false, "", "Unavailable"];
    }
}

// disable date range 

var startDate = "2014-06-15", // some start date
    endDate  = "2014-06-21",  // some end date
    dateRange = [];           // array to hold the range

// populate the array
for (var d = new Date(startDate); d <= new Date(endDate); d.setDate(d.getDate() + 1)) {
    dateRange.push($.datepicker.formatDate('yy-mm-dd', d));
}


  $( function() {

    $( "#datepicker" ).datepicker({
      beforeShowDay: unavailable
    });
  } );
  </script>
</body>
</html>