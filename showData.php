<?php 
if (!isset($_GET['id'])) {
    header("Location: index.php");
}

require_once 'config.php';
$id = htmlspecialchars(stripslashes(trim($_GET['id'])));

$sql = "SELECT * FROM t1_tractors WHERE tractor_id = " .$id;
$result = mysqli_query($dbConn, $sql);
$row = mysqli_fetch_assoc($result);

$sql = "SELECT * FROM t2_tractors WHERE tractor_id = " .$id;
$result = mysqli_query($dbConn, $sql);
$row2 = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tractor details</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/custom.css" />
        <!-- jQuery library -->
        <script src="js/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="row">
            <div class="container-fluid">
                <div class="col-md-offset-2 col-md-8 col-md-offset-2">
                    <div class="header">
                        <h1 class="text-center">Tractor Details</h1>
                    </div><br />
                    <div class="col-md-5" style="background-color: lightgreen; padding: 10px">
                        <div class="col-md-12" style="background-color: white; box-shadow: 2px 2px 10px 5px lightgreen inset">
                        <img src="images/s_img_new.png" alt="tractor" class="img-responsive"/>
                        </div>
                    </div>
                    <div class="col-md-offset-1 col-md-6">
                        <h3><span style="color:#A80000 "><?php echo $row['tractor_nm'];?></span></h3>
                        <h4><?php echo $row['tractor_model'];?></h4><hr>
                        <h4>Horse Power : </span><?php echo $row['horse_power'] ; ?> hp</h4>
                        <h4>No of Cylinder : <?php echo $row['no_of_cylinder']; ?> <br /></h4>
                        <h4>Base MRP : ₹ 
                            <?php 
                            if ($row['base_mrp'] === null) {
                                echo "Not filled";
                            } else {
                                echo round(($row['base_mrp'])/100000,2);
                            }?> 
                            Lac <br /></h4>
                    </div><div class="clearfix"></div>
                    <br /><br />
                    <div class="col-md-12" style="background-color: lightgreen; padding: 4px">
                        <div class="col-md-12" style="background-color: #fff; padding: 15px;">
                            <table id="tractorDetails" class="table table-striped">
                                <tr><th colspan="2">Engine Performance</th></tr>
                                <tr>
                                    <td>Advertised Engine Power, Rated, hp</td>
                                    <td><?php echo $row2['adv_engine_power_hp'];?></td>
                                </tr>
                                <tr>
                                    <td>Maximum Engine Power, hp</td>
                                    <td><?php echo $row2['max_engine_power_hp']?></td>
                                </tr>
                                <tr>
                                    <td>Rated Engine Speed, rpm</td>
                                    <td><?php echo $row2['rated_engine_speed'];?></td>
                                </tr>
                                <tr>
                                    <td>Power Boost, hp </td>
                                    <td><?php echo $row2['power_boost_hp'];?></td>
                                </tr>
                                <tr>
                                    <td>Fuel Tank capacity, gal</td>
                                    <td><?php echo $row2['fuel_tank_capacity_gal'] ?></td>
                                </tr>
                                <tr>
                                    <td>Diesel Exhaust Fluid (DEF) tank capacity, gal</td>
                                    <td><?php echo $row2['def_tank_capacity_gal']?></td>
                                </tr>
                            </table>
                            <table id="tractorDetails" class="table table-striped">
                                <tr>
                                    <th colspan="2">PTO Performance</th>
                                </tr>
                                <tr>
                                    <td>PTO Horsepower, Basic / Optional Transmission, hp</td>
                                    <td><?php echo $row2['pto_horse_power_hp']?></td>
                                </tr>
                                <tr>
                                    <td>PTO Speeds, rpm</td>
                                    <td><?php echo $row2['pto_speeds_rpm'];?></td>
                                </tr>
                                <tr>
                                    <td>PTO operational Type (Independent; Live; Continuous)</td>
                                    <td><?php echo $row2['pto_operational_type'];?></td>
                                </tr>
                            </table>
                            <table id='tractorDetails' class="table table-striped">
                                <tr>
                                    <th colspan="2">Basic Engine</th>
                                </tr>
                                <tr>
                                    <td>Engine Make</td>
                                    <td><?php echo $row2['engine_make'] ;?></td>
                                </tr>
                                <tr>
                                    <td>Engine Model</td>
                                    <td><?php echo $row2['engine_model'] ;?></td>
                                </tr>
                                <tr>
                                    <td>Number of Cylinders</td>
                                    <td><?php echo $row2['no_of_cylinders'] ;?></td>
                                </tr>
                                <tr>
                                    <td>Displacement, cu in</td>
                                    <td><?php echo $row2['displacement_cu_in'] ;?></td>
                                </tr>
                                <tr>
                                    <td>Engine Bore, in</td>
                                    <td><?php echo $row2['engine_bore_in'] ;?></td>
                                </tr>
                                <tr>
                                    <td>Engine Stroke, in</td>
                                    <td><?php echo $row2['engine_stroke_in'] ;?></td>
                                </tr>
                                <tr>
                                    <td>Block Design, Replaceable Liners</td>
                                    <td><?php echo $row2['block_design'] ;?></td>
                                </tr>
                                <tr>
                                    <td>Aspiration, Turbocharged or Naturally Aspirated</td>
                                    <td><?php echo $row2['aspiration'] ;?></td>
                                </tr>
                            </table>
                            <table id='tractorDetails' class="table table-striped">
                                <tr>
                                    <th colspan="2">Fuel System</th>
                                </tr>
                                <tr>
                                    <td>Fuel System Description</td>
                                    <td><?php echo $row2['fuel_sys_description']; ?></td>
                                </tr>
                                <tr>
                                    <td>Fuel System Control, Electronic or Mechanical</td>
                                    <td><?php echo $row2['fuel_sys_control']; ?></td>
                                </tr>
                                <tr>
                                    <td>Fuel Injection to combustion chamber, Direct or Indirect</td>
                                    <td><?php echo $row2['fuel_injection']; ?></td>
                                </tr>
                            </table>
                            <table id='tractorDetails' class="table table-striped">
                                <tr>
                                    <th colspan="2">Emission and Exhaust Treatment</th>
                                </tr>
                                <tr>
                                    <td>Emission Level, US EPA Tier</td>
                                    <td><?php echo $row2['emission_level'];?></td>
                                </tr>
                                <tr>
                                    <td>Selective Catalytic Reduction (SCR) w/Diesel Exhaust Fluid (DEF)</td>
                                    <td><?php echo $row2['scr_w_def'];?></td>
                                </tr>
                                <tr>
                                    <td>Exhaust Gas Recirculation (EGR)</td>
                                    <td><?php echo $row2['egr'];?></td>
                                </tr>
                                <tr>
                                    <td>Cleanup Catalyst (CUC)</td>
                                    <td><?php echo $row2['cuc'];?></td>
                                </tr>
                                <tr>
                                    <td>Diesel Oxidation Catalyst (DOC)</td>
                                    <td><?php echo $row2['doc'];?></td>
                                </tr>
                                <tr>
                                    <td>Diesel Particulate Filter (DPF)</td>
                                    <td><?php echo $row2['dpf'];?></td>
                                </tr>
                                <tr>
                                    <td>Exhaust Pipe, Vertical stack or Horizontal</td>
                                    <td><?php echo $row2['exhaust_pipe'];?></td>
                                </tr>
                            </table>
                            <table id='tractorDetails' class="table table-striped">
                                <tr>
                                    <th colspan="2">Cooling System</th>
                                </tr>
                                <tr>
                                    <td>Fan Drive Type</td>
                                    <td><?php echo $row2['fan_drive_type']; ?></td>
                                </tr>
                            </table>
                            <table id='tractorDetails' class="table table-striped">
                                <tr>
                                    <th colspan="2">Electrical System</th>
                                </tr>
                                <tr>
                                    <td>System Rating, Volts</td>
                                    <td><?php echo $row2['system_rating_volts']; ?></td>
                                </tr>
                                <tr>
                                    <td>Alternator Rating, Amps</td>
                                    <td><?php echo $row2['alternator_amps']; ?></td>
                                </tr>
                            </table>
                            <table id='tractorDetails' class="table table-striped">
                                <tr>
                                    <th colspan="2">Basic Transmission Configuration</th>
                                </tr>
                                <tr>
                                    <td>Manufacturer's Description</td>
                                    <td><?php echo $row2['bt_mfr_description'] ;?></td>
                                </tr>
                                <tr>
                                    <td>Transmission Type</td>
                                    <td><?php echo $row2['bt_transmission_type'] ;?></td>
                                </tr>
                                <tr>
                                    <td>Number of Forward / Reverse Speeds</td>
                                    <td><?php echo $row2['no_of_speeds'] ;?></td>
                                </tr>
                                <tr>
                                    <td>Maximum Speed Forward, mph</td>
                                    <td><?php echo $row2['max_speed_forward_mph'] ;?></td>
                                </tr>
                                <tr>
                                    <td>Creeper Range Available</td>
                                    <td><?php echo $row2['creeper_range_available'] ;?></td>
                                </tr>
                                <tr>
                                    <td>Shuttle (Forward-Reverse) Available</td>
                                    <td><?php echo $row2['shuttle_available'] ;?></td>
                                </tr>                                
                            </table>
                            <table id='tractorDetails' class="table table-striped">
                                <tr>
                                    <th colspan="2">Optional Transmission 1</th>
                                </tr>
                                <tr>
                                    <td>Manufacturer's Description</td>
                                    <td><?php echo $row2['ot1_mfr_description']; ?></td>
                                </tr>
                                <tr>
                                    <td>Transmission Type</td>
                                    <td><?php echo $row2['ot1_transmission_type']; ?></td>
                                </tr>
                                <tr>
                                    <td>Number of Forward / Reverse Speeds</td>
                                    <td><?php echo $row2['ot1_num_of_speeds']; ?></td>
                                </tr>
                            </table>
                            <table id='tractorDetails' class="table table-striped">
                                <tr>
                                    <th colspan="2">Optional Transmission 2</th>
                                </tr>
                                <tr>
                                    <td>Manufacturer's Description</td>
                                    <td><?php echo $row2['ot2_mfr_description']; ?></td>
                                </tr>
                                <tr>
                                    <td>Transmission Type</td>
                                    <td><?php echo $row2['ot2_transmission_type']; ?></td>
                                </tr>
                                <tr>
                                    <td>Number of Forward / Reverse Speeds</td>
                                    <td><?php echo $row2['ot2_num_of_speeds']; ?></td>
                                </tr>
                            </table>
                            <table id='tractorDetails' class="table table-striped">
                                <tr>
                                    <th colspan="2">Wheel or Track Configuration</th>
                                </tr>
                                <tr>
                                    <td>Drive Wheels or Tracks; 2WD,  4WD, 2WD / 4WD, 2 Tracks or 4 Tracks</td>
                                    <td><?php echo $row2['drive_wheels']; ?></td>
                                </tr>
                                <tr>
                                    <td>Steering Configuration: Front Steer, Frame Articulated, or Track-type Steer</td>
                                    <td><?php echo $row2['steering_configuration']; ?></td>
                                </tr>
                            </table>
                            <table id='tractorDetails' class="table table-striped">
                                <tr>
                                    <th colspan="2">Rear Axle Assembly</th>
                                </tr>
                                <tr>
                                    <td>Final Drive Location and Description</td>
                                    <td><?php echo $row2['final_drive']; ?></td>
                                </tr>
                                <tr>
                                    <td>Axle Output End, Flange or Bar</td>
                                    <td><?php echo $row2['axle_output']; ?></td>
                                </tr>
                                <tr>
                                    <td>Axle Bar Diameter, in</td>
                                    <td><?php echo $row2['axle_bar_diameter_in']; ?></td>
                                </tr>
                            </table>
                            <table id='tractorDetails' class="table table-striped">
                                <tr>
                                    <th colspan="2">Front Axle</th>
                                </tr>
                                <tr>
                                    <td>Suspended Front Axle Available</td>
                                    <td><?php echo $row2['suspended_axle']; ?></td>
                                </tr>
                            </table>
                            <table id='tractorDetails' class="table table-striped">
                                <tr>
                                    <th colspan="2">Brakes</th>
                                </tr>
                                <tr>
                                    <td>Service Brake Type</td>
                                    <td><?php echo $row2['service_brake_type']; ?></td>
                                </tr>
                            </table>
                            <table id='tractorDetails' class="table table-striped">
                                <tr>
                                    <th colspan="2">Hydraulic System</th>
                                </tr>
                                <tr>
                                    <td>Hydraulic System Type</td>
                                    <td><?php echo $row2['hydraulic_sys_type']; ?></td>
                                </tr>
                                <tr>
                                    <td>Main Hydraulic Pump Type</td>
                                    <td><?php echo $row2['main_hydraulic_pump_type']; ?></td>
                                </tr>
                                <tr>
                                    <td>Implement Pump Flow, gpm</td>
                                    <td><?php echo $row2['implement_pump_flow_gpm']; ?></td>
                                </tr>
                                <tr>
                                    <td>Optional Pump Flow, gpm</td>
                                    <td><?php echo $row2['optional_pump_flow_gpm']; ?></td>
                                </tr>
                                <tr>
                                    <td>Number of Standard Remote Valves</td>
                                    <td><?php echo $row2['num_of_std_remote_valves']; ?></td>
                                </tr>
                            </table>
                            <table id='tractorDetails' class="table table-striped">
                                <tr>
                                    <th colspan="2">Drawbar</th>
                                </tr>
                                <tr>
                                    <td>Drawbar Description</td>
                                    <td><?php echo $row2['drawbar_description'];?></td>
                                </tr>
                            </table>
                            <table id='tractorDetails' class="table table-striped">
                                <tr>
                                    <th colspan="2">Wheelbase / Trackbase</th>
                                </tr>
                                <tr>
                                    <td>Wheelbase, 2WD, in</td>
                                    <td> <?php echo $row2['wheel_base_2wd'];?></td>
                                </tr>
                                <tr>
                                    <td>Wheelbase/Trackbase, MFD/4WD or Track, in</td>
                                    <td> <?php echo $row2['wheel_base_4wd'];?></td>
                                </tr>
                            </table>
                            <table id='tractorDetails' class="table table-striped">
                                <tr>
                                    <th colspan="2">3-Point Hitch Features</th>
                                </tr>
                                <tr>
                                    <td>3-Point Hitch Category</td>
                                    <td><?php echo $row2['3pt_hitch'];?></td>
                                </tr>
                                <tr>
                                    <td>Optional Hitch Category</td>
                                    <td><?php echo $row2['optional_hitch'];?></td>
                                </tr>
                                <tr>
                                    <td>Draft Sensing or Lift Control</td>
                                    <td><?php echo $row2['draft_sensing'];?></td>
                                </tr>
                                <tr>
                                    <td>Draft Link Ends Telescopic</td>
                                    <td><?php echo $row2['draft_link_ends'];?></td>
                                </tr>
                            </table>
                            <table id='tractorDetails' class="table table-striped">
                                <tr>
                                    <th colspan="2">3-Point Hitch Lift Capacity</th>
                                </tr>
                                <tr>
                                    <td>Standard Lift Capacity 24 Inches behind pin, lb</td>
                                    <td><?php echo $row2['std_lift_cap_behind_pin_lb'];?></td>
                                </tr>
                                <tr>
                                    <td>Optional Lift Capacity 24 Inches behind pin, lb</td>
                                    <td><?php echo $row2['opt_lift_cap_behind_pin_lb'];?></td>
                                </tr>
                                <tr>
                                    <td>Standard Lift Capacity at lift pin, lb</td>
                                    <td><?php echo $row2['std_lift_cap_lift_pin_lb'];?></td>
                                </tr>
                                <tr>
                                    <td>Optional Lift Capacity at lift pin, lb</td>
                                    <td><?php echo $row2['opt_lift_cap_lift_pin_lb'];?></td>
                                </tr>
                            </table>
                            <table id='tractorDetails' class="table table-striped">
                                <tr>
                                    <th colspan="2">Length</th>
                                </tr>
                                <tr>
                                    <td>Length, 2WD, incl. Hitch/Drawbar, in</td>
                                    <td><?php echo $row2['length_2wd'];?></td>
                                </tr>
                                <tr>
                                    <td>Length, MFD/4WD or track, incl. Hitch/Drawbar, in</td>
                                    <td><?php echo $row2['length_4wd'];?></td>
                                </tr>

                            </table>
                            <table id='tractorDetails' class="table table-striped">
                                <tr>
                                    <th colspan="2">Vertical Dimensions</th>
                                </tr>
                                <tr>
                                    <td>Height to Top of Cab, in</td>
                                    <td><?php echo $row2['height_top_cabs'];?></td>
                                </tr>
                                <tr>
                                    <td>Height to Top of ROPS raised, in</td>
                                    <td><?php echo $row2['height_top_rops'];?></td>
                                </tr>

                            </table>
                            <table id='tractorDetails' class="table table-striped">
                                <tr>
                                    <th colspan="2">Width w/Tires or Tracks</th>
                                </tr>
                                <tr>
                                    <td>Overall Width, with standard wheels or tracks, in</td>
                                    <td><?php echo $row2['overall_width'];?></td>
                                </tr>

                            </table>
                            <table id='tractorDetails' class="table table-striped">
                                <tr>
                                    <th colspan="2">Weight (w/Tires or Tracks)</th>
                                </tr>
                                <tr>
                                    <td>Weight, 2WD w/ROPS, lb</td>
                                    <td><?php echo $row2['weight_2wd_rops'];?></td>
                                </tr>
                                <tr>
                                    <td>Weight, MFD/4WD w/ROPS, lb</td>
                                    <td><?php echo $row2['weight_4wd_rops'];?></td>
                                </tr>
                                <tr>
                                    <td>Weight, 2WD w/Cab, lb</td>
                                    <td><?php echo $row2['weight_2wd_cabs'];?></td>
                                </tr>
                                <tr>
                                    <td>Weight, MFD/4WD or Tracks w/Cab, without ballast, lb</td>
                                    <td><?php echo $row2['weight_4wd_cabs'];?></td>
                                </tr>
                                <tr>
                                    <td>Weight, Total allowable, w/maximum ballast, lb</td>
                                    <td><?php echo $row2['weight_total'];?></td>
                                </tr>
                            </table>
                            <table id='tractorDetails' class="table table-striped">
                                <tr>
                                    <th colspan="2">Tire / Track Size</th>
                                </tr>
                                <tr>
                                    <td>Front Tire Size, 2WD</td>
                                    <td><?php echo $row2['front_tire_size_2wd'];?></td>
                                </tr>
                                <tr>
                                    <td>Front Tire Size orTrack Width, MFD/4WD or Track</td>
                                    <td><?php echo $row2['front_tire_size_4wd'];?></td>
                                </tr>
                                <tr>
                                    <td>Rear Tire Size or Track Width</td>
                                    <td><?php echo $row2['rear_tire_size'];?></td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
