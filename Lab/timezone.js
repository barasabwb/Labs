
$(document).ready(function () { 
    // $('input[name="utc_timestamp"]').val('Work!');
    var d = new Date();
var offset = d.getTimezoneOffset();
var timestamp = d.getTime();
var utc_timestamp = timestamp + (6000 * offset);

// $('input[name="time_zone_offset"]').val("offset");	
$('input[name="utc_timestamp"]').val(utc_timestamp);
$('input[name="time_zone_offset"]').val(offset);
// $('utc_timestamp').val("utc_timestamp");
});