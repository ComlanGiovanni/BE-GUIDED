<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, target-densitydpi=device-dpi"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Guide Me ! | Géolocalisation</title>
        <!-- Inclusion de l'API Google Maps -->

        <script>

            // On vérifie si le navigateur supporte la géolocalisation
            if(navigator.geolocation) {

                function hasPosition(position) {
                    // Instanciation
                    var point = new google.maps.LatLng(position.coords.latitude, position.coords.longitude),

                        // Ajustage des paramètres
                        myOptions = {
                            zoom: 15,
                            center: point,
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        },

                        // Envoi de la carte dans la div
                        mapDiv = document.getElementById("mapDiv"),
                        map = new google.maps.Map(mapDiv, myOptions),

                        marker = new google.maps.Marker({
                            position: point,
                            map: map,
                            // Texte du point
                            title: "Vous êtes ici"
                        });
                }
                navigator.geolocation.getCurrentPosition(hasPosition);
            }
        </script>
        <style>
            body{
                background: url('img/1482655486626.jpg')  no-repeat  fixed;
                background-size: cover;
            }
            #mapDiv {
                /* Modifier la taille de la carte avec width et height */
                width:700px;
                height:500px;
                border:1px solid #efefef;
                background: white;
                margin-left: 300px;
                -moz-box-shadow:5px 5px 10px #000;
                -webkit-box-shadow:5px 5px 10px #000;
            }
            .well-searchbox {
                color: white;
                float: left;
                max-height: 200px;
                max-width: 400px;
                padding: 19px;
                position: absolute;
                z-index: 80;
                background: rgba(0, 0, 0, 0.6);
                margin-top: 100px;
                border: 1px solid #e3e3e3;
                border-radius: 4px;
                -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
            }
        </style>
    </head>

    <body>
        <a href="index.php"><img src="img/icons/1482678520_home-05.png" alt="" width="50px" height="50px"></a>
        <div class="well-searchbox">
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-md-4 control-label">Keyword</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" placeholder="Keyword">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Country</label>
                    <div class="col-md-8">
                        <select class="form-control" placeholder="Country">
                            <option value="">All</option>
                            <option value="">Country 1</option>
                            <option value="">Country 2</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Province</label>
                    <div class="col-md-8">
                        <select class="form-control" placeholder="Province">
                            <option value="">All</option>
                            <option value="">Province 1</option>
                            <option value="">Province 2</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">City</label>
                    <div class="col-md-8">
                        <select class="form-control" placeholder="City">
                            <option value="">All</option>
                            <option value="">City 1</option>
                            <option value="">City 2</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Category</label>
                    <div class="col-md-8">
                        <select class="form-control" placeholder="Category">
                            <option value="">All</option>
                            <option value="">Category 1</option>
                            <option value="">Category 2</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-offset-4 col-sm-5">
                    <button type="submit" class="btn btn-success">Search</button>
                </div>
            </form>
        </div>    
        <div id="mapDiv"></div>
    </body>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AZFZERGOPNRGPNERGPIONERGPN&exp&sensor=false&libraries=places">sensor=false"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
</html>