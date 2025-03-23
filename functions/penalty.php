<?php
    $dates = array("1/28/13","1/29/13","1/30/13","1/31/13");
    foreach($dates as $myDate) {
        $dueDate = date('n/j/y', strtotime("+1 months", strtotime($myDate)));
        $myDateMonth = date ('n',strtotime($myDate));
        $dueDateMonth = date('n', strtotime($dueDate));
        $myDateYear = date ('Y',strtotime($myDate));
        $dueDateYear = date ('Y',strtotime($dueDate));


            if(($dueDateMonth - $myDateMonth)>1) {
                if($myDateYear==$dueDateYear) $nextMonth = $myDateMonth+1;
                else if($myDateYear<$dueDateYear) $nextMonth = 1;
                $dueDateOrg = date("n/t/y", strtotime($nextMonth."/1/".$dueDateYear));
            }
            else {
                $dueDateOrg = $dueDate;
            }



        echo $myDate." due date is ".$dueDateOrg."<br />";
    }

?>