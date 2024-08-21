<!DOCTYPE html>
<html>

<head>
    <title>Foto Webcam</title>
    <script type="text/javascript" src=" https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js "></script>
    <style>
        * {
            font-family: Calibri;
            font-size: 18px;
        }

        input {
            cursor: pointer;
        }

        table,
        input {
            width: auto;
        }

        table,
        th,
        td,
        th {
            border: solid 1px #DDD;
            border-collapse: collapse;
            padding: 2px 3px;
            text-align: center;
            font-weight: normal;
        }

        #camBox {
            display: none;
            position: fixed;
            border: 0;
            top: 0;
            right: 0;
            left: 0;
            overflow-x: auto;
            overflow-y: hidden;
            z-index: 9999;
            background-color: rgba(239, 239, 239, .9);
            width: 100%;
            height: 100%;
            padding-top: 10px;
            text-align: center;
            cursor: pointer;
            -webkit-box-align: center;
            -webkit-box-orient: vertical;
            -webkit-box-pack: center;
            -webkit-transition: .2s opacity;
            -webkit-perspective: 1000
        }
    </style>
</head>

<body>

    <div id="camBox" style="width:100%;height:100%;">
        <!--POPUP DIALOG BOX TO SHOW LIVE WEBCAM.-->
        <div class="revdivshowimg" style="top:20%;text-align:center;margin:0 auto;">

            <div id="camera"
                style="height:auto;text-align:center;margin:0 auto;">
            </div>

            <p>
                <input type="button" value="Ok" id="btAddPicture"
                    onclick="addCamPicture()" />
                <input type="button" value="Cancel"
                    onclick="document.getElementById('camBox').style.display = 'none';" />
            </p>

            <!--       hidden elements -->
            <input type="hidden" id="rowid" /><input type="hidden" id="dataurl" />
        </div>
    </div>

    <div style="width:auto;">
        <table id="myTable">
            <tbody>
                <tr>
                    <th>Employee Name</th>
                    <th>Picture</th>
                </tr>
                <tr>
                    <td>Alpha</td>
                    <td>
                        <div id="div_alpha"></div>
                        <input type="button" value="Take a SnapShot" id="alpha"
                            onclick="takeSnapshot(this)" />
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

    <!-- Configure a few settings and attach camera -->
    <script>
        // Camera settings
        Webcam.set({
            width: 220,
            height: 190,
            image_format: 'jpeg',
            jpeg_quality: 100
        });

        Webcam.attach('#camera'); // the div element.

        takeSnapshot = function(oButton) {
            document.getElementById('camBox').style.display = 'block';
            document.getElementById('rowid').value = oButton.id
        }

        addCamPicture = function() {
            var rowid = document.getElementById('rowid').value;

            Webcam.snap(function(data_uri) {
                document.getElementById('div_' + rowid).innerHTML =
                    '<img src="' + data_uri + '" id="" width="70px" height="50px" />';
                downloadImage('arun', data_uri);
            });

            document.getElementById('rowid').value = '';

            // Hide the popup dialog box
            document.getElementById('camBox').style.display = 'none';
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