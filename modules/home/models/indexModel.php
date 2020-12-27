<?php

function get_revenue_month(){
    $result= db_fetch_array("SELECT DATE_FORMAT(pay_date,'%m')AS Month, SUM(total) as SUM FROM `bookroom` WHERE YEAR(pay_date)=YEAR(NOW()) AND state=1 GROUP BY Month");
    return $result;
}
