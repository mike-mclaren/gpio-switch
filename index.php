<?php

// simple responsive web page to manipulate gpio pins on a raspberry pi
// used with a sainsmart 4 channel relay board, which uses 0 (no voltage) to activate relay
// if your board uses voltage high to activate, switch the 1's and 0's below

// set these to the pin numbers (bcm) on the pi
$box1_pin = '17';
$box2_pin = '27';
$box3_pin = '18';
$box4_pin = '22';

// sets the pins to output mode
$box1_pin_out = exec("gpio -g mode $box1_pin out");
$box2_pin_out = exec("gpio -g mode $box2_pin out");
$box3_pin_out = exec("gpio -g mode $box3_pin out");
$box4_pin_out = exec("gpio -g mode $box4_pin out");

// read the current pin values
$box1_pin_status = exec("gpio -g read $box1_pin");
$box2_pin_status = exec("gpio -g read $box2_pin");
$box3_pin_status = exec("gpio -g read $box3_pin");
$box4_pin_status = exec("gpio -g read $box4_pin");

// switch 1's and 0's here if your board uses voltage high to activate
if (isset($_POST["box1_on"]))  { exec("gpio -g write $box1_pin 0"); header("Location: index.php"); }
if (isset($_POST["box1_off"])) { exec("gpio -g write $box1_pin 1"); header("Location: index.php"); }
if (isset($_POST["box2_on"]))  { exec("gpio -g write $box2_pin 0"); header("Location: index.php"); }
if (isset($_POST["box2_off"])) { exec("gpio -g write $box2_pin 1"); header("Location: index.php"); }
if (isset($_POST["box3_on"]))  { exec("gpio -g write $box3_pin 0"); header("Location: index.php"); }
if (isset($_POST["box3_off"])) { exec("gpio -g write $box3_pin 1"); header("Location: index.php"); }
if (isset($_POST["box4_on"]))  { exec("gpio -g write $box4_pin 0"); header("Location: index.php"); }
if (isset($_POST["box4_off"])) { exec("gpio -g write $box4_pin 1"); header("Location: index.php"); }

?>
<!doctype html>
<html>
    <head>
        <title>GPIO Switch</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="main.css" type="text/css">
        <link href="favicon.ico" rel="icon" type="image/x-icon" />
    </head>
    <style>

    </style>
    <body>

        <div class="header">
            <h1>GPIO Switch</h1>
        </div>

        <div class="row"> 
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="col-3 col-m-3 button">
                <div class="column-label">
                    <p>Pin 17</p>
                </div>
                    <div>
                    <?php
                        if ($box1_pin_status === '0') {
                            $status="on";
                        } else {
                            $status="green-hover";
                        }
                    ?>
                        <input type="submit" class="<?php echo $status; ?>" name="box1_on" value="On" />
                    </div>
                    <div>
                    <?php
                        if ($box1_pin_status === '1') {
                            $status="off";
                        } else {
                            $status="red-hover";
                        }
                    ?>
                        <input type="submit" class="<?php echo $status; ?>" name="box1_off" value="Off" />
                    </div>
            </div>
            <div class="col-3 col-m-3 button">
                <div class="column-label">
                    <p>Pin 27</p>
                </div>
                    <div>
                    <?php
                        if ($box2_pin_status === '0') {
                            $status="on";
                        } else {
                            $status="green-hover";
                        }
                    ?>
                        <input type="submit" class="<?php echo $status; ?>" name="box2_on" value="On" />
                    </div>
                    <div>
                    <?php
                        if ($box2_pin_status === '1') {
                            $status="off";
                        } else {
                            $status="red-hover";
                        }
                    ?>
                        <input type="submit" class="<?php echo $status; ?>" name="box2_off" value="Off" />
                    </div>
            </div>
            <div class="col-3 col-m-3 button">
                <div class="column-label">
                    <p>Pin 18</p>
                </div>
                    <div>
                    <?php
                        if ($box3_pin_status === '0') {
                            $status="on";
                        } else {
                            $status="green-hover";
                        }
                    ?>
                        <input type="submit" class="<?php echo $status; ?>" name="box3_on" value="On" />
                    </div>
                    <div>
                    <?php
                        if ($box3_pin_status === '1') {
                            $status="off";
                        } else {
                            $status="red-hover";
                        }
                    ?>
                        <input type="submit" class="<?php echo $status; ?>" name="box3_off" value="Off" />
                    </div>
            </div>
            <div class="col-3 col-m-3 button">
                <div class="column-label">
                    <p>Pin 22</p>
                </div>
                    <div>
                    <?php
                        if ($box4_pin_status === '0') {
                            $status="on";
                        } else {
                            $status="green-hover";
                        }
                    ?>
                        <input type="submit" class="<?php echo $status; ?>" name="box4_on" value="On" />
                    </div>
                    <div>
                    <?php
                        if ($box4_pin_status === '1') {
                            $status="off";
                        } else {
                            $status="red-hover";
                        }
                    ?>
                        <input type="submit" class="<?php echo $status; ?>" name="box4_off" value="Off" />
                    </div>
            </div>
            </form>
        </div>

        <div class="footer">
            <p>GPIO Switch</p>
        </div>

    </body>
</html>

