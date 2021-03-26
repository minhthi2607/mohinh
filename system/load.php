<?php

function loadPage($page = 'site')
{
  $pathView = 'views/';
  if ($page == 'site') {

    if (isset($_REQUEST['option'])) {
      $pathView .= $_REQUEST['option'];
      if (isset($_REQUEST['id'])) {
        $pathView .= '-detail.php';
      } else {
        if (isset($_REQUEST['cat'])) {
          $pathView .= '-category.php';
        } else {
          $pathView .= '.php';
        }
      }
    } else {
      $pathView .= 'home.php';
    }
  } else {
    // quan tri
    if (isset($_REQUEST['option'])) {
      $pathView .= $_REQUEST['option'] . "/";
      if (isset($_REQUEST['cat'])) {
        $pathView .= $_REQUEST['cat'] . '.php';
      } else {
        $pathView .= 'index.php';
      }
    } else {
      $pathView .= 'dashboard/index.php';
    }
  }

  require_once($pathView);
}
function loadModel($name)
{
  // xu ly dep file
  $name = ucfirst(strtolower($name));
  // thiet lap duong dan 
  $pathModel = "models/" . $name . ".php";
  // b3 goi 
  if (!file_exists($pathModel)) {
    $pathModel = "../models/" . $name . ".php";
  }
  require_once($pathModel);
  return new $name;
}
function loadClass($name)
{
  // xu ly dep file
  $name = ucfirst(strtolower($name));
  // thiet lap duong dan 
  $pathClass = "system/" . $name . ".php";
  // b3 goi 
  if (!file_exists($pathClass)) {
    $pathModel = "../system/" . $name . ".php";
  }
  require_once($pathClass);
  return new $name;
}