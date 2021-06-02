<div class="container">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-12">
            <div class="col-md-12">
                <h1>My Contacts
                    <!-- <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New</a></div> -->
                    <div style="float:right;font-size:15px;"><a href="<?php echo base_url(); ?>index.php/LoginController/logout"><i class="fa fa-fw fa-power-off"></i> Logout</a></div>
                </h1>
               
                <!-- <div class="panel panel-default">
                  <div class="panel-body">

                  <div class="row">
                      <div class="col-sm-1">
                        <a href='<?php echo base_url() ?>export_csv'>Export</a><br>
                      </div>
                     
                      <div class="col-sm-1">
                      <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New</a>
                      </div>
                      <div class="col-sm-8"></div>

                      <div class="col-sm-2">
                          <form method="post" id="import_csv" enctype="multipart/form-data">
                              <div class="form-group">
                                <label>Select CSV File</label>
                                <input type="file" name="csv_file" id="csv_file" required accept=".csv" />
                              </div>
                              <br />
                              <button type="submit" name="import_csv" class="btn btn-info" id="import_csv_btn">Import CSV</button>
                          </form>
                      </div>
                  </div>
                     
                  </div>
                </div>  -->

                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapse1">View More Options</a>
                      </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse">
                      <div class="panel-body">
                      <div class="row">
                      <div class="col-sm-1">
                        <a href='<?php echo base_url() ?>export_csv'>Export</a><br>
                      </div>
                     
                      <div class="col-sm-1">
                      <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New</a>
                      </div>
                      <div class="col-sm-8"></div>

                      <div class="col-sm-2">
                          <form method="post" id="import_csv" enctype="multipart/form-data">
                              <div class="form-group">
                                <label>Select CSV File</label>
                                <input type="file" name="csv_file" id="csv_file" required accept=".csv" />
                              </div>
                              <br />
                              <button type="submit" name="import_csv" class="btn btn-info" id="import_csv_btn">Import CSV</button>
                          </form>
                      </div>
                  </div>
                      </div>
                    
                    </div>
                  </div>
               </div> 

            </div>
             
            <table class="table table-striped" id="mydata">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Nick Name</th>
                        <th>Company</th>
                        <th>Status</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody id="show_data">
                     
                </tbody>
            </table>
        </div>
    </div>

    <form>

                

            <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">

                  <div id="responseDivsave" class="alert text-center" style="margin-top:20px; display:none;">
                    <button type="button" class="close" id="clearMsgsave"><span aria-hidden="true">&times;</span></button>
                    <span id="message"></span>
                  </div>

                    <h5 class="modal-title" id="exampleModalLabel">Add New Contact</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">First name</label>
                            <div class="col-md-10">
                              <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Last Name</label>
                            <div class="col-md-10">
                              <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Email</label>
                            <div class="col-md-10">
                              <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                      
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Phone Number</label>
                            <div class="col-md-10">
                              <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Phone Number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Company</label>
                            <div class="col-md-10">
                              <input type="email" name="company" id="company" class="form-control" placeholder="Company">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Nickname</label>
                            <div class="col-md-10">
                              <input type="text" name="nickname" id="nickname" class="form-control" placeholder="Nickname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Address</label>
                            <div class="col-md-10">
                            <textarea class="form-control" rows="3" id="address" name="address" placeholder='Enter Address'></textarea>
                            </div>
                        </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_save" class="btn btn-primary">Save</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL ADD-->

        <!--MODAL DELETE-->
        <form>
            <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Contact</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       <strong>Are you sure to delete this record?</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="product_code_delete" id="product_code_delete" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                  </div>
                </div>
              </div>
            </div>
        </form>

         <!-- MODAL EDIT -->
        <form>

            <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">

                  <div id="responseDiv" class="alert text-center" style="margin-top:20px; display:none;">
                    <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
                    <span id="message"></span>
                  </div>

                    <h5 class="modal-title" id="exampleModalLabel">Edit Contact</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                         <div class="form-group row">
                            <label class="col-md-2 col-form-label">First name</label>
                            <div class="col-md-10">
                              <input type="text" name="fname_edit" id="fname_edit" class="form-control" placeholder="First Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Last Name</label>
                            <div class="col-md-10">
                              <input type="text" name="lname_edit" id="lname_edit" class="form-control" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Email</label>
                            <div class="col-md-10">
                              <input type="text" name="email_edit" id="email_edit" class="form-control" placeholder="Email">
                            </div>
                        </div>
                      
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Phone Number</label>
                            <div class="col-md-10">
                              <input type="text" name="phone_edit" id="phone_edit" class="form-control" placeholder="Enter Phone Number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Company</label>
                            <div class="col-md-10">
                              <input type="email" name="company_edit" id="company_edit" class="form-control" placeholder="Company">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Nickname</label>
                            <div class="col-md-10">
                              <input type="text" name="nickname_edit" id="nickname_edit" class="form-control" placeholder="Nickname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Address</label>
                            <div class="col-md-10">
                            <textarea class="form-control" rows="3" id="address_edit" name="address_edit" placeholder='Enter Address'></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="id_edit" id="id_edit" />
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL EDIT--> 
</div>
<!-- <script src="<?php echo base_url(); ?>assets/js/contact.js"></script> -->

 <script type="text/javascript">
    $(document).ready(function(){
        show_contacts(); //call function show all contacts(); //call function show all contacts

        //function show all product
        function show_contacts(){
            $.ajax({
                url   : 'contact_fetch',
                async : true,
                dataType : 'json',
                cache: false,
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].ct_fname+'</td>'+
                                '<td>'+data[i].ct_lname+'</td>'+
                                '<td>'+`${data[i].ct_email==null?'-':data[i].ct_email}`+'</td>'+
                                '<td>'+`${data[i].ct_phone_num==null?'--':data[i].ct_phone_num}`+'</td>'+
                                '<td>'+`${data[i].ct_address==null?'--':data[i].ct_address}`+'</td>'+
                                '<td>'+`${data[i].ct_nickname==null?'--':data[i].ct_nickname}`+'</td>'+
                                '<td>'+`${data[i].ct_company==null?'--':data[i].ct_company}`+'</td>'+
                                '<td>'+`${data[i].ct_status==1?'Active':'Inactive'}`+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-link btn-sm item_edit" data-ct_id="'+data[i].ct_id+'" data-ct_fname="'+data[i].ct_fname+'" data-ct_lname="'+data[i].ct_lname+'" data-ct_email="'+data[i].ct_email+'"  data-ct_phone_num="'+data[i].ct_phone_num+'" data-ct_address="'+data[i].ct_address+'" data-ct_nickname="'+data[i].ct_nickname+'" data-ct_company="'+data[i].ct_company+'"  data-ct_status="'+data[i].ct_status+'" ><i class="fa fa-edit" aria-hidden="true"></i></a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-link btn-sm item_delete" data-ct_id="'+data[i].ct_id+'"><i class="fa fa-trash" aria-hidden="true"></i></a>'+
                                    // '<a href="javascript:void(0);" class="btn btn-success btn-sm item_show" data-ct_id="'+data[i].ct_id+'">Show</a>'+
                                    '<a href="'+"<?php echo base_url()?>"+'share_link/'+data[i].ct_id+'" class="btn btn-link item_view tooltip_cust" style="padding:6px 3px"  target="_blank"><i class="fa fa-share" aria-hidden="true"></i></a>'+'<br />'+

                                '</td>'+
                                '</tr>';
                    }
                    $('#show_data').empty();
                    $('#show_data').append(html);
                    // $('#mydata').DataTable({

                    //   'columnDefs' : [  
                    //       { 
                    //         'searchable'    : true, 
                    //         'targets'       : [0,2,3] 
                    //       },
                    //   ]
                    // });  

                    $('#mydata').DataTable();  
                }
 
            });
        }

         //Save contact
         $('#btn_save').on('click',function(){
            var fname = $('#fname').val();
            var lname = $('#lname').val();
            var email        = $('#email').val();
            var address = $('#address').val();
            var phone = $('#phone').val();
            var company        = $('#company').val();
            var nickname = $('#nickname').val();

            $.ajax({
                type : "POST",
                url  : "contact_save",
                dataType : "JSON",
                data : {ct_fname:fname , ct_lname:lname, ct_email:email, ct_address:address , ct_phone_num:phone, ct_company:company, ct_nickname:nickname},
                success: function(response){

                    if(response.error){
                        $('#responseDivsave').removeClass('alert-success').addClass('alert-danger').show();
                        $('#responseDivsave').append(response.error);
						
                    }
                    else{

                        $('[name="fname"]').val("");
                        $('[name="lname"]').val("");
                        $('[name="email"]').val("");
                        $('[name="address"]').val("");
                        $('[name="phone"]').val("");
                        $('[name="company"]').val("");
                        $('[name="nickname"]').val("");
                        $('#responseDivsave').removeClass('alert-danger').addClass('alert-success').show();
                        $('#responseDivsave').append(response.message);

                        $('#Modal_Add').modal('hide');
                        show_contacts();
                    }
                }
            });
            return false;
        });

         //get data for delete record
         $('#show_data').on('click','.item_delete',function(){
            var product_code = $(this).data('ct_id');
             
            $('#Modal_Delete').modal('show');
            $('[name="product_code_delete"]').val(product_code);
        });
 
        //delete record to database
         $('#btn_delete').on('click',function(){
            var id = $('#product_code_delete').val();
            $.ajax({
                type : "POST",
                url  : "contact_delete",
                dataType : "JSON",
                data : {ct_id:id},
                success: function(data){
                    $('[name="product_code_delete"]').val("");
                    $('#Modal_Delete').modal('hide');
                    show_contacts();
                }
            });
            return false;
        });

        //get data for update record
        $('#show_data').on('click','.item_edit',function(){
            var fname =  $(this).data('ct_fname');
            var lname =  $(this).data('ct_lname');
            var email        =  $(this).data('ct_email');
            var address =  $(this).data('ct_address');
            var phone = $(this).data('ct_phone_num');
            var company        =  $(this).data('ct_company');
            var nickname =  $(this).data('ct_nickname');
            var id =  $(this).data('ct_id');

            $('#Modal_Edit').modal('show');
            $('[name="fname_edit"]').val(fname);
            $('[name="lname_edit"]').val(lname);
            $('[name="email_edit"]').val(email);
            $('[name="address_edit"]').val(address);
            $('[name="phone_edit"]').val(phone);
            $('[name="company_edit"]').val(company);
            $('[name="nickname_edit"]').val(nickname);
            $('[name="id_edit"]').val(id);

        });
 
        //update record to database
         $('#btn_update').on('click',function(){
            var fname = $('#fname_edit').val();
            var lname = $('#lname_edit').val();
            var email        = $('#email_edit').val();
            var address = $('#address_edit').val();
            var phone = $('#phone_edit').val();
            var company        = $('#company_edit').val();
            var nickname = $('#nickname_edit').val();
            var id = $('#id_edit').val();

            $.ajax({
                type : "POST",
                url  : "contact_update",
                dataType : "JSON",
                data : {ct_fname:fname , ct_lname:lname, ct_email:email, ct_address:address , ct_phone_num:phone, ct_company:company, ct_nickname:nickname, ct_id:id},
                success: function(response){

                    if(response.error){
                        $('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
                        $('#responseDiv').append(response.error);
						
                    }
                    else{
                    $('[name="fname_edit"]').val("");
                    $('[name="lname_edit"]').val("");
                    $('[name="email_edit"]').val("");
                    $('[name="address_edit"]').val("");
                    $('[name="phone_edit"]').val("");
                    $('[name="company_edit"]').val("");
                    $('[name="nickname_edit"]').val("");
                    $('[name="id_edit"]').val("");
                    $('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
                    $('#responseDiv').append(response.message);

                    $('#Modal_Edit').modal('hide');
                    show_contacts();
                  }
                }
            });
            return false;
        });

        $(document).on('click', '#clearMsg', function(){
			$('#responseDiv').hide();
		});
        $(document).on('click', '#clearMsgsave', function(){
			$('#responseDivsave').hide();
		});
 

    $('#import_csv').on('submit', function(event){
      event.preventDefault();
      $.ajax({
      url:"import_csv",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      beforeSend:function(){
        $('#import_csv_btn').html('Importing...');
      },
      success:function(data)
      {
        $('#import_csv')[0].reset();
        $('#import_csv_btn').attr('disabled', false);
        $('#import_csv_btn').html('Import Done');
        show_contacts();
      }
      })
    });

    //click on show link SNT 1062021
      // $('#show_data').on('click','.item_show',function(){
      //       var id = $(this).data('ct_id');
            
      //       $.ajax({
      //           type : "POST",
      //           url  : "share_link",
      //           dataType : "JSON",
      //           data : {ct_id:id},
      //           success: function(data){
      //               alert(1)
      //           }
      //       });
      //       return false;
      //   });

    });
</script> 