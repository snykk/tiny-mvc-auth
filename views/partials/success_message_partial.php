   <!-- Alert Success  -->
   <div class="flex justify-between text-green-200 shadow-inner rounded p-3 bg-green-600 hover:opacity-90 cursor-pointer">
     <p class="self-center">
       <strong>Yeap! </strong><?= $_SESSION["message-success"] ?>
     </p>
     <strong class="text-xl align-center cursor-pointer alert-del hover:scale-150 transition-all duration-300">&times;</strong>
   </div>