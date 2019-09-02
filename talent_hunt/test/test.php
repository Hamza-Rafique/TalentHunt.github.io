
<?php
$current_time=time();
echo "Current time is :".$current_time."<br>";
$expire_time=time()+(24*3600);
echo "Expire time is :".$expire_time."<br>";
$remain_time=$expire_time-$current_time;
echo "Remaining Time is:".$remain_time;
$hours=floor($remain_time/3600);
$minutes=floor(($remain_time/60)%60);
$seconds=$remain_time%60;
echo '<BR> Remaining Time is'.$hours.":".$minutes.":".$seconds;