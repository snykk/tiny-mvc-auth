  <!-- Alert Danger  -->
  <div class="flex justify-between text-orange-200 shadow-inner rounded p-3 bg-orange-600 hover:opacity-90 cursor-pointer">
    <p class="self-center"><strong>Nopee! </strong><?= $_SESSION["not-authenticated"] ?></p>
    <strong class="text-xl align-center cursor-pointer alert-del hover:scale-150 transition-all duration-300">&times;</strong>
  </div>