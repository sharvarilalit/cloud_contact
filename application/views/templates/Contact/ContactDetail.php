<html>
<head>
 <title>Complete Login Register system in Codeigniter</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>

<body>
<div  id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <center>
                    <h3 class="media-heading"><?php echo $contact->ct_fname; ?> <?php echo $contact->ct_lname; ?> </h3>
                    <span><strong>Details: </strong></span>
                        <span class="label label-warning"><?php echo $contact->ct_phone_num; ?></span>
                        <span class="label label-info"><?php echo $contact->ct_email; ?></span>
                        <span class="label label-info"><?php echo $contact->ct_address; ?></span>
                        <span class="label label-success"><?php echo $contact->ct_nickname; ?></span>
                    </center>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>