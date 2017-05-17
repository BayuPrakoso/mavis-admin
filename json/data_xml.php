<?php

  require_once '../application/DB_Connect.php';
  require_once '../controllers/ControllerRest.php';
  $controllerRest = new ControllerRest();

  $resultDestination = $controllerRest->getDestinationsResult();
  $resultCategories = $controllerRest->getCategoriesResult();
  $resultPhotos = $controllerRest->getPhotosResult();

  
  // header ("content-type: text/xml");
  header("Content-Type: application/xml; charset=ISO-8859-1");
  echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
  echo "<data>";

      // DESTINATION
      echo "<destinations>";
      foreach ($resultDestination as $row) 
      {
          echo"<item>";
          foreach ($row as $columnName => $field) 
          {
            $field = str_replace("&#039;", "'", $field);
            if(!is_numeric($columnName)) {
                echo "<$columnName>$field</$columnName>";
            }
          }
          echo"</item>";
      }
      echo "</destinations>";
      

      // CATEGORIES
      echo "<categories>";
      foreach ($resultCategories as $row) 
      {
          echo"<item>";
          foreach ($row as $columnName => $field) 
          {
            $field = str_replace("&#039;", "'", $field);
            if(!is_numeric($columnName)) {
                echo "<$columnName>$field</$columnName>";
            }
          }
          echo"</item>";
      }
      echo "</categories>";


      // PHOTOS
      echo "<photos>";
      foreach ($resultPhotos as $row) 
      {
          echo"<item>";
          foreach ($row as $columnName => $field) 
          {
            $field = str_replace("&#039;", "'", $field);
            if(!is_numeric($columnName)) {
                echo "<$columnName>$field</$columnName>";
            }
          }
          echo"</item>";
      }
      echo "</photos>";
  
  echo "</data>";

?>