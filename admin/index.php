<!DOCTYPE html>
<html lang="en">

<?php include('components/header.php');?>
<link href="../ext/css/admin.css" rel="stylesheet" />

<!-- init DB connection for all the pages -->
<?php include('db_connect.php'); ?>

<?php
  if(!isset($_SESSION['login_id'])) {
    header("Location: login.php");
  } else {
    // redirect customer login
    if($_SESSION['login_type'] == 3)
    header("Location: ../index.php");
  }
?>

<body>
  <?php include('components/navsidebar.php'); ?>

<main class="content-wrapper content-main">
  <?php include('modules/dashboard.php'); ?>
  <?php include('modules/customers.php'); ?>
  <?php include('modules/appointment.php'); ?>
  <?php include('modules/feedback.php')?>
  <?php include('modules/services_offer.php'); ?>
  <?php include('modules/products_offer.php'); ?>
  <?php include('modules/users.php'); ?>
  <?php include('modules/site_settings.php'); ?>

  <?php
    $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    $num_users = [];
    foreach($months as $index => $month) {
      $m = date('Y-m', strtotime(date('Y').'-'.$index));
      $_customers = $conn->query("SELECT count(*) as total_user from customers WHERE deleted_at IS NULL AND DATE_FORMAT(created_at, '%Y-%m') = '$m' GROUP BY DATE_FORMAT(created_at, '%Y-%m');");
      $num_users[] = $_customers->num_rows > 0 ? intVal($_customers->fetch_array()[0]):0;
    }
?>
</main>

<?php include('components/modal.php');?>

</body>

<?php include('components/footer.php');?>
<script>
  if($("#booked_graph")) {
    Highcharts.chart('booked_graph', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Monthly Client Registered'
        },
        xAxis: {
            categories: <?php echo json_encode($months)?>
        },
        yAxis: {
            title: {
                text: 'Total Registered'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: 'Customers',
            data: <?php echo json_encode($num_users)?>
        }]
    });
  }
</script>
<script src="../ext/js/main.js"></script>

</html>