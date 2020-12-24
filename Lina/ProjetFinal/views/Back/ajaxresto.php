<?PHP 
include_once "../../entites/resto.php";
include_once "../../core/restoC.php";
$resto1C=new RestoC(); 

if(!isset($_POST['str'])){
    $liste=$resto1C->afficherResto();
}
foreach($liste as $row){
    ?>
       <tr>
       <td><?PHP echo $row['nom_resto'];  ?></td> 
       <td><img class="img-responsive img-thumbnail " <?PHP echo "<img src=\"images/{$row['pdp']}\">"?></td> 
       <td><img class="img-responsive img-thumbnail " <?PHP echo "<img src=\"images/{$row['image1']}\">"?></td>
       <td><img class="img-responsive img-thumbnail " <?PHP echo "<img src=\"images/{$row['image2']}\">"?></td>
       <td><img class="img-responsive img-thumbnail " <?PHP echo "<img src=\"images/{$row['image3']}\">"?></td>
       <td><img class="img-responsive img-thumbnail " <?PHP echo "<img src=\"images/{$row['menu']}\">"?></td>
       <td><?PHP echo $row['detail']; ?></td>
       <td><?PHP echo $row['specialite']; ?></td> 
       <td><form method="POST" action="supprimerEvenement.php">  
       <input class="btn btn-danger"  type="submit" title="Delete" Value="Delete" border="0" name="supprimer">
       <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id"> 
       
       </form> 
       <a href="edit-events.php?id=<?PHP echo $row['id']; ?>" class="btn btn-success" data-toggle="tooltip" title="Edit" >Edit<i class="fas fa-pencil-alt"></i></a>
       </td>
       </tr>
       <?PHP 
    
}
    ?>