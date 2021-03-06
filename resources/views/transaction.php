<?php
session_start();
if (!isset($_SESSION["user"])) {
  header('Location:/resources/views/login.php');
}


?>

<!DOCTYPE html>

<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <?php include "./common/allLinks.php"; ?>
  <title>Transaction - DSFS</title>
  <style>
    .home-right {
      padding-top: 20px;
      padding-left: 20px;
      margin-bottom: 50px;
      margin-top: 5rem;
      min-height: 80vh;
      width: 90%;


    }

    .table-width {
      width: fit-content;
      margin: 10px auto;
    }
  </style>
</head>
<script src="../js//transaction.js"></script>

<body>





  <?php include "./common/nevbar.php" ?>
  <div class="main flex ">
    <?php include "./common/leftDeshboard.php" ?>
    <div class="home-right w-4/5 ">
      <div class="flex flex-col">
        <div class="-my-2 table-width overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <table class="min-w-full divide-y divide-gray-200 text-center " id="trans_table">
                <thead>
                  <tr class="text-center">
                    <th class="px-6 py-3 bg-gray-50  text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                      Date
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                      Account Number
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                      Deposit
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                      Withdraw
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                      Particulers
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                      Balance
                    </th>
                    <th class="px-6 py-3 bg-gray-50"></th>
                  </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200" id="trans_table_body">

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>






    </div>



  </div>



</body>

</html>