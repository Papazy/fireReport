<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>OFMS | Reporting</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
  <!-- Responsive navbar-->
  <?php include_once(__DIR__ . '/../components/header.php') ?>
  <!-- Page Content-->
  <div class="container px-4 px-lg-5">
    <!-- Heading Row-->

    <!-- Content Row-->
    <div class="row gx-4 gx-lg-5">
      <div class="col-md-12 mb-5">
        <div class="card h-100">
          <div class="card-body">


            <h2 class="card-title">Search Result Againt '<?php echo $searchdata; ?>'</h2>



            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Name</th>
                  <th>Mobile Number</th>
                  <th>Location </th>
                  <th>Message</th>
                  <th>Reporting Time</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Name</th>
                  <th>Mobile Number</th>
                  <th>Location </th>
                  <th>Message</th>
                  <th>Reporting Time</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                $cnt = 1;
                foreach ($data as $row) {
                ?>


                  <tr>
                    <td><?php echo $cnt; ?></td>
                    <td><?php echo $row['fullName']; ?></td>
                    <td><?php echo $row['mobileNumber']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td><?php echo $row['message']; ?></td>
                    <td><?php echo $row['postingDate']; ?></td>
                    <td>

                      <a href="details/<?php echo $row['id']; ?>" class="btn-sm btn-primary">View</a>

                    </td>
                  </tr>
                <?php $cnt++;
                } ?>
              </tbody>
            </table>

          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- Footer-->
  <?php include_once(__DIR__ . '/../components/footer.php') ?>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="public/js/scripts.js"></script>
</body>

</html>