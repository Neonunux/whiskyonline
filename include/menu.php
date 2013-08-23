       <div class="menu">        
           <div class="element_menu">
               <h3>Plan du site</h3>
               <ul>
                   <li><a href="index.php">Liste des whisky</a></li>
				   <li><a href="fiche.php">Fiche</a></li>
                   <?php if (isset($_SESSION['id']))
                   {
					   echo '<li><a href="administration.php">Administration</a></li>';
					   echo '<li><a href="deconnexion.php">Déconnexion</a></li>';
				   }
				   else
						echo '<li><a href="connexion.php">Se connecter</a></li>';
				   ?>
               </ul>
           </div>    
       </div>
