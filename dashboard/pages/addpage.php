<?php include '../components/header.inc.php' ?>

<body>

    <?php

        function addpage(){
            if(!empty($_POST["inputPageName"]) && isset($_POST['submit'])){
                $filename = $_POST["inputPageName"] . ".php";
                $myfile = fopen($filename, "w") or die("Unable to open file!");
                // $pagename = $_POST["inputPageName"];
                // echo $pagename;
            }
        }

        if(isset($_POST['submit'])){
            addpage();
        }
    ?>

    <div id="wrapper">

            <?php 
                include 'navibar.php';
            ?>

            <?php 
                include '../components/menubar.inc.php';
             ?>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add a page</h1>
                </div>
            </div>
            <div class="row">
                <form class="form-addpage" action="addpage.php" method="POST">
                    <h2 class="form-addpage-heading">Pagina toevoegen</h2>
                    <label for="inputPageName" class="sr-only">Pagina naam</label>
                    <input id="inputPageName" name="inputPageName" class="form-control" placeholder="Pagina naam" required autofocus>
                    
                    <button class="btn btn btn-primary btn-block" name="submit" type="submit">Toevoegen</button>
                  </form>
            </div>  

        </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>