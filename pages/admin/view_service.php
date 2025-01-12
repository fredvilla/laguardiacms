<?php
include_once('../layout/header.php');


?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
<?php
extract($_GET);
$service = get_one("select * from tbl_services where id = $id");
 ?>
            <h6 class="m-0 font-weight-bold text-primary">
                Service Information: 
            </h6>
        </div>

            <div class="card-body">
      
<div class="row">
    <div class="col-md-4">
<div class="card shadow mb-4">
    <div class="card-header py-3">
     <h6 class="m-0 font-weight-bold text-primary">Service ID:<?= $id ?></h6>
    </div>
    <div class="card-body">
                            <form action="" method="post">
     <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>*Name:</label>
                                                <input type="text" name="name" class="form-control text-uppercase" value="<?= $service->name ?>" disabled>
                                            </div>
                                        </div>


                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>*Description:</label>
                                                <textarea name="description" class="form-control" id="" cols="3" rows="3" disabled><?= $service->description ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>*Price:</label>
                                                <input type="number" name="price" class="form-control text-uppercase" value="<?= $service->price ?>" disabled>
                                            </div>
                                        </div>


                                    </div>
                           
                                </div>
    </div>
</div>
    </div>
</div>


                                <!-- <button type="submit" name="updatebtn" style="display:inline-block;" class="btn btn-primary">View</button> -->
                            <div class="d-flex">
                                <a style="margin-left:5px" href="list_service.php" type="button" class="btn btn-primary">Back</a>
                            </div>
                            </form>

                <?php
                include_once('../layout/footer.php');


                ?>
