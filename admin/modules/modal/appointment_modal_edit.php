<?php
    include('../../db_connect.php');
    $appointment_details = $conn->query("SELECT * from appointments WHERE id = ".$_GET['appointment_id']);
    if($appointment_details->num_rows > 0){
        foreach($appointment_details->fetch_array() as $k => $val){
            $meta[$k] = $val;
        }
    }
?>
<form id="frm_appointment_edit">
    <div class="modal-body">
        <input type="hidden" name="id" id="appointment_id" value="<?php echo $meta['id'] ?>">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Select Customer</label>
                    <select name="customer_id" id="appointment_customer_id" class="form-control" required>
                        <option value=""></option>
                        <?php
                            $qry_appointment_customer = $conn->query("
                                    SELECT 
                                        id,
                                        first_name,
                                        last_name
                                    FROM 
                                        customers 
                                    ORDER BY 
                                        first_name ASC
                                ");
                            while( $row = $qry_appointment_customer->fetch_assoc()):
                        ?> 
                            <option value="<?php echo $row['id']?>" <?php echo $meta['customer_id'] == $row['id'] ? 'selected':'' ?>><?php echo strtoupper($row['first_name']). ' '.strtoupper($row['last_name'])?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Appointment Date</label>
                    <input type="date" class="form-control" name="appointment_date" id="appointment_date" value="<?php echo $meta['appointment_date'] ?>" required placeholder="">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">From</label>
                    <input type="time" class="form-control" name="from_time" id="appointment_time1" value="<?php echo $meta['from_time'] ?>" required placeholder="">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">To</label>
                    <input type="time" class="form-control" name="to_time" id="appointment_time2" value="<?php echo $meta['to_time'] ?>" required placeholder="">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Services</label>
                    <select name="services_id" id="appointment_services" class="form-control" required>
                        <?php
                            $qry_appointment_services = $conn->query("
                                    SELECT 
                                        *
                                    FROM 
                                        services 
                                    ORDER BY 
                                        name ASC
                                ");
                            while( $row = $qry_appointment_services->fetch_assoc()):
                        ?> 
                            <option value="<?php echo $row['id']?>" <?php echo $meta['services_id'] == $row['id'] ? 'selected':'' ?> ><?php echo strtoupper($row['name'])?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Status</label>
                    <select class="form-control" name="status" id="appointment_status">
                        <option value="0" <?php echo $meta['status'] == '0' ? 'selected':'' ?>>Pending</option>
                        <option value="1" <?php echo $meta['status'] == '1' ? 'selected':'' ?>>On going</option>
                        <option value="2" <?php echo $meta['status'] == '2' ? 'selected':'' ?>>Done</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-12">
                <hr class="my-3">
                <button class="btn btn-success" type="submit">Update</button>
                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</form>
