<?php

function get_revenue_month(){
    $result= db_fetch_array("SELECT DATE_FORMAT(check_out,'%m')AS Month, SUM(total) as SUM FROM `bookroom`,`detailbook` WHERE YEAR(check_out)=YEAR(NOW()) AND state=1 AND bookroom.id=detailbook.booking_code GROUP BY Month");
    return $result;
}
