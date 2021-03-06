<!DOCTYPE html>

<body>

  <div class="fixed z-10 inset-0 overflow-y-auto" id="model">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <!--
      Background overlay, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100"
        To: "opacity-0"
    -->
      <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>


      <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;


      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-center sm:justify-center">




            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
              <h3 class="text-lg leading-6 font-medium text-green-500" id="modal-headline">
                <?php echo $_GET["msg"]; ?>
              </h3>
              <h3 class="text-lg leading-6 font-medium text-gray-900 mt-4" id="modal-headline">
                <?php echo "ACCOUNT NO : " . $_GET["acc_no"]; ?>
              </h3>

            </div>

            <div class="flex overflow-hidden ml-8 ">

              <?php if ($_GET["acc_img_url"]) { ?>
                <img class="inline-block h-32 w-32 rounded-md text-white shadow-solid" src="<?php echo $_GET["acc_img_url"]; ?>" />
              <?php } ?>


            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
            <button type="button" onclick="closeDialog()" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-indigo-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-indigo-500 focus:outline-none ">
              Done
            </button>
          </span>

        </div>
      </div>
    </div>
  </div>

  <script>
    var x = document.getElementById("model");

    function closeDialog() {
      x.style.display = "none";

    }
  </script>
</body>