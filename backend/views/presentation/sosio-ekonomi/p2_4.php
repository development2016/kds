

<?php foreach ($model as $key => $value) {
$date = $value['dob'];

  $year =  date('Y', strtotime($date));
  $current = 2015;
  $new =  $current - $year;


} ?>