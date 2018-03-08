<?
ob_start();
session_start();
include 'includes/config.inc.php';
include 'includes/functions.php';
include 'includes/model.php';
include 'includes/fixed_data.php';
include 'includes/input.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?=COMPANY?></title>
  <? include 'css.php';?>
</head>

<body class="nav-md footer_fixed">
  <div class="container body">
    <div class="main_container">
      <? include 'sidenav.php';?>

      <? include 'topnav.php';?>
      <!-- page content -->

      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Welcome to <?=COMPANY?></h3>
            </div>

          </div>
          <div class="clearfix"></div>

