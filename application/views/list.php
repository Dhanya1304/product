<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Product details </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
</head>
<body>

   
    <div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="savedata" enctype="multipart/form-data">
                <div id="formdetails">
                    <div class="modal-body">
                        <div class="form-group">
                            <label> Product Name </label>
                            <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name">
                        </div>

                        <div class="form-group">
                            <label> Price </label>
                            <input type="text" name="product_price" class="form-control" placeholder="Enter Price">
                        </div>

                        <div class="form-group">
                            <label> Description </label>
                            <input type="text" name="product_description" class="form-control" placeholder="Enter Description">
                        </div>

                        <div class="form-group">
                            <label> Image </label>
                            <input type='file' name='files' id="files" multiple \> 
                        </div>
                    <div id="uploaded_images"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="insertdata" id="insertdata" class="btn btn-primary">Save Data</button>
                    </div>
                </div>
                </form>

            </div>
        </div>
    </div>

    
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Product </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="editdata" enctype="multipart/form-data">
    <div id="datasubmit">
                <div class="modal-body">
                        <div class="form-group">
                            <label> Product Name </label>
                            <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name">
                        </div>

                        <div class="form-group">
                            <label> Price </label>
                            <input type="text" name="product_price" class="form-control" placeholder="Enter Price">
                        </div>

                        <div class="form-group">
                            <label> Description </label>
                            <input type="text" name="product_description" class="form-control" placeholder="Enter Description">
                        </div>

                        <div class="form-group">
                            <label> Image </label>
                            <input type='file' name='files' id="files" multiple \> 
                        </div>
                    <div id="uploaded_images"></div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                    </div>
</div>
                </form>

            </div>
        </div>
    </div>

   
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Delete Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="deleteform.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="delete_id" id="delete_id">

                        <h4> Do you want to Delete this Data ??</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                        <button type="submit" name="deletedata" class="btn btn-primary"> Yes !! Delete it. </button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    
    <div class="container">
        <div class="jumbotron">
            <div class="card">
                <h2>Product Listing </h2>
            </div>
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addmodal">
                        ADD Product
                    </button>
                </div>
            </div>

            <div class="card">
                <div class="card-body">

                   
                    <table id="datatableid" class="table table-bordered table-dark">
                        <thead>
                            <tr>
                                <th scope="col"> ID</th>
                                <th scope="col"> Product Name</th>
                                <th scope="col"> Price </th>
                                <th scope="col"> Description </th>
                                <th scope="col"> EDIT </th>
                                <th scope="col"> DELETE </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($product->result() as $row)  
                                    {  
                                        ?>
                            <tr>
                                <td><?php echo $row->id;?>  </td>
                                <td><?php echo $row->product_name;?> </td>
                                <td><?php echo $row->product_price;?>  </td>
                                <td> <?php echo $row->product_description;?> </td>
                                <td>
                                    <button type="button" class="btn btn-success"  onclick="editbutton('{$row->id}')"> EDIT </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger" onclick="deletebutton('{$row->id}')"> DELETE </button>
                                </td>
                            </tr><?php }  
                                ?> 
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

   


    <script>
        $(document).ready(function () {

         
            $('#savedata').submit('click',function(){
             var data = $('#formdetails').find(':input').serializeArray();
             $.ajax({
                     url : "<?php echo base_url();?>Product/create",
                     method : "POST",
                     data : data,
                     success:function(data)
                     {
    
                     }
                 });
    
         });
         $('#editdata').submit('click',function(){
             var data = $('#datasubmit').find(':input').serializeArray();
             $.ajax({
                     url : "<?php echo base_url();?>Product/create",
                     method : "POST",
                     data : data,
                     success:function(data)
                     {
    
                     }
                 });
    
         });
        });
    </script>

    <script>
          
    function deletebutton(id=''){
		if(id!=''){
			if(confirm('Are you sure want to delete this data?')){
				var data = {id: id, status: '0'};
				$.ajax({
					url: '<?php echo base_url('Product/delete'); ?>',
					data: data,
					type: 'POST',
					success: (res)=>{
						if(res.status){
							datatableid.ajax.reload();
						}else{
							alertify.alert('Failed','Unable to delete data.');
						}
					},
					error: ()=>{
						alertify.alert('Failed','Something went wrong.')
					}
				});
			}
		}else{
			alertify.alert('Failed','Please enter a valid data.');
		}
    }
    function editbutton($id){
				var data = $id;
				$.ajax({
					url: '<?php echo base_url('Product/edit'); ?>',
					data: data,
					type: 'POST',
					success: (res)=>{
						if(res.status){
                            $('#editmodal').modal('show');
						}
					},
					
				});
			}
    </script>


</body>
</html>