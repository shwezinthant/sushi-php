<?php
require("header.php")
?>
<div class="container" id="addMenuDiv">
    <p class="text-center text-danger display-4 m-4">Add New Menu</p>
    <form action="addmenu.php" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="image" class="col-sm-2 offset-1 col-form-label">Image</label>
            <div class="col-sm-9">
                <input type="file" class="form-control-plaintext " id="image" name="image" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 offset-1 col-form-label">Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="name" required placeholder="Enter Name" name="name">
            </div>
        </div>
        <div class="form-group row">
            <label for="price" class="col-sm-2 offset-1 col-form-label">price</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="price" required placeholder="Enter Price" name="price">
            </div>
        </div>
        <button class="btn-success btn offset-1" type="submit" name="submit">Save</button>
    </form>
</div>

<div class="container" id="editMenuDiv">
    <div class="row mt-5">
        <div class="col-12 text-center mb-3">
            <h1 class="display-4 text-primary">Edit Menu</h1>
        </div>

        <div class="col-12">
            <form action="updatemenu.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="edit_id" id="edit_id">
                <input type="hidden" name="edit_oldprofile" id="edit_oldimage">

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Profile</label>
                    <div class="col-sm-10">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#old" role="tab"
                                    aria-controls="home" aria-selected="true">Old Profile</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#new" role="tab"
                                    aria-controls="profile" aria-selected="false">New Profile</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="old" role="tabpanel" aria-labelledby="home-tab">
                                <img class="img-fluid" src="" alt="" id="showOldPhoto" width="200px" height="200px">
                            </div>
                            <div class="tab-pane fade" id="new" role="tabpanel" aria-labelledby="profile-tab">
                                <input type="file" name="edit_newimage">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="edit_name" name="edit_name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="edit_price" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="edit_price" name="edit_price">
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<p class="text-center text-danger display-4 m-4">Menu Lists</p>
<div class="row offset-3">

    <table class="table col-9" cellpadding="1">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
</body>

</html>