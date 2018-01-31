@extends('main')
@section('content')

    <link href="{{ URL::asset('theme/css/svg-liquid.css') }}" rel="stylesheet" type="text/css">


    <style type="text/css">
    .graph_container{
  display:block;
  width:600px;
}
      .site-footer {
        position: unset;
      }
      .icon-success {
          color: #5CB85C;
      }

      .icon-remove {
          color: #b85c5c;
      }
      .table > thead > tr > th, .table > tbody > tr > th, .table > tbody > tr > td {
        padding: 8px;
        line-height: 1.42857143;
        vertical-align: top;
        border-top: 1px solid #ddd;
        text-align: center;
      }
      .table > thead > tr > th {
        border-bottom: none;
      }
      .progress {
          height: 20px;
          margin-bottom: 20px;
          overflow: hidden;
          background-color: #e4e4e4;
          border-radius: 4px;
          -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.36);
          box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.36);
      }
      .progress-title {
        background-color: unset;
        -webkit-box-shadow: unset;
        box-shadow: unset;
      }
      .normal-range {
        width: 85px;
        text-align: center;
        position: absolute;
        margin-left: 30px;
        border-bottom: 1px solid;
        padding-bottom: 5px;
      }
      .tab-1, th, td {
        border: 1px solid #ddd;
      }
      .tab-1 > tbody > tr > td {
        width: 45px;
      }
      @media (max-width:768px) {
        .inb {
          margin-top: 280px;
        }
      }
    </style>


<?php $user = Session::get('user'); ?>

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <p class="centered"><img src="{{ URL::asset('theme/img/patient.png') }}" class="img-circle" width="100"></p>
                  <h5 class="centered" style="padding-top: 20px;">{{ Session::get('user')->name }}</h5>
                  <h5 class="centered">(PATIENT)</h5>
                    
                  <li class="mt">
                      <a href="/">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li>
                      <a class="active" href="#">
                          <i class="fa fa-dashboard"></i>
                          <span>User Information</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-user"></i>
                          <span>Daily Diet</span>
                      </a>
                      <ul class="sub">                          <li><a href="/nso/adddailydiet">Add Daily Diet</a></li>                          <li><a href="/DailyDiet_Details">View Daily Diet</a></li>                      </ul>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <?php

          $bmi = $inbody->BMI;
          $height = $anthro->height / 100;
          $idealWeight = $bmi * $height;

          $weight = $inbody->weight;
          $wrist = $anthro->wrist;
          $waist = $anthro->waist;
          $hip = $anthro->hip;
          $forearm = $anthro->forearm;
          $gender = $data->gender;
          $f1 = null;
          $f2 = null;
          $f3 = null;
          $f4 = null;
          $f5 = null;
          $total = null;
          $LBM = null;
          $BFM = null;

          if($gender == "Perempuan") {
        $f1 = ($weight * 0.732) + 8.987;
        $f2 = $wrist / 3.14;
        $f3 = $waist * 0.157;
        $f4 = $hip * 0.249;
        $f5 = $forearm * 0.434;
        $n = $f1 + $f2;
        $q = $n - $f3;
        $g = $q - $f4;
        $LBM = $f5 + $g;
        $SMM = $LBM - 23.127;
        $BFM = $weight - $LBM;
        $total = ($BFM / $weight) * 100;

      } else if($gender == "Lelaki") {
        $f1 = ($weight * 1.082) + 94.42;
        $LBM = $f1 - ($waist * 4.15);
        $SMM = $LBM - 23.127;
        $BFM = $LBM - $weight;
        $total = ($BFM / $weight) * 100;
      }
          ?>
      <section id="main-content">
          <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i> View InBody Result</h3>
            <div class="row mt">

          <div class="showback col-md-10 col-md-offset-1" style="padding: 10px;">
          <h3>Patient Information</h3>

            <div class="well form-horizontal">
              <div class="col-lg-12" style="top: 127px;margin-bottom: 10px;">              

<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" style="display: none;">
 
  <symbol id="wave">
    <path d="M420,20c21.5-0.4,38.8-2.5,51.1-4.5c13.4-2.2,26.5-5.2,27.3-5.4C514,6.5,518,4.7,528.5,2.7c7.1-1.3,17.9-2.8,31.5-2.7c0,0,0,0,0,0v20H420z"></path>
    <path d="M420,20c-21.5-0.4-38.8-2.5-51.1-4.5c-13.4-2.2-26.5-5.2-27.3-5.4C326,6.5,322,4.7,311.5,2.7C304.3,1.4,293.6-0.1,280,0c0,0,0,0,0,0v20H420z"></path>
    <path d="M140,20c21.5-0.4,38.8-2.5,51.1-4.5c13.4-2.2,26.5-5.2,27.3-5.4C234,6.5,238,4.7,248.5,2.7c7.1-1.3,17.9-2.8,31.5-2.7c0,0,0,0,0,0v20H140z"></path>
    <path d="M140,20c-21.5-0.4-38.8-2.5-51.1-4.5c-13.4-2.2-26.5-5.2-27.3-5.4C46,6.5,42,4.7,31.5,2.7C24.3,1.4,13.6-0.1,0,0c0,0,0,0,0,0l0,20H140z"></path>
  </symbol>

</svg>
<div class="water-jar" style="display: none;">
  <div class="water-filling" style="display: none;">
    <div class="percentNum" id="count">0</div>
    <div class="percentB">%</div>
  </div>
  <div class="background-water"></div>
  <div class="img-jar">
    <img  src="{{ URL::asset('theme/img/human-body-small2.png') }}">
  </div>
 
  <div id="water" class="water">
    <svg viewBox="0 0 560 20" class="water_wave water_wave_back">
      <use xlink:href="#wave"></use>
    </svg>

    <svg viewBox="0 0 560 20" class="water_wave water_wave_front">
      <use xlink:href="#wave"></use>
    </svg>
  </div>

  <div class="pull-right" style="width: 75px;text-align: center;font-size: 10pt;display: none;">
      <div>{{ number_format($LBM) }} KG</div>
      <hr style="margin: 3px 0px;">
      <div>Normal</div>
    </div>

              </div>
            </div>
                <div style="width: 75px;text-align: center;font-size: 10pt;position: absolute;right: 35px;">
      <div><span style="color: #f00;">{{ number_format($LBM) }} KG</span><br>(Lean Mass)</div>
      <hr style="margin: 3px 0px;">
      <div><span style="color: #f00;">Normal</span><br>(Evaluation)</div>
    </div>
              <div class="form-group inb">
                <label class="col-md-2 control-label">Name: </label>  
                <div class="col-md-4 inputGroupContainer">
                    <input class="form-control" type="text" name="name" value="{{$data->name}}" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">Age: </label>  
                <div class="col-md-4 inputGroupContainer">
                  <?php 
                        $date = $data->dateOfBirth;
                        $newDate = date("Y", strtotime($date));
                        $newDate = date("Y") - $newDate;
                  ?>
                    <input class="form-control" type="text" name="name" value="{{$newDate}}" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">Gender: </label>  
                <div class="col-md-4 inputGroupContainer">
                  <input class="form-control" type="text" name="name" value="{{$data->gender}}" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">Height: </label>  
                <div class="col-md-4 inputGroupContainer">
                  <input class="form-control" type="text" name="name" value="{{$anthro->height}}" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">Date: </label>  
                <div class="col-md-4 inputGroupContainer">
                  <input class="form-control" type="text" name="name" value="{{$dates}}" readonly>
                </div>
              </div>
            </div>
          </div>

          <div class="showback col-md-10 col-md-offset-1" style="padding: 10px;">
          <h3>Body Composition</h3>
            <div class="well form-horizontal">
              <div class="col-lg-12">
                <table class="table table-advance table-hover tab-1">
                  <thead>
                    <tr>
                      <th></th>
                      <th colspan="3">UNDER</th>
                      <th colspan="2">NORMAL</th>
                      <th colspan="6" style="padding: 0;padding-top: 8px;">OVER
                        <span style="font-size: 7pt;float: right;margin-top: 13px;">Units %</span>
                      </th>
                      <th>Normal Range</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th>Weight <span style="float: right;font-weight: bolder;">{{$weight}} kg</span></th>
                      <!-- UNDER -->
                      <td style="vertical-align: top;font-size: 8pt;padding: 0;">
                        <span style="margin-right: -15px;">55</span>
                        @if($weight < $ideal_weight->min || $weight >= 15)
                        <div style="background-color: #FFC107;width: 100%;padding: 7px;"></div>
                        @else
                        <div style="background-color: #f5f5f5;width: 100%;padding: 7px;"></div>
                        @endif
                      </td>
                      <td style="vertical-align: top;font-size: 8pt;padding: 0;">
                        <span style="margin-right: -15px;">70</span>
                        @if($weight < $ideal_weight->min || $weight >= 25)
                        <div style="background-color: #FFC107;width: 100%;padding: 7px;"></div>
                        @else
                        <div style="background-color: #f5f5f5;width: 100%;padding: 7px;"></div>
                        @endif
                      </td>
                      <td style="vertical-align: top;font-size: 8pt;padding: 0;">
                        <span style="margin-right: -15px;">85</span>
                        @if($weight < $ideal_weight->min || $weight >= 35)
                        <div style="background-color: #FFC107;width: 100%;padding: 7px;"></div>
                        @else
                        <div style="background-color: #f5f5f5;width: 100%;padding: 7px;"></div>
                        @endif
                      </td>
                      <!-- NORMAL -->
                      <td style="vertical-align: top;font-size: 8pt;padding: 0;">
                        <span style="margin-right: -15px;">100</span>
                        @if($weight >= $ideal_weight->min)
                        <div style="background-color: #8BC34A;width: 100%;padding: 7px;"></div>
                        @else
                        <div style="background-color: #f5f5f5;width: 100%;padding: 7px;"></div>
                        @endif
                      </td>
                      <td style="vertical-align: top;font-size: 8pt;padding: 0;">
                        <span style="margin-right: -15px;">115</span>
                        @if($weight >= $ideal_weight->max)
                        <div style="background-color: #8BC34A;width: 100%;padding: 7px;"></div>
                        @else
                        <div style="background-color: #f5f5f5;width: 100%;padding: 7px;"></div>
                        @endif
                      </td>
                      <!-- OVER -->
                      <td style="vertical-align: top;font-size: 8pt;padding: 0;">
                        <span style="margin-right: -15px;">130</span>
                        @if($weight > $ideal_weight->max || $weight >= 65)
                        <div style="background-color: #f44336;width: 100%;padding: 7px;"></div>
                        @else
                        <div style="background-color: #f5f5f5;width: 100%;padding: 7px;"></div>
                        @endif
                      </td>
                      <td style="vertical-align: top;font-size: 8pt;padding: 0;">
                        <span style="margin-right: -15px;">145</span>
                        @if($weight > 65 || $weight >= 75)
                        <div style="background-color: #f44336;width: 100%;padding: 7px;"></div>
                        @else
                        <div style="background-color: #f5f5f5;width: 100%;padding: 7px;"></div>
                        @endif
                      </td>
                      <td style="vertical-align: top;font-size: 8pt;padding: 0;">
                        <span style="margin-right: -15px;">160</span>
                        @if($weight > 75 || $weight >= 85)
                        <div style="background-color: #f44336;width: 100%;padding: 7px;"></div>
                        @else
                        <div style="background-color: #f5f5f5;width: 100%;padding: 7px;"></div>
                        @endif
                      </td>
                      <td style="vertical-align: top;font-size: 8pt;padding: 0;">
                        <span style="margin-right: -15px;">175</span>
                        @if($weight > 85 || $weight >= 95)
                        <div style="background-color: #f44336;width: 100%;padding: 7px;"></div>
                        @else
                        <div style="background-color: #f5f5f5;width: 100%;padding: 7px;"></div>
                        @endif
                      </td>
                      <td style="vertical-align: top;font-size: 8pt;padding: 0;">
                        <span style="margin-right: -15px;">190</span>
                         @if($weight > 95 || $weight >= 105)
                        <div style="background-color: #f44336;width: 100%;padding: 7px;"></div>
                        @else
                        <div style="background-color: #f5f5f5;width: 100%;padding: 7px;"></div>
                        @endif
                      </td>
                      <td style="vertical-align: top;font-size: 8pt;padding: 0;">
                        <span style="margin-right: -15px;">205</span>
                         @if($weight > 105 || $weight >= 115)
                        <div style="background-color: #f44336;width: 100%;padding: 7px;"></div>
                        @else
                        <div style="background-color: #f5f5f5;width: 100%;padding: 7px;"></div>
                        @endif
                      </td>
                      <!-- NORMAL RANGE -->
                      <th>{{ $ideal_weight->min }} - {{ $ideal_weight->max }}</th>
                    </tr>

                    <tr>
                      <th>Muscle Mass <span style="float: right;font-weight: bolder;">{{number_format($SMM, 2)}} kg</span></th>
                      <?php
                      if($data->gender == "Perempuan") {
                        if($newDate >= 18 || $newDate <= 40) {
                          $MMmin = 24.4;
                          $MMmax = 30.2;
                        } elseif($newDate >= 41 || $newDate <= 60) {
                          $MMmin = 24.2;
                          $MMmax = 30.3;
                        } elseif($newDate >= 61 || $newDate <= 80) {
                          $MMmin = 24.0;
                          $MMmax = 29.8;
                        }
                      } elseif($data->gender == "Lelaki") {
                        if($newDate >= 18 || $newDate <= 40) {
                          $MMmin = 33.4;
                          $MMmax = 39.4;
                        } elseif($newDate >= 41 || $newDate <= 60) {
                          $MMmin = 33.2;
                          $MMmax = 39.2;
                        } elseif($newDate >= 61 || $newDate <= 80) {
                          $MMmin = 33.0;
                          $MMmax = 38.7;
                        }
                      }
                      ?>
                      <!-- UNDER -->
                      <td style="vertical-align: top;font-size: 8pt;padding: 0;">
                        <span style="margin-right: -15px;">55</span>
                        @if(number_format($SMM) >= 6.1 || number_format($SMM) < $MMmin)
                        <div style="background-color: #FFC107;width: 100%;padding: 7px;"></div>
                        @else
                        <div style="background-color: #f5f5f5;width: 100%;padding: 7px;"></div>
                        @endif
                      </td>
                      <td style="vertical-align: top;font-size: 8pt;padding: 0;">
                        <span style="margin-right: -15px;">70</span>
                        @if(number_format($SMM) >= 12.2 || number_format($SMM) < $MMmin)
                        <div style="background-color: #FFC107;width: 100%;padding: 7px;"></div>
                        @else
                        <div style="background-color: #f5f5f5;width: 100%;padding: 7px;"></div>
                        @endif
                      </td>
                      <td style="vertical-align: top;font-size: 8pt;padding: 0;">
                        <span style="margin-right: -15px;">85</span>
                        @if(number_format($SMM) >= 18.3 || number_format($SMM) < $MMmin)
                        <div style="background-color: #FFC107;width: 100%;padding: 7px;"></div>
                        @else
                        <div style="background-color: #f5f5f5;width: 100%;padding: 7px;"></div>
                        @endif
                      </td>
                      <!-- NORMAL -->
                      <td style="vertical-align: top;font-size: 8pt;padding: 0;">
                        <span style="margin-right: -15px;">100</span>
                        @if(number_format($SMM) >= $MMmin)
                        <div style="background-color: #8BC34A;width: 100%;padding: 7px;"></div>
                        @else
                        <div style="background-color: #f5f5f5;width: 100%;padding: 7px;"></div>
                        @endif
                      </td>
                      <td style="vertical-align: top;font-size: 8pt;padding: 0;">
                        <span style="margin-right: -15px;">115</span>
                        @if(number_format($SMM) > $MMmax || number_format($SMM) >= 30.3)
                        <div style="background-color: #8BC34A;width: 100%;padding: 7px;"></div>
                        @else
                        <div style="background-color: #f5f5f5;width: 100%;padding: 7px;"></div>
                        @endif
                      </td>
                      <!-- OVER -->
                      <td style="vertical-align: top;font-size: 8pt;padding: 0;">
                        <span style="margin-right: -15px;">130</span>
                        @if(number_format($SMM) > $MMmax || number_format($SMM) >= 31.1)
                        <div style="background-color: #f44336;width: 100%;padding: 7px;"></div>
                        @else
                        <div style="background-color: #f5f5f5;width: 100%;padding: 7px;"></div>
                        @endif
                      </td>
                      <td style="vertical-align: top;font-size: 8pt;padding: 0;">
                        <span style="margin-right: -15px;">145</span>
                        @if(number_format($SMM) > $MMmax || number_format($SMM) >= 31.9)
                        <div style="background-color: #f44336;width: 100%;padding: 7px;"></div>
                        @else
                        <div style="background-color: #f5f5f5;width: 100%;padding: 7px;"></div>
                        @endif
                      </td>
                      <td style="vertical-align: top;font-size: 8pt;padding: 0;">
                        <span style="margin-right: -15px;">160</span>
                        @if(number_format($SMM) > $MMmax || number_format($SMM) >= 32.7)
                        <div style="background-color: #f44336;width: 100%;padding: 7px;"></div>
                        @else
                        <div style="background-color: #f5f5f5;width: 100%;padding: 7px;"></div>
                        @endif
                      </td>
                      <td style="vertical-align: top;font-size: 8pt;padding: 0;">
                        <span style="margin-right: -15px;">175</span>
                        @if(number_format($SMM) > $MMmax || number_format($SMM) >= 33.5)
                        <div style="background-color: #f44336;width: 100%;padding: 7px;"></div>
                        @else
                        <div style="background-color: #f5f5f5;width: 100%;padding: 7px;"></div>
                        @endif
                      </td>
                      <td style="vertical-align: top;font-size: 8pt;padding: 0;">
                        <span style="margin-right: -15px;">190</span>
                         @if(number_format($SMM) > $MMmax || number_format($SMM) >= 34.3)
                        <div style="background-color: #f44336;width: 100%;padding: 7px;"></div>
                        @else
                        <div style="background-color: #f5f5f5;width: 100%;padding: 7px;"></div>
                        @endif
                      </td>
                      <td style="vertical-align: top;font-size: 8pt;padding: 0;">
                        <span style="margin-right: -15px;">205</span>
                         @if(number_format($SMM) > $MMmax || number_format($SMM) >= 35.2)
                        <div style="background-color: #f44336;width: 100%;padding: 7px;"></div>
                        @else
                        <div style="background-color: #f5f5f5;width: 100%;padding: 7px;"></div>
                        @endif
                      </td>
                      <!-- NORMAL RANGE -->
                      <th>{{ $MMmin }} - {{ $MMmax }}</th>
                    </tr>
                    <tr>
                      <th>Body Fat Mass  <span style="float: right;font-weight: bolder;">{{ number_format($BFM, 1)}} kg</span></th>
                      <?php
                      if($data->gender == "Perempuan") {
                        if($newDate >= 18 || $newDate <= 40) {
                          $BFMmin = 6.5;
                          $BFMmax = 10.4;
                        } elseif($newDate >= 41 || $newDate <= 60) {
                          $BFMmin = 6.3;
                          $BFMmax = 10.2;
                        } elseif($newDate >= 61 || $newDate <= 80) {
                          $BFMmin = 6.1;
                          $BFMmax = 9.8;
                        }
                      } elseif($data->gender == "Lelaki") {
                        if($newDate >= 18 || $newDate <= 40) {
                          $BFMmin = 7.7;
                          $BFMmax = 15.4;
                        } elseif($newDate >= 41 || $newDate <= 60) {
                          $BFMmin = 7.5;
                          $BFMmax = 15.2;
                        } elseif($newDate >= 61 || $newDate <= 80) {
                          $BFMmin = 7.3;
                          $BFMmax = 14.7;
                        }
                      }
                      ?>
                      <!-- UNDER -->
                      <td style="vertical-align: top;font-size: 8pt;padding: 0;">
                        <span style="margin-right: -15px;">55</span>
                        @if(number_format($BFM, 1) >= 5.1 || number_format($BFM, 1) < $BFMmin)
                        <div style="background-color: #FFC107;width: 100%;padding: 7px;"></div>
                        @else
                        <div style="background-color: #f5f5f5;width: 100%;padding: 7px;"></div>
                        @endif
                      </td>
                      <td style="vertical-align: top;font-size: 8pt;padding: 0;">
                        <span style="margin-right: -15px;">70</span>
                        @if(number_format($BFM, 1) >= 5.5 || number_format($BFM, 1) < $BFMmin)
                        <div style="background-color: #FFC107;width: 100%;padding: 7px;"></div>
                        @else
                        <div style="background-color: #f5f5f5;width: 100%;padding: 7px;"></div>
                        @endif
                      </td>
                      <td style="vertical-align: top;font-size: 8pt;padding: 0;">
                        <span style="margin-right: -15px;">85</span>
                        @if(number_format($BFM, 1) >= 5.7 || number_format($BFM, 1) < $BFMmin)
                        <div style="background-color: #FFC107;width: 100%;padding: 7px;"></div>
                        @else
                        <div style="background-color: #f5f5f5;width: 100%;padding: 7px;"></div>
                        @endif
                      </td>
                      <!-- NORMAL -->
                      <td style="vertical-align: top;font-size: 8pt;padding: 0;">
                        <span style="margin-right: -15px;">100</span>
                        @if(number_format($BFM, 1) >= $BFMmin)
                        <div style="background-color: #8BC34A;width: 100%;padding: 7px;"></div>
                        @else
                        <div style="background-color: #f5f5f5;width: 100%;padding: 7px;"></div>
                        @endif
                      </td>
                      <td style="vertical-align: top;font-size: 8pt;padding: 0;">
                        <span style="margin-right: -15px;">115</span>
                        @if(number_format($BFM, 1) >= $BFMmax)
                        <div style="background-color: #8BC34A;width: 100%;padding: 7px;"></div>
                        @else
                        <div style="background-color: #f5f5f5;width: 100%;padding: 7px;"></div>
                        @endif
                      </td>
                      <!-- OVER -->
                      <td style="vertical-align: top;font-size: 8pt;padding: 0;">
                        <span style="margin-right: -15px;">130</span>
                        @if(number_format($BFM, 1) > $BFMmax || number_format($BFM, 1) >= 15.7)
                        <div style="background-color: #f44336;width: 100%;padding: 7px;"></div>
                        @else
                        <div style="background-color: #f5f5f5;width: 100%;padding: 7px;"></div>
                        @endif
                      </td>
                      <td style="vertical-align: top;font-size: 8pt;padding: 0;">
                        <span style="margin-right: -15px;">145</span>
                        @if(number_format($BFM, 1) > $BFMmax || number_format($BFM, 1) >= 15.9)
                        <div style="background-color: #f44336;width: 100%;padding: 7px;"></div>
                        @else
                        <div style="background-color: #f5f5f5;width: 100%;padding: 7px;"></div>
                        @endif
                      </td>
                      <td style="vertical-align: top;font-size: 8pt;padding: 0;">
                        <span style="margin-right: -15px;">160</span>
                        @if(number_format($BFM, 1) > $BFMmax || number_format($BFM, 1) >= 16.1)
                        <div style="background-color: #f44336;width: 100%;padding: 7px;"></div>
                        @else
                        <div style="background-color: #f5f5f5;width: 100%;padding: 7px;"></div>
                        @endif
                      </td>
                      <td style="vertical-align: top;font-size: 8pt;padding: 0;">
                        <span style="margin-right: -15px;">175</span>
                        @if(number_format($BFM, 1) > $BFMmax || number_format($BFM, 1) >= 16.3)
                        <div style="background-color: #f44336;width: 100%;padding: 7px;"></div>
                        @else
                        <div style="background-color: #f5f5f5;width: 100%;padding: 7px;"></div>
                        @endif
                      </td>
                      <td style="vertical-align: top;font-size: 8pt;padding: 0;">
                        <span style="margin-right: -15px;">190</span>
                         @if(number_format($BFM, 1) > $BFMmax || number_format($BFM, 1) >= 16.5)
                        <div style="background-color: #f44336;width: 100%;padding: 7px;"></div>
                        @else
                        <div style="background-color: #f5f5f5;width: 100%;padding: 7px;"></div>
                        @endif
                      </td>
                      <td style="vertical-align: top;font-size: 8pt;padding: 0;">
                        <span style="margin-right: -15px;">205</span>
                         @if(number_format($BFM, 1) > $BFMmax || number_format($BFM, 1) >= 16.7)
                        <div style="background-color: #f44336;width: 100%;padding: 7px;"></div>
                        @else
                        <div style="background-color: #f5f5f5;width: 100%;padding: 7px;"></div>
                        @endif
                      </td>
                      <!-- NORMAL RANGE -->
                      <th>{{ $BFMmin }} - {{ $BFMmax }}</th>
                    </tr>
                  </tbody>
                </table>
              </div>

                  <table class="table">
                    <tbody>
                      <tr>
                        <th width="25%" style="padding-left: 35px;">TBW (Total Body Water)</th>
                        <?php
                          $tbw = "";
                          if($data->gender == "Lelaki") {
                            $tbw = 2.447 - (0.09156 * $newDate) + (0.1074 * $anthro->height) + (0.3362 * $inbody->weight);
                          } else if($data->gender == "Perempuan") {
                            $tbw =  -2.097 + (0.1069 * $anthro->height) + (0.2466 * $inbody->weight);
                          }
                        ?>
                        <td style="text-align: center;border-right: 1px solid #9d9d9d;">{{number_format($tbw, 2)}}</td>
                        <th width="25%" style="padding-left: 35px;">FFM(Fat Free Mass)</th>
                        <td style="text-align: center;">{{number_format($LBM, 2)}}</td>
                      </tr>
                      <tr>
                        <th width="25%" style="padding-left: 35px;">Protein</th>
                        <td style="text-align: center;border-right: 1px solid #9d9d9d;">{{number_format($g, 2)}}</td>
                        <th width="25%" style="padding-left: 35px;">Mineral</th>
                        <td style="text-align: center;">{{number_format($q, 2)}}</td>
                      </tr>
                    </tbody>
                  </table>
              </div>
          </div>
          <div class="showback col-lg-5 col-md-offset-1">
          <div class="col-lg-12">
          <h3>Obesity Diagnosis</h3>
              <div class="well">
                  <table class="table">
                    <thead class="thead-inverse">
                    <tr>
                      <th width="70%;"></th>
                      <th>Value</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <th>BMI (kg)</th>
                      <td>{{$inbody->BMI}}</td>
                    </tr>
                    <tr>
                      <th>PBF:Percent Body Fat (%)</th>
                      <td>{{ number_format((($BFM / $weight) * 100), 2) }}%</td>
                    </tr>
                    <tr>
                      <th>WHR:Waist-Hip Ratio</th>
                      <td>{{$waist / $hip}}</td>
                    </tr>
                    </tbody>
                  </table>
            </div>
          </div>
          </div>
          <div class="showback col-lg-5">
          <div class="col-lg-12">
            <div class="well">
              <span>Fitness Score: {{$inbody->fitnessScore}}</span>
            </div>
          </div>
        </div>

          <div class="showback col-lg-10 col-md-offset-1">
            <h3>Body Fat References</h3>
            <table class="table table-striped table-advance table-hover">
<thead>
<tr class="info">
<th class="text-center">Description</th>
<th class="text-center">Women</th>
<th class="text-center">Men</th>
</tr>
</thead>
<tbody class="text-center">
<tr>
<td>Essential fat</td>
<td>10% - 13%</td>
<td>2% - 5%</td>
</tr>
<tr>
<td>Athletes</td>
<td>14% - 20%</td>
<td>6% - 13%</td>
</tr>
<tr>
<td>Fitness</td>
<td>21% - 24%</td>
<td>14% - 17%</td>
</tr>
<tr>
<td>Average</td>
<td>25% - 31%</td>
<td>18% - 24%</td>
</tr>
<tr>
<td>Obese</td>
<td>32% and above</td>
<td>25% and above</td>
</tr>
</tbody>
</table>

<hr style="margin: 45px 8px;border-color: #b6bbbd;">

<h3>Age-Adjusted Body Fat Recommendations</h3>
<table class="table table-striped table-advance table-hover">
<tbody>
  <tr class="info">
    <th colspan="5">Women</th>
  </tr>
  <tr>
    <th>Age</th>
    <th colspan="4">Description</th>
  </tr>
  <tr>
    <th></th>
    <th>Underfat</th><th>Healthy</th><th>Overweight</th><th>Obese</th>
  </tr>
  <tr>
    <th>20-40</th>
    <td>under 21 %</td><td>21-33 %</td><td>33-39 %</td><td>Over 39 %</td>
  </tr>
  <tr>
    <th>41-60</th>
    <td>under 23 %</td><td>23-35 %</td><td>35-40 %</td><td>Over 40 %</td>
  </tr>
  <tr>
    <th>61-79</th>
    <td>under 24 %</td><td>24-36 %</td><td>36-42 %</td><td>Over 42 %</td>
  </tr>

  <tr class="info">
    <th colspan="5">Men</th>
  </tr>
  <tr>
    <th>Age</th>
    <th colspan="4">Description</th>
  </tr>
  <tr>
    <th></th>
    <th>Underfat</th><th>Healthy</th><th>Overweight</th><th>Obese</th>
  </tr>
  <tr>
    <th>20-40</th>
    <td>under 8 %</td><td>8-19 %</td><td>19-25 %</td><td>Over 25 %</td>
  </tr>
  <tr>
    <th>41-60</th>
    <td>under 11 %</td><td>11-22 %</td><td>22-27 %</td><td>Over 27 %</td>
  </tr>
  <tr>
    <th>61-79</th>
    <td>under 13 %</td><td>13-25 %</td><td>25-30 %</td><td>Over 30 %</td>
  </tr>
  </tbody>
</table>
          </div>

    </section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->

<script src="{{ URL::asset('theme/js/jquery.js') }}"></script>
<script src="{{ URL::asset('theme/js/jquery-1.8.3.min.js') }}"></script>
<script src="{{ URL::asset('theme/js/chart.min.js') }}"></script>
<script>
  $(document).ready(function() {
    var musclemass = {{ number_format($LBM) }};
$('.water-jar').css('display', 'block');

var cnt=document.getElementById("count");
 
var water=document.getElementById("water");
 
var percent=cnt.innerText;
 
var interval;

interval=setInterval(function(){
 
  percent++;
 
  cnt.innerHTML = percent;
 
  water.style.transform='translate(0'+','+(100-percent)+'%)';
if(musclemass > 100) {
  if(percent==100){
    clearInterval(interval);
  }
} else {
  if(percent==musclemass){ //change 100 to result
 
    clearInterval(interval);
 
  }
}
 
},60);

});

</script>

@endsection
