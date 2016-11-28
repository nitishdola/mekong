<?php
    $db=new mysqli('localhost','root','','logistk7_db');
    $sql='SELECT * FROM tbl_user_data';
    extract($_POST);
    if(isset($size))
        $sql.= " WHERE core_services LIKE '%".implode('%\''.' union SELECT * FROM tbl_user_data WHERE core_services LIKE \'%',$size)."%'";
    $all_row=$db->query($sql);
?>
<?php 
    $i = 0;
    while($r = mysqli_fetch_array($all_row)){
    ?>
    <div style="width: 100%; border:1px solid #EFEFEF; border-radius: 3px; padding: 20px;">
        <font style="color: #032C5A; font-size: 16px;"><strong><a href="company_details.php?id=<?php echo $r['id']; ?>"><?php echo $r['company_name']; ?></a></strong></font><br>
            <div style="height: 10px; margin-top: 10px;">
                <p style="float: left;">Core Services : </p>
                <div style="width: auto; height: 25px; border:1px solid #19A3B3; padding: 2px; border-radius: 3px; margin-top: -40px; display: inline-block; float: right;">41 Hits</div>
                <?php
                $myString = $r['core_services'];
                $myArray = explode(',', $myString);
                $strCount = substr_count($myString, ",");
                for($j=0;$j<=$strCount;$j++){
                ?>
                <div style="block; background-color: #19A3B3; color: #fff; width: auto; font-size: 12px; padding: 3px; height: 22px; float: left; margin-left: 5px; border-radius: 3px;"><?php print_r($myArray[$j]); ?></div>
                <?php } ?>
            </div>
            <br>
        Country / Province : <img src="images/flag/china.png" width="20px" style="margin-top: -3px; border-radius: 2px;" />&nbsp;Laos / Yunnan Province</div>
        <div style="width: 25%; height: 20px; margin-top: -45px; display: inline-block; float: right;">Last Updated : 24/11/2016</div>
    </div><br>
   <?php $i++;} ?>
