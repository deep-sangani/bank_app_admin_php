<style>
    .navbar{
        position: fixed;
        width: 100%;
        
    }
    button{
        outline: none;
       
    }
</style>
<div class="navbar h-12 bg-gray-800 flex items-center justify-between">
    <div class="flex items-center">
        <h1 class="text-2xl text-teal-100 pl-4 sm:flex hidden">Deep Sangani Finence Services</h1><h1 class="flex sm:hidden text-2xl text-teal-100 pl-4">DSFS</h1>
    </div>
    <?php 
     if(isset($_SESSION["user"])){
        ?>
<div class=" mr-12 flex justify-center items-center">
            <img class="inline-block h-8 w-8 rounded-full text-white shadow-solid mr-4" src="../../assets/images/wallpapersden.com_iron-man-minimalist_1920x1080.jpg" />
            <form action="../../../app/controller/logoutController.php" class="flex justify-center items-center m-0">
             <button class="bg-blue-500 hover:bg-blue-700 text-teal-100 text-sm font-bold py-2 px-4 rounded-full focus:outline-none" type="submit" >
             Logout</button>
            </form>
           </div>

     <?php }
    ?>
        
    
</div>