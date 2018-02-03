<?php
session_start();
echo $_SESSION['isLogged'];
if(isset($_SESSION['isLogged']) && !empty($_SESSION['isLogged'])) {
	if(!$_SESSION['isLogged']) {
	  header("location:index.html#/login");
	  die;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Post News here</title>
</head>
<body>
    <div class="jumboton-text" style="background:#CCC;padding:3%;">
	<span class="pull-right"><a href="cgi-bin/logout.php">Logout</a></span>
        <div class="row">
            <div class="col-md-7">
                <div class="well">
                    <form id="newsForm" class="form-horizontal" method="post" action="cgi-bin/post.php">
                        <fieldset>
                            <legend>Post News</legend>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="txtTitle">Title</label>
                                <div class="col-lg-10">
                                    <input id="txtTitle" name="title" class="form-control" type="text" placeholder="Enter News Title." required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="txtDesc">Description</label>
                                <div class="col-lg-10">
                                    <input id="txtDesc" name="description" class="form-control" type="text" placeholder="Enter News Description." required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="txtNews">News Text</label>
                                <div class="col-lg-10">
                                    <textarea id="txtNews" name="news" rows="6" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-3">
                                    <button class="btn btn-primary" id="btnSend" type="submit" value="Send">Post</button>
                                    <button class="btn btn-default" type="reset" id="btnClear" value="Cancel">Cancel</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>