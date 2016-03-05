  <?php

        include('config.php');

        $i = 1;
        $group1 = "";
        $size1 = count($_POST["select1"]);
        foreach($_POST["select1"] as $value){
          if($i != $size1){
            $group1 .= $value . ",";
          }
          else{
            $group1 .= $value;
          }
          $i++;
        }

        $i = 1;
        $group2 = "";
        $size2 = count($_POST["select2"]);
        foreach($_POST["select2"] as $value){
          if($i != $size2){
            $group2 .= $value . ",";
          }
          else{
            $group2 .= $value;
          }
          $i++;
        }

        $url = "http://localhost/cgi-bin/R/gbmanat?" . "group1=" . $group1 . "&" . "group2=" . $group2;

        print_r($url);
    ?>

