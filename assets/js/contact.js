
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
