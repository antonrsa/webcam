<!DOCTYPE html>
<html>

<head>
    <title>Foto webcam</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style type="text/css">
        #results {
            padding: 10px;
            border: 1px solid;
            background: #ccc;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1 class="text-center"><b>Foto Webcam</b></h1>
        <p></p>
        <div class="row" style="text-align: center; margin-left: 250px;">
            <div class="col-md-8">
                <div id="results">
                    <div id="my_camera"></div>
                </div>
                <p></p>
                <button class="btn btn-success" style="margin-left: 10px; font-size: medium; width:150px;" onClick="takeSnapShot()">Ambil Foto</button>
                <!--<input type=button style="margin-left: 100px;" value="Ambil Foto" onClick="takeSnapShot()">-->
                <input type="hidden" name="image" class="image-tag">
            </div>
            <!--
            <div class="col-md-6">
                <div id="results">Preview Image...</div>
                <div id="my_camera" style="height:auto;width:auto; text-align:left;"></div>
                <p></p>
                <input type="button" value="Download" id="btPic" onclick="takeSnapShot()">
            </div>
            -->
        </div>
    </div>

    <!-- Configure a few settings and attach camera -->
    <script language="JavaScript">
        Webcam.set({
            width: 530,
            height: 400,
            image_format: 'jpeg',
            jpeg_quality: 100
        });

        Webcam.attach('#my_camera');

        function take_snapshot() {
            Webcam.snap(function(data_uri) {
                $(".image-tag").val(data_uri);
                document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
            });
        }

        takeSnapShot = function() {
            Webcam.snap(function(data_uri) {
                downloadImage('MR_', data_uri);
            });
        }

        // DOWNLOAD THE IMAGE.
        downloadImage = function(name, datauri) {
            var a = document.createElement('a');
            a.setAttribute('download', name + '.jpeg');
            a.setAttribute('href', datauri);
            a.click();
        }
    </script>
</body>

</html>