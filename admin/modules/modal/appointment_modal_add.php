<form id="frm_appointment_add">
    <div class="modal-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Select Customer</label>
                    <select name="customer_id" class="form-control" required>
                        <option value=""></option>
                        <?php
                            include('../../db_connect.php');
                            $qry_appointment_customer = $conn->query("
                                    SELECT 
                                        id,
                                        first_name,
                                        last_name
                                    FROM 
                                        customers 
                                    WHERE 
                                        deleted_at IS NULL
                                    ORDER BY 
                                        first_name ASC
                                ");
                            while( $row = $qry_appointment_customer->fetch_assoc()):
                        ?> 
                            <option value="<?php echo $row['id']?>"><?php echo strtoupper($row['first_name']). ' '.strtoupper($row['last_name'])?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Appointment Date</label>
                    <input type="date" class="form-control" name="appointment_date" required placeholder="">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">From</label>
                    <input type="time" class="form-control" name="from_time" min="09:00" max="18:00"  required placeholder="">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">To</label>
                    <input type="time" class="form-control" name="to_time" min="09:00" max="18:00" required placeholder="">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Services</label>
                    <select name="services_id" class="form-control" required>
                            <option value=""></option>
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
                            <option value="<?php echo $row['id']?>"><?php echo strtoupper($row['name'])?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-12">
                <hr class="my-3">
                <button class="btn btn-success" type="submit">Add</button>
                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</form>
