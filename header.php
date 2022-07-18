<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sushi Bar- PHP - Menu</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/style.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

    <script>
    $(document).ready(function() {
        // $("#addMenuDiv").show();
        // $("#editMenuDiv").hide();
        getmenu();

        function getmenu() {
            $.get("menulist.json", function(response) {
                if (response) {
                    var menuobjarray = response;
                    var html1 = '';
                    $.each(menuobjarray, function(i, v) {
                        var name = v.name;
                        var price = v.price;
                        var image = v.image;
                        html1 += `<div class="card col-4" > <img class="card-img-top" src="photo/${image}" alt="Card image cap">
                        <span class="btn btn-warning disabled w-25 top ml-3 mt-1" >${price}</span>
                        <p>${name}</p>
                        <div class="card-footer">
                        <button type="submit" value="Save" class="w-100  btn btn-outline-primary">Add to chart</button>
                        </div> </div>`
                    })
                    $(".deskcard").html(html1);
                    var j = 1;
                    var html = '';
                    $.each(menuobjarray, function(i, v) {
                        var name = v.name;
                        var price = v.price;
                        html += `<tr>
                                        <td> ${j++}</td>
                                        <td> ${name}</td>
                                        <td> ${price}</td>
                                        <td>
                                            
                                            <button class="btn btn-warning edit" data-id=${i}><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger delete" data-id=${i}><i class="fas fa-trash"></i></button>
                                        </td>
                                </tr>`
                    })
                    $('tbody').html(html);
                }
            })

        }
        $("tbody").on('click', '.edit', function() {
            var id = $(this).data('id');
            $.get("menulist.json", function(response) {
                var menuobjarray = response;
                var name = menuobjarray[id].name;
                var price = menuobjarray[id].price;
                var image = menuobjarray[id].image;

                $('#edit_name').val(name);
                $('#edit_price').val(price);

                $('#showOldPhoto').attr('src', 'photo/' + image);

                $('#edit_id').val(id);
                $('#edit_oldimage').val(image);

                $('#addMenuDiv').hide();
                $('#editMenuDiv').show();
            })
        })
        $('tbody').on('click', '.delete', function() {
            var id = $(this).data('id');

            var ans = confirm('are u sure want to delete');
            if (ans) {
                $.post('deletemenu.php', {
                    id: id
                }, function(data) {
                    getmenu();

                })
            }
        })

    });
    </script>
    <style>
    .top {
        top: 0;
        left: 0;
        position: absolute;
    }
    </style>
</head>


<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sushi- Menu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminUI.php">Admin</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>