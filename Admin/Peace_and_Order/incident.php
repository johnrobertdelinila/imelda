<?php 
    session_start();
    if(!ISSET($_SESSION['filter_blotter'])) {
        $_SESSION['filter_blotter'] = NULL;
    }
?>
<?php include('inc/header.php'); include_once('lib/init.php')?>
    <section class="content">
        <div class="row">
            <div class="" style="padding: 0px 15px;">
                <div class="card">
                    <div class="card-header">
                        <h5>Blotter (List of Incident) 
                            <a class="btn btn-primary btn-sm float-right" href="add_blotter.php">New Incident Report</a>
                        </h5>     

                        <br>
                        <div class="col-md-3 float-left">
                            <div class="form-group">
                                <label>Status Type</label>
                                <select class="form-control" id="filter_blotter">
                                    <option value="0" >All</option>
                                    <option value="2" <?php echo ($_SESSION['filter_blotter'] == '2' ? 'selected' : '') ?>>Settled</option>
                                    <option value="1" <?php echo ($_SESSION['filter_blotter'] == '1' ? 'selected' : '') ?>>Minutes of Hearing</option>
                                </select>
                            </div>
                        </div>
                                              
                    </div>
                    <div class="card-body">
                        <table class="table table-hover" id="blotter_table">
                            <thead>
                                <tr>
                                    <th scope="col">Incident No.</th>
                                    <th scope="col">Blotter Type</th>
                                    <th scope="col">Complainant</th>
                                    <th scope="col">Respondent/s</th>
                                    <th scope="col">Complainant Type</th>
                                    <th scope="col">Date Reported</th>
                                    <th scope="col">Date occurred</th>                                    
                                    <th scope="col" class="text-center">Status</th>
                                    <th scope="col" class="text-center">Forwarded</th>
                                    <th scope="col" class="text-center">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $results = $systems->getIncidentList($_SESSION['filter_blotter']);
                                    if($results){
                                        while($row = mysqli_fetch_assoc($results)){
                                            $date_reported = date('F d, Y h:i a', strtotime($row['date_reported']));
                                            $date = date('F d, Y', strtotime($row['date_incident']));
                                            $time = date('h:i a', strtotime($row['time_incident']));
                                            $incident_occurred = $date.' '.$time;

                                            $offenders = $systems->getOffender($row['incident_id']);
                                            $offenderName = "N/A";
                                            $offenderNames = null;
                                            if($offenders){
                                                while($offender = mysqli_fetch_assoc($offenders)){
                                                    // var_dump($offender);
                                                    if($offender['off_complainantType'] == 2 ){
                                                        $offenderNames[] = $offender['offender_name'];
                                                    }else{
                                                        $offenderDetails = $systems->getResidentDetails($offender['off_res_ID']);
                                                        $offenderNames[] = $offenderDetails[0]['res_lName'].' '.$offenderDetails[0]['res_fName'];
                                                    }
                                                }
                                                $offenderName = implode(" , ",$offenderNames);
                                            }

                                            
                                            // var_dump($offenderName);
                                            // if($row['status'] == '1'){
                                            //     $status = 'Mediated 4a';
                                            // }elseif($row['status'] == '2'){
                                            //     $status = 'Concialited 4b';
                                            // }
                                            // elseif($row['status'] == '3'){
                                            //     $status = 'Arbitrated 4a';
                                            // }
                                            // elseif($row['status'] == '4'){
                                            //     $status = 'Arbitrated 4b';
                                            // }
                                            // elseif($row['status'] == '5'){
                                            //     $status = 'Dismiss 4c';
                                            // }elseif($row['status'] == '6'){
                                            //     $status = 'Certified case 4d';
                                            // }
                                            if($row['status'] == '1'){
                                                $status = 'Minutes of Hearing';
                                            }elseif($row['status'] == '2'){
                                                $status = 'Settled';
                                            }

                                            if($row['forwarded'] == '2' || $row['forwarded'] == 2){
                                                $forwarded = 'Yes';
                                            }elseif($row['status'] == '1' || $row['forwarded'] == 1){
                                                $forwarded = 'Not yet';
                                            }

                                            if($row['blotterType_id'] == 2){
                                                $blotterType = 'Incident';
                                            }else{
                                                $blotterType = 'Complaint';
                                            }
                                            if($row['complainantType_ID'] == 2 ){
                                                // outsider
                                                echo    '<tr>
                                                            <td>#'.$row['incident_id'].'</td>
                                                            <td>'.$blotterType.'</td>
                                                            <td>'.$row['name'].'</td>
                                                            <td>'.$offenderName.'</td>
                                                            <td>Non Resident</td>
                                                            <td>'.$date_reported.'</td>
                                                            <td>'.$incident_occurred.'</td>
                                                            
                                                            <td class="text-center">'.$status.'</td>
                                                            <td class="text-center">'.$forwarded.'</td>
                                                            <td class="text-center">
                                                                <a style="margin-bottom: 10px;" class="'. ($status == "Settled" ? "isDisabled" : "") .' btn btn-sm btn-primary" href="new_person.php?case='.$row['incident_id'].'"><i class="'. ($status == "Settled" ? "ti-unlink" : "ti-plus") .'"></i>     New Person Involve</a>
                                                                <a style="margin-bottom: 10px;" class="btn btn-sm btn-primary" href="involve_person.php?case='.$row['incident_id'].'"><i class="ti-eye"></i>     View Person Involves</a>
                                                                <a style="margin-bottom: 10px;" href="update_incident.php?edit='.$row['incident_id'].'" class="'. ($status == "Settled" ? "isDisabled" : "") .' btn-warning btn btn-sm primary-action"><i class="'. ($status == "Settled" ? "ti-unlink" : "ti-pencil-alt") .'"></i>    Edit</a>
                                                                <a style="margin-bottom: 10px;" class="btn btn-sm btn-success" href="print_incident.php?print='.$row['incident_id'].'"><i class="ti-printer"></i>     Print</a>
                                                            </td>
                                                        </tr>
                                                        ';
                                            }else if($row['complainantType_ID'] == 1 ){
                                                // insider
                                                $res = $systems->getResidentDetails($row['res_ID']);
                                                // if($row['status'] == '1'){
                                                //     $status = 'Mediated 4a';
                                                // }elseif($row['status'] == '2'){
                                                //     $status = 'Concialited 4b';
                                                // }
                                                // elseif($row['status'] == '3'){
                                                //     $status = 'Arbitrated 4a';
                                                // }
                                                // elseif($row['status'] == '4'){
                                                //     $status = 'Arbitrated 4b';
                                                // }
                                                // elseif($row['status'] == '5'){
                                                //     $status = 'Dismiss 4c';
                                                // }elseif($row['status'] == '6'){
                                                //     $status = 'Certified case 4d';
                                                // }
                                                if($row['status'] == '1'){
                                                    $status = 'Minutes of Hearing';
                                                }elseif($row['status'] == '2'){
                                                    $status = 'Settled';
                                                }

                                                if($row['forwarded'] == '2' || $row['forwarded'] == 2){
                                                    $forwarded = 'Yes';
                                                }elseif($row['status'] == '1' || $row['forwarded'] == 1){
                                                    $forwarded = 'Not yet';
                                                }
                                                
                                                echo    '<tr>
                                                            <td>#'.$row['incident_id'].'</td>
                                                            <td>'.$blotterType.'</td>
                                                            <td>'.$res[0]['res_fName'].' '.$res[0]['res_lName'].','.$res[0]['res_mName'].'</td>
                                                            <td>'.$offenderName.'</td>
                                                            <td>Resident</td>
                                                            <td>'.$date_reported.'</td>
                                                            <td>'.$incident_occurred.'</td>
                                                            <td class="text-center">'.$status.'</td>
                                                            <td class="text-center">'.$forwarded.'</td>
                                                            <td class="text-center">
                                                                <a style="margin-bottom: 10px;"  class="'. ($status == "Settled" ? "isDisabled" : "") .' btn btn-sm btn-primary" href="new_person.php?case='.$row['incident_id'].'"><i class="'. ($status == "Settled" ? "ti-unlink" : "ti-plus") .'"></i>     New Person Involve</a>
                                                                <a style="margin-bottom: 10px;" class="btn btn-sm btn-primary" href="involve_person.php?case='.$row['incident_id'].'"><i class="ti-eye"></i>     View Persons Involve</a>
                                                                <a style="margin-bottom: 10px;" href="update_incident.php?edit='.$row['incident_id'].'" class="'. ($status == "Settled" ? "isDisabled" : "") .' btn-warning btn btn-sm primary-action"><i class="'. ($status == "Settled" ? "ti-unlink" : "ti-pencil-alt") .'"></i>    Edit</a>
                                                                <a style="margin-bottom: 10px;" class="btn btn-sm btn-success" href="print_incident.php?print='.$row['incident_id'].'"><i class="ti-printer"></i>     Print</a>
                                                                    
                                                            </td>
                                                        </tr>
                                                        ';
                                            }
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
    
<?php include('inc/footer.php');?>
<script>
    $(document).ready(() => {
        $('#filter_blotter').change((e) => {
            const val = $(e.currentTarget).val();
            $.ajax({
                url: 'set_session.php',
                method: 'POST',
                data: {val: val},
                success: (data) => {window.open('incident.php', 'FraDisplay');}
            })
        });
    });
</script>