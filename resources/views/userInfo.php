<?php
session_start();
if (!isset($_SESSION["user"])) {
    header('Location:/resources/views/login.php');
}


?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <?php include "./common/allLinks.php"; ?>
    <title>UserInfo - DSFS</title>
    <style>
        .home-right {
            padding-top: 20px;
            padding-left: 20px;
            margin-bottom: 50px;
            margin-top: 5rem;
            min-height: 83vh;


        }

        /* The switch - the box around the slider */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
</head>

<body>
    <?php include "./common/nevbar.php" ?>

    <?php
    if (isset($_GET["msg"])) {
        include "./model.php";
    }


    ?>
    <div class="main flex ">
        <?php include "./common/leftDeshboard.php" ?>
        <div class="home-right w-full ">

            <div class="sm:w-9/12 sm:ml-4 sm:mr-4 ">
                <div class="mt-10 sm:mt-0">

                    <div class="hidden sm:block">
                        <div class="py-5">
                            <div class="border-t border-gray-200"></div>
                        </div>
                    </div>

                    <div class="mt-10 sm:mt-0">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Check Customer's Info</h3>
                                    <p class="mt-1 text-sm leading-5 text-gray-600">
                                        Here you can Check customer's Info and Update Details
                                    </p>
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">

                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <form action="../../app/controller/userinfo.php" method="POST" id="form"><input type="hidden" name="userinfo" value="userinfo">


                                            <?php if ($_GET["userexist"] == "false") { ?>
                                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-8" role="alert">

                                                    <span class="block sm:inline">
                                                        <h1>Account is not found !!</h1>
                                                    </span>
                                                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                                    </span>
                                                </div>
                                            <?php } ?>



                                            <div class="grid grid-cols-6 gap-6 px-4 py-5">



                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="pan_card" class="block text-sm font-medium leading-5 text-gray-700">Enter 16 Digit Account No</label>
                                                    <input id="pan_card" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" name="acc_no" required>

                                                </div>

                                                <div class="col-span-6 sm:col-span-3 sm:mt-6  flex items-center justify-center">
                                                    <button class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-500 focus:outline-none transition duration-150 ease-in-out" type="submit">Check Details</button>

                                                </div>

                                            </div>
                                        </form>
                                        <br />

                                        <?php if (isset($_GET["first_name"])) { ?>
                                            <form action="../../app/controller/updateUserInfoController.php" method="POST" id="userinfo">
                                                <div class="grid grid-cols-6 gap-6 px-4 pt-12">

                                                    <div class="col-span-6 sm:col-span-6 flex justify-between items-center  mr-1">
                                                        <!-- Rounded switch -->
                                                        <label for="aadhar_card" class="block text-sm font-medium leading-5 text-gray-700">Switch Toggle to Update Info </label>

                                                        <label class="switch z-1">
                                                            <input type="checkbox" value="updatedinfo" id="toggle" name="toggle">
                                                            <span class="slider round"></span>
                                                        </label>

                                                    </div>

                                                    <div class="col-span-6 sm:col-span-6 flex justify-center items-center flex-col">
                                                        <label for="aadhar_card" class="block text-sm font-medium leading-5 text-gray-700">User Photo </label>
                                                        <div class="border border-gray-300 rounded-md shadow-sm p-4 text-4xl m-1">
                                                            <img class="inline-block h-32 w-32 rounded-md text-white shadow-solid" src="<?php echo $_GET["photo_url"]; ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="aadhar_card" class="block text-sm font-medium leading-5 text-gray-700">First Name</label>
                                                        <input id="userdetails" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" name="first_name" value="<?php echo $_GET["first_name"]; ?>" readonly required>
                                                    </div>
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="aadhar_card" class="block text-sm font-medium leading-5 text-gray-700">Last Name</label>
                                                        <input id="userdetails" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" name="last_name" required value="<?php echo $_GET["last_name"]; ?>" readonly>
                                                    </div>

                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="aadhar_card" class="block text-sm font-medium leading-5 text-gray-700">Email Address</label>
                                                        <input id="userdetails" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" name="email_add" required value="<?php echo $_GET["email_address"]; ?>" readonly>
                                                    </div>

                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="aadhar_card" class="block text-sm font-medium leading-5 text-gray-700">Street Address</label>
                                                        <input id="userdetails" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" name="street_add" required value="<?php echo $_GET["street_address"]; ?>" readonly>
                                                    </div>


                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="aadhar_card" class="block text-sm font-medium leading-5 text-gray-700">City</label>
                                                        <input id="userdetails" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" name="city" required value="<?php echo $_GET["city"]; ?>" readonly>
                                                    </div>


                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="aadhar_card" class="block text-sm font-medium leading-5 text-gray-700">Pin Code</label>
                                                        <input id="userdetails" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" name="pincode" required value="<?php echo $_GET["postal_code"]; ?>" readonly>
                                                    </div>

                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="aadhar_card" class="block text-sm font-medium leading-5 text-gray-700">State</label>
                                                        <input id="userdetails" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" name="state" required value="<?php echo $_GET["state"]; ?>" readonly>
                                                    </div>

                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="aadhar_card" class="block text-sm font-medium leading-5 text-gray-700">Account type</label>
                                                        <input id="userdetails" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" name="account_type" required value="<?php echo $_GET["account_type"]; ?>" readonly>
                                                    </div>

                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="aadhar_card" class="block text-sm font-medium leading-5 text-gray-700">Pan Card Number</label>
                                                        <input id="userdetails" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" name="pan_card" required value="<?php echo $_GET["pan_card"]; ?>" readonly>
                                                    </div>

                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="aadhar_card" class="block text-sm font-medium leading-5 text-gray-700">Mobile Number</label>
                                                        <input id="userdetails" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" name="mobile_no" required value="<?php echo $_GET["mobile_no"]; ?>" readonly>
                                                    </div>

                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="aadhar_card" class="block text-sm font-medium leading-5 text-gray-700">Aadhar Card Number</label>
                                                        <input id="userdetails" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" name="aadhar_no" required value="<?php echo $_GET["aadhar_card"]; ?>" readonly>
                                                    </div>

                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="aadhar_card" class="block text-sm font-medium leading-5 text-gray-700">Account Number</label>
                                                        <input id="userdetails" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" name="acc_no" required value="<?php echo $_GET["acc_no"]; ?>" readonly>
                                                    </div>

                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="aadhar_card" class="block text-sm font-medium leading-5 text-gray-700">Account Balance</label>
                                                        <div class="border border-gray-300 rounded-md shadow-sm p-4 text-4xl m-1">
                                                            <h1><?php echo $_GET["balance"]; ?><span class="ml-1">???</span></h1>
                                                        </div>
                                                    </div>
                                                    <div id="submit" class="col-span-6 sm:col-span-3 sm:mt-6  flex items-center justify-center hidden">
                                                        <button class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-500 focus:outline-none transition duration-150 ease-in-out" type="submit">Confirm Updated info</button>

                                                    </div>







                                                </div>
                                            </form>
                                        <?php } ?>


                                    </div>

                                </div>


                            </div>

                        </div>

                    </div>

                </div>


            </div>


        </div>



    </div>



    <script>
        const toggle = document.getElementById("toggle");
        const submit = document.getElementById("submit");
        console.log(toggle);
        const userform = document.querySelectorAll("#userdetails");
        toggle.addEventListener("change", function toggle(e) {
            if (e.target.checked) {
                console.log("on");

                userform.forEach((input) => {
                    input.removeAttribute('readonly')
                });

                submit.style.display = "flex";
            } else {
                console.log("off");
                userform.forEach((input) => {
                    input.readOnly = true;
                });

                submit.style.display = "none";

            }

        });
    </script>
</body>

</html>