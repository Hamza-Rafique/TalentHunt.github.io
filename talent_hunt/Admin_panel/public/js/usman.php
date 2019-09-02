<?php
function get_subcategory(){
    if (isset($_POST['cat_value'])){
        $vari=$_POST['cat_value'];
        echo $vari;
    }
}
get_subcategory();
?>