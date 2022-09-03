<?php

if(isset($_POST['submit_button'])){
    $timeslots=$_POST['timeslots'];
    //echo $timeslots;
    foreach($timeslots as $timeslot){
        echo $timeslot;
    }
}