<?php

// This will return the up and down expression for a particular probe, if the image files exist
// Need to add an else statement to display something if we don't have the image files

include('config.php');

if (isset($_GET['probe'])){
   if (isset($_GET['gene'])){
	$return_arr = array();
        $probey = $_GET['probe'];
        $gene = $_GET['gene'];
        $high = 'data/' . $gene . '_' . $probey . '/' . $gene . '_' . $probey . '_high.nii.gz';
        $low = 'data/' . $gene . '_' . $probey . '/' . $gene . '_' . $probey . '_low.nii.gz';
	if (file_exists($high)) {
	  // Add high image
	  $image = array('url' => $high,'name' => $probey . "_up", "colorPalette" => "red","cache" => "false","intent" => "z-score");
          $return_arr[] =  $image;
        }
	if (file_exists($low)) {
          // Add low image
	  $image = array('url' => $low,'name' => $probey . "_down", "colorPalette" => "green","cache" => "false","intent" => "z-score");
          $return_arr[] =  $image;
        }

        // This is the MNI standard space
	$image = array('url' => 'data/X.nii.gz','name' => 'XMNI 2mm', "colorPalette" => "grayscale","cache" => "false","intent" => "Intensity:");
        $return_arr[] =  $image;

        /* Toss back results as json encoded array. */
        echo json_encode($return_arr);
     }
}

?>
