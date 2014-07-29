       <div class="pied_de_page">
           <?php
		   if (isset($_SESSION['id']))
		   {
		   include("include/footer_connect.php"); 
		   }
		   else
		   include("include/footer.php"); 
		   ?>
       </div>
