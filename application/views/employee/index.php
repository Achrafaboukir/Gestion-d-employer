<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap User Management Data Table</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
    color: #566787;
    background: #f5f5f5;
    font-family: 'Varela Round', sans-serif;
    font-size: 13px;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
    min-width: 1000px;
    background: #fff;
    padding: 20px 25px;
    border-radius: 3px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    padding-bottom: 15px;
    background: #299be4;
    color: #fff;
    padding: 16px 30px;
    margin: -20px -25px 10px;
    border-radius: 3px 3px 0 0;
}
.table-title h2 {
    margin: 5px 0 0;
    font-size: 24px;
}
.table-title .btn {
    color: #566787;
    float: right;
    font-size: 13px;
    background: #fff;
    border: none;
    min-width: 50px;
    border-radius: 2px;
    border: none;
    outline: none !important;
    margin-left: 10px;
}
.table-title .btn:hover, .table-title .btn:focus {
    color: #566787;
    background: #f2f2f2;
}
.table-title .btn i {
    float: left;
    font-size: 21px;
    margin-right: 5px;
}
.table-title .btn span {
    float: left;
    margin-top: 2px;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
    padding: 12px 15px;
    vertical-align: middle;
}
table.table tr th:first-child {
    width: 60px;
}
table.table tr th:last-child {
    width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}	
table.table td:last-child i {
    opacity: 0.9;
    font-size: 22px;
    margin: 0 5px;
}
table.table td a {
    font-weight: bold;
    color: #566787;
    display: inline-block;
    text-decoration: none;
}
table.table td a:hover {
    color: #2196F3;
}
table.table td a.settings {
    color: #2196F3;
}
table.table td a.delete {
    color: #F44336;
}
table.table td i {
    font-size: 19px;
}
table.table .avatar {
    border-radius: 50%;
    vertical-align: middle;
    margin-right: 10px;
}
.status {
    font-size: 30px;
    margin: 2px 2px 0 0;
    display: inline-block;
    vertical-align: middle;
    line-height: 10px;
}
.text-success {
    color: #10c469;
}
.text-info {
    color: #62c9e8;
}
.text-warning {
    color: #FFC107;
}
.text-danger {
    color: #ff5b5b;
}
.pagination {
    float: right;
    margin: 0 0 5px;
}
.pagination li a {
    border: none;
    font-size: 13px;
    min-width: 30px;
    min-height: 30px;
    color: #999;
    margin: 0 2px;
    line-height: 30px;
    border-radius: 2px !important;
    text-align: center;
    padding: 0 6px;
}
.pagination li a:hover {
    color: #666;
}	
.pagination li.active a, .pagination li.active a.page-link {
    background: #03A9F4;
}
.pagination li.active a:hover {        
    background: #0397d6;
}
.pagination li.disabled i {
    color: #ccc;
}
.pagination li i {
    font-size: 16px;
    padding-top: 6px
}
.hint-text {
    float: left;
    margin-top: 10px;
    font-size: 13px;
}
</style>
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
        <div class="table-title">
        <div class="row">
            <div class="col-sm-5">
                <h2>Manage <b>Employees</b></h2>
            </div>
            <div class="col-sm-7">
                <a href="<?php echo site_url('employee/create'); ?>" class="btn btn-secondary" style="height:38px;">
                    <i class="material-icons">&#xE147;</i> <span>Add New Employee</span>
                </a>
                <!-- Single search input for name, surname, and email -->
                <input type="text" id="generalSearch" class="searchInput form-control" placeholder="Search by name, surname, or email..." style="width: 200px; margin-left: 10px; float: right; font-size: 12px; height:38px">
                        <!-- Separate search input for position -->
                        <select id="positionFilter" class="form-control" style="width: 150px; margin-left: 10px; float: right; font-size: 12px; height:38px ">
        <option value="" >Filter by position</option>
        <option value="gérant">Gérant</option>
        <option value="cuisinier">Cuisinier</option>
        <option value="livreur">Livreur</option>
    </select>
                   </div>
        </div>
    </div>
            </div>
            <table class="table table-striped table-hover">
            <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>                     
                        <th>Surname</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>adresse</th>
                        <th>Position</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($employees as $employee): ?>
                    <tr>
                        <td><?php echo $employee['id']; ?></td>
                        <td><?php echo $employee['nom']; ?></td>
                        <td><?php echo $employee['prenom']; ?></td>                        
                        <td><?php echo $employee['mail']; ?></td>
                        <td><?php echo $employee['telephone']; ?></td>
                        <td><?php echo $employee['adresse']; ?></td>
                        <td><?php echo htmlspecialchars($employee['post_name']); ?></td>
                        <td>
                            <a href="<?php echo site_url('employee/edit/'.$employee['id']); ?>" class="modify" title="Modify" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="<?php echo site_url('employee/delete/'.$employee['id']); ?>" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                    
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>     
</body>
</html>
<script>
$(document).ready(function(){
    $('.delete').on('click', function(e) {
        e.preventDefault();
        var link = $(this).attr('href');
        if(confirm('Are you sure you want to delete this user?')) {
            window.location.href = link;
        }
    });
});
</script>
<script>
$(document).ready(function(){
    // Search functionality for name, surname, email, telephone, and address
    $("#generalSearch").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("table tbody tr").filter(function() {
            $(this).toggle(
                $(this).find("td:eq(1)").text().toLowerCase().indexOf(value) > -1 ||
                $(this).find("td:eq(2)").text().toLowerCase().indexOf(value) > -1 ||
                $(this).find("td:eq(3)").text().toLowerCase().indexOf(value) > -1 ||
                $(this).find("td:eq(4)").text().toLowerCase().indexOf(value) > -1 ||
                $(this).find("td:eq(5)").text().toLowerCase().indexOf(value) > -1
            )
        });
    });

    // Position filter functionality
    $("#positionFilter").on("change", function() {
        var value = $(this).val().toLowerCase();
        $("table tbody tr").filter(function() {
            $(this).toggle($(this).find("td:eq(6)").text().toLowerCase() === value || value === "")
        });
    });

    // Delete confirmation
    $('.delete').on('click', function(e) {
        e.preventDefault();
        var link = $(this).attr('href');
        if(confirm('Are you sure you want to delete this employee?')) {
            window.location.href = link;
        }
    });
});
</script>