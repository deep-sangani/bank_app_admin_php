<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <?php include "./common/allLinks.php"; ?>
    <title>Login | Employee</title>
    <style>
        .container {
            height: 100vh;


        }
    </style>

</head>

<body>
    <script type="text/javascript">
        function inputValidate(form) {
            console.log("deep");
            log(form)
        }
    </script>
    <?php



    // $query = "select * from emp";
    // $result = $conn->query($query);
    // while($row = $result->fetch_assoc()){
    //     echo $row["empid"];

    // }

    ?>
    <?php include "./common/nevbar.php"; ?>

    <!--       form-->
    <div class="container mx-auto flex items-center justify-center ">
        <div class="left hidden lg:flex">
            <img height="60%" width="70%" src="./img/login.svg" />
        </div>
        <div class="right">



            <?php
            if (isset($_GET['err'])) {

            ?>

                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-8" role="alert" id="alartbox">
                    <strong class="font-bold" id="alartmsg"><?php echo $_GET['err']; ?></strong>
                    <span class="block sm:inline"></span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    </span>
                </div>

            <?php } ?>






            <div class="w-full max-w-xs ">
                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" id="submitform" onsubmit="return inputValidate(this);" method="POST" action="/app/controller/loginController.php">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                            Empolyee Id
                        </label>
                        <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Emp Id" name="empid">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Password
                        </label>
                        <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************" name="pass">

                    </div>
                    <div class="flex items-center justify-between">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" id="submitbtn">
                            Sign In
                        </button>

                    </div>
                </form>
                <p class="text-center text-gray-500 text-xs">
                    &copy;2021 Deep Sangani. All rights reserved.
                </p>
            </div>
        </div>
    </div>
    <script src="../js/login.js"></script>
</body>

</html>