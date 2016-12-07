<?php
/*
*Using simple XML to update data
*/
//prevent from redirect

if(isset($_SERVER['HTTP_REFERER'])){
  header("Location: ".$_SERVER['HTTP_REFERER']);
}
else{
  echo "Error";
}

//stor form data in variables
$name = $_POST["name"];
$comment = $_POST["comment"];
$time = $_POST["time"];
//check if XML file exists
if(file_exists('review.xml')){
  //load data from xml file into xml variable
  $xml = simplexml_load_file('review.xml');
  //add new book elementto variable
  $newChild = $xml->addChild('review');
  $newChild->addChild('name',$name);
  $newChild->addChild('comment',$comment);
  $newChild->addChild('time',$time);
  
  $output = $xml->asXML();
  
}
  //if file doesnt exist
  else{
    exit('Failed to open review.xml');//error message
  }
  //save new data from variable back into an xml file
  file_put_contents('/home/cabox/workspace/Project/review.xml',$xml->asXML());    
?>