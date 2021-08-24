<!-- WHY CHOOSE US START -->
<div class="mt-2 w-75 mx-auto p-2" style="width: 90%;">
    <div class="text-center mt-2">
      <h3>WHY CHOOSE US</h3>
        <?php horizontalline();?>
    </div>
    <div class="whyChooseUs">
   <div class="row mt-2">  
     <?php
          $query = "SELECT * FROM home WHERE type = 'WCU' and id_status = 'active' ORDER BY serial_number ASC LIMIT 8"; 
          $stat = $pdo_conn->prepare($query);
          $stat->execute();
          $rowCountWCU = $stat->rowCount();
          $WCU = '';

          if ($rowCountWCU > 0) {
            foreach ($stat->fetchAll() as $row) {
             $title = $row['title'];
            $WCU .= ' 
            <div class="col-sm-3 academicBuilding">
               <img src="admin/Files/WebContentsFiles/'.$row['file'].'" class="view" data-id='.$row['id'].'>
               <p class="text-center">'.$row['title'].'</p>           
           </div> 

            ';
            }
          }else{
            echo "There is no Record!";
          }
         echo $WCU;
      ?>
       </div>
</div>
</div> 
        <div class="modal fade" id="view_modal">
          <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
            
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Information</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              
              <!-- Modal body -->
              <div class="modal-body modalImg">
                  <div id="view_data_modal"></div>
              </div>
              
              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
              
            </div>
          </div>
        </div> 
<script type="text/javascript">
 $(document).ready(function(){
          $('.view').click(function(){
              var id = $(this).data('id');
              $.ajax({
                  url: 'wcuView.php',
                  type: 'post',
                  data: {id: id},
                  success: function(data){ 
                      $('#view_modal').modal('show'); 
                      $('#view_data_modal').html(data);      
                  }
              });
          });
        });
</script>
<!-- WHY CHOOSE US END -->