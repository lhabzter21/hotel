<?php 
    if(isset($_GET['id'])){
        include('../../db_connect.php');
        $id = $_GET['id'];
        $qry = $conn->query("
            SELECT 
                c.id as checked_id,
                c.ref_no,
                c.contact_no,
                c.room_id,
                c.date_in,
                c.date_out,
                c.name as checked_in_name,
                rc.name as room_name,
                rc.price,
                rc.id as room_cat_id
            FROM 
                checked as c 
            INNER JOIN 
                room_categories as rc 
            ON 
                c.booked_cid = rc.id
            WHERE 
                c.status = 0 
            AND 
                c.id = ".$id
        );
        if($qry->num_rows > 0){
            foreach($qry->fetch_array() as $k => $v){
                $meta[$k]=$v;
            }
        }

        $calc_days = abs(strtotime($meta['date_out']) - strtotime($meta['date_in'])) ; 
        $calc_days =floor($calc_days / (60*60*24)  );

        $rooms = $conn->query("
            SELECT 
                * 
            FROM 
                rooms 
            WHERE 
                status = 0 
            OR 
                id = ".$meta['room_id']."
            ORDER BY id ASC
        ");
    }

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="">Reference No.</label>
                <input type="text" class="form-control" name="" id="" value="<?php echo $meta['ref_no']?>" disabled>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="">Room Price (Php)</label>
                <input type="text" class="form-control" name="" id="" value="<?php echo $meta['price']?>" disabled>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="">Check In Date/Time</label>
                <input type="text" class="form-control" name="" id="" value="<?php echo date("M d, Y h:i A",strtotime($meta['date_in'])) ?>" disabled>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="">Check Out Date/Time</label>
                <input type="text" class="form-control" name="" id="" value="<?php echo date("M d, Y h:i A",strtotime($meta['date_out'])) ?>" disabled>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="">Amount (Price * Days)</label>
                <input type="text" class="form-control" name="" id="" value="<?php echo number_format($meta['price'] * $calc_days ,2) ?>" disabled>
            </div>
        </div>

        <div class="col-sm-12">
            <hr class="my-4"/>
        </div>

        <form id="frm_booked" style="width: 100%;">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="hidden" name="rid" value="<?php echo $meta['room_id'];?>">

            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Room</label>
                    <select name="" class="form-control">
                        <?php while($row = $rooms->fetch_assoc()): ?>
                            <option value="<?php echo $row['id'] ?>" <?php echo $row['id'] == $meta['room_id'] ? "selected": '' ?> >
                                <?php echo $row['room']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>
        
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Checked In</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $meta['checked_in_name']?>">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Contact No.</label>
                    <input type="text" class="form-control" name="contact" id="contact" value="<?php echo $meta['contact_no']?>">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="date_in">Check-in Date</label>
                    <input type="date" name="date_in" id="date_in" class="form-control" value="<?php echo isset($meta['date_in']) ? date("Y-m-d",strtotime($meta['date_in'])): date("Y-m-d") ?>" required>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="date_in_time">Check-in Time</label>
                    <input type="time" name="date_in_time" id="date_in_time" class="form-control" value="<?php echo isset($meta['date_in']) ? date("H:i",strtotime($meta['date_in'])): date("H:i") ?>" required>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Days of Stay</label>
                    <input type="number" min="1" class="form-control" name="days" id="days" value="<?php echo isset($meta['date_in']) ? $calc_days: 1 ?>">
                </div>
            </div>
        </form>
        <div class="col-sm-12">
            <hr class="my-4"/>
            <button class="btn btn-primary btn-block" id="btn_booked_update">Update</button>
            <button class="btn btn-primary btn-block" id="btn_booked_checkout" data-id1="<?php echo $id;?>" data-id2="<?php echo $meta['room_id'];?>">Check Out</button>
        </div>
    </div>
</div>
