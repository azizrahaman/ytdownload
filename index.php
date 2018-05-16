<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Download Videos Easily</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="assets/jquery-3.3.1.min.js"></script>
</head>
<body>
    
    <header>
        
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a href="" class="navbar-brand">YtDownloader</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent" aria-control="navbarSupportedContent" aria-expanded="false" aria-label="Toggle Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
                <ul class="navbar-nav mr-auto">
                
                    <li class="nav-item active">
                        <a href="" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Downloads</a>    
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Featured Videos</a>
                    </li>
                </ul>
                <ur class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="" class="nav-link pull-right">About</a>
                    </li>
                </ur>
            </div>
        </div>
    </header>

    <main role="main">

        <section class="jumbotron text-center" style="background-color:#cddbe8;">
            <h1 class="jumbotron-heading">Simple Downloader For Youtube</h1>
            <p class="lead text-muted" style="margin-bottom:0.3em">
                    Just copy the youtube video link & Paste it to the box below. You will find download link with various quality with download link</p> <p class="lead text-muted">Happy Downloading!!
            </p>
        </section>

        <section class="linkinputarea">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <form action="fetchinfo.php" method="post" class="from d-flex justify-content-center">
                            <div class="input-group mb-3">
                                <input type="text" name="yturlname" id="yturlname" class="form-control box-shadow" placeholder="Paste your link here" style="border: 1px solid #17a2b8">
                                <div class="input-group-append">
                                    <button class="btn btn-info">Generate</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <footer class="text-muted">
    
    </footer>

    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>