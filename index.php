<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Download Videos Easily</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/style.css">
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
    <div class="container">
        <main role="main">
            
            <section class="jumbotron text-center" style="background-color:#cddbe8; padding: 2rem 2rem;">
                <h1 class="jumbotron-heading">Simple Downloader For Youtube</h1>
                <p class="lead text-muted" style="margin-bottom:0.3em">
                        Just copy the youtube video link & Paste it to the box below. You will find download link with various quality with download link</p>
            </section>
        

            <section class="linkinputarea">
                
                    <div class="row linkinputarearow">
                        <div class="col-md-6 offset-md-3">
                            <form action="" id="generatelinkform" method="post" class="from d-flex justify-content-center">
                                <div class="input-group mb-3">
                                    <input type="text" name="yturlname" id="yturlname" class="form-control box-shadow" placeholder="Paste your link here" style="border: 1px solid #17a2b8" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-info generatelinkbtn">Generate</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                
            </section>
            <section>
                <div class="row loadingrow">
                    <div class="col-md-12"><div class="loading mx-auto d-block" ></div></div>
                </div>

                <div class="container">
                    <div class="result">
                        <div class="row">
                            <div class="col-xs-12 col-md-5 videothumbcontainer">
                                <div class="card">
                                    <img id="videothumbnail" src="http://i1.ytimg.com/vi/9mdJV5-eias/hqdefault.jpg" alt="" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title video-title">Vivigam</h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item duration">Duration - </li>
                                        <li class="list-group-item author">Author - </li>
                                        <li class="list-group-item viewcount">View Count - </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-7">
                                <h2>Information with download link</h2>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Format</th>
                                            <th>Resulation</th>
                                            <th>Size</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="downloadlinkwithinfo" class="thisistobody">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        
        </main>
    </div>
    <footer class="text-center">
        <p style="margin-bottom:0">Copyright All Right Reserved</p>
    </footer>

    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function(){
            
            $('#generatelinkform').submit(function(e){
                e.preventDefault();
                //$('.result').css('visibility', 'hidden');
                $('.result').hide();
                $('.loadingrow').show();
                var data = $('#generatelinkform').serialize();
                $.ajax({
                    type: 'POST',
                    dataType: 'JSON',
                    url: 'fetchvideo.php',
                    data: data,
                    success: function(returndata) {
                        $('.loadingrow').hide();
                        //$('.result').css('visibility', 'visible');
                        console.log(returndata);
                        $('.result').show();
                        $('.video-title').html(returndata.title);
                        $('.duration').html(returndata.duration);
                        $('.author').html(returndata.author);
                        $('.viewcount').html(returndata.viewcount);
                        $('#videothumbnail').attr('src', returndata.thumbnail);
                        plotdatatotable(returndata.stream);
                    }    
                });
            });

            function plotdatatotable(data) {
                console.log(data);
                $(".thisistobody").empty();
                $.each(data,function(key, value){
                    console.log(value.title);
                    // var tr = "<tr><td>" + value.type + "</td><td>" + value.resulation + "</td><td>" + value.size + "</td><td><a href=" + value.url + "&title="+ value.title +" download='download'>Download</a></td></tr>";
                    var tr = '<tr><td>' + value.type + '</td><td>' + value.resulation + '</td><td>' + value.size + '</td><td><a href=' + value.url + '&title="'+ value.title +'" download="download">Download</a></td></tr>';
                    $(".thisistobody").append(tr);    
                })
            }

            $(document).on('click','#downloadvidbtn', function(){
                var url = $(this).data('vidurl');
                var ext = $(this).data('vidext');

                console.log(url);
                // window.location='downloadhelper.php?url="'+url+'"&ext='+ext;
                window.open('downloadhelper.php?url='+url+'&ext='+ext, '_blank');
                // $.ajax({
                //     type: 'POST',
                //     url: 'downloadhelper.php',
                //     data: {url : url, ext : ext},
                //     success : function(result) {
                //         console.log(result);
                //     }
                // });

            })

        });

    </script>
</body>
</html>