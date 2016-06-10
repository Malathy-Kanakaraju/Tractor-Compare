<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tractor Comparison</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="row">
            <div class="container-fluid">
                <div class="col-md-offset-4 col-md-4 col-md-offset-4">
                    <br />
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h2>Tractor comparison</h2>
                        </div>
                        <div class="panel panel-body">
                        <form role="form" method="post" action="compareResults.php">
                            <div class="form-group">
                            <div class="col-md-4"> Select Budget </div>
                                <div class="col-md-8">
                                    <select class="form-control" name="budget">
                                        <option value="null">Nothing Selected</option>
                                        <option value="b3l">Below 3 Lac</option>
                                        <option value="3lt5l">3 Lac - 5 Lac</option>
                                        <option value="5lt10l">5 Lac - 10 Lac</option>
                                    </select>
                                </div>
                            </div><br /><br /><br />
                            <div class="form-group"> 
                                <div class="col-md-4"> Select HP </div>
                                <div class="col-md-8">
                                    <select class="form-control" name="hp">
                                        <option value="null">Nothing Selected</option>
                                        <option value="b20">Below 20 HP</option>
                                        <option value="20t40">20 HP - 40 HP</option>
                                        <option value="40t60">40 HP - 60 HP</option>
                                    </select>
                                </div>
                            </div><br /><br />
                            <div class="form-group"> 
                                <div class="col-md-4"> Select Brand</div>
                                <div class="col-md-8">
                                    <select class="form-control" name="brand">
                                        <option value="null">Nothing Selected</option>
                                        <option value="Brand1">Brand1</option>
                                        <option value="Brand2">Brand2</option>
                                        <option value="Brand3">Brand3</option>
                                    </select>
                                </div>
                            </div><br /><br />
                            <div class="col-md-offset-3 col-md-6 col-md-offset-3">
                            <input type="submit" class="btn btn-block btn-info" value="Compare Now" name="compareNow"/>
                            </div>
                        </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
