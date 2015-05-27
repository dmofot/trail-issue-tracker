<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Language" content="en">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="description" content="Bay Circuit Trail Template">
  <meta name="author" content="David Todd">
  <title>Bay Circuit Trail</title>

  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.2/leaflet.css">
  <link rel="stylesheet" href="assets/leaflet-locatecontrol/L.Control.Locate.css">
  <link rel="stylesheet" href="assets/leaflet-markercluster/MarkerCluster.css">
  <link rel="stylesheet" href="assets/leaflet-markercluster/MarkerCluster.Default.css">
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="apple-touch-icon" href="assets/img/favicon.ico">
  <link rel="shortcut icon" sizes="196x196" href="assets/img/favicon.ico">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  </head>

  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Bay Circuit Trail</a>
      </div>
      <div class="navbar-collapse collapse">
        <form class="navbar-form navbar-right" role="search">
          <div class="form-group has-feedback navbar-right">
              <input id="searchbox" type="text" placeholder="Search" class="form-control">
              <span id="searchicon" class="fa fa-search form-control-feedback"></span>
          </div>
        </form>
        <ul class="nav navbar-nav">
          <li><a href="#" data-toggle="collapse" data-target=".navbar-collapse.in" onclick="$('#aboutModal').modal('show'); return false;"><i class="fa fa-question-circle" style="color: white"></i>&nbsp;&nbsp;About</a></li>
          <li class="dropdown">
            <a id="toolsDrop" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe" style="color: white"></i>&nbsp;&nbsp;Tools <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#" data-toggle="collapse" data-target=".navbar-collapse.in" onclick="map.fitBounds(bct.getBounds()); return false;"><i class="fa fa-arrows-alt"></i>&nbsp;&nbsp;Zoom To Full Extent</a></li>
              <li><a href="#" data-toggle="collapse" data-target=".navbar-collapse.in" onclick="$('#legendModal').modal('show'); return false;"><i class="fa fa-picture-o"></i>&nbsp;&nbsp;Show Legend</a></li>
              <li class="divider hidden-xs"></li>
              <li><a href="#" data-toggle="collapse" data-target=".navbar-collapse.in" onclick="$('#issueModal').modal('show'); return false;"><i class="fa fa-plus-circle" style="color: blue"></i>&nbsp;&nbsp;Add Issue</a></li>
              <li><a href="#" data-toggle="collapse" data-target=".navbar-collapse.in" onclick="$('#removeModal').modal('show'); return false;"><i class="fa fa-minus-circle" style="color: red"></i>&nbsp;&nbsp;Remove Issue</a></li>
            </ul>
          </li>
          <li class="dropdown">
              <a class="dropdown-toggle" id="downloadDrop" href="#" role="button" data-toggle="dropdown"><i class="fa fa-cloud-download" style="color: white"></i>&nbsp;&nbsp;Download <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="data/bctmin.geojson" download="bctmin.geojson" target="_blank" data-toggle="collapse" data-target=".navbar-collapse.in"><i class="fa fa-download"></i>&nbsp;&nbsp;Bay Circuit Trail</a></li>
              </ul>
          </li>
        </ul>
      </div><!--/.navbar-collapse -->
    </div>

    <div id="map"></div>
    <div id="loading">
      <div class="loading-indicator">
        <div class="progress progress-striped active">
          <div class="progress-bar progress-bar-info" style="width: 100%"></div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="aboutModal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Welcome to the Bay Circuit Trail map!</h4>
          </div>
          <div class="modal-body">
            <ul class="nav nav-tabs" id="aboutTabs">
              <li class="active"><a href="#about" data-toggle="tab"><i class="fa fa-question-circle"></i>&nbsp;About the site</a></li>
              <li><a href="#contact" data-toggle="tab"><i class="fa fa-envelope"></i>&nbsp;Contact us</a></li>
              <li><a href="#disclaimer" data-toggle="tab"><i class="fa fa-exclamation-circle"></i>&nbsp;Disclaimer</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe"></i>&nbsp;Metadata <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#bct-tab" data-toggle="tab">Bay Circuit Trail</a></li>
                </ul>
              </li>
            </ul>
            <div class="tab-content" id="aboutTabsContent" style="padding-top: 10px;">
              <div class="tab-pane fade active in" id="about">
                <p>This site is a responsive template for building trail web mapping applications. Open source, MIT licensed, and available on <a href="https://github.com/dmofot" target="_blank">GitHub</a>.</p>
                <div class="panel panel-primary">
                  <div class="panel-heading">Features</div>
                  <ul class="list-group">
                  <ul class="list-group">
                    <li class="list-group-item">Mobile-friendly responsive site navigation with <a href="http://getbootstrap.com/">Bootstrap 3</a></li>
                    <li class="list-group-item">Lightweight mapping with <a href="http://leafletjs.com/" target="_blank">Leaflet</a></li>
                    <li class="list-group-item">Multi-layer feature search with auto-complete using <a href="https://twitter.github.io/typeahead.js/" target="_blank">typeahead.js</a></li>
                  </ul>
                </div>
              </div>
              <div id="disclaimer" class="tab-pane fade text-danger">
                <p>The data provided on this site is for informational and planning purposes only.</p>
                <p>Absolutely no accuracy or completeness guarantee is implied or intended.</p>
              </div>
              <div class="tab-pane fade" id="contact">
                <p><a href="mailto:bct@davidtodd.info">bct@davidtodd.info</a></p>
                <form id="contact-form">
                  <div class="well well-sm">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="first-name">First Name:</label>
                          <input type="text" class="form-control" id="first-name">
                        </div>
                        <div class="form-group">
                          <label for="last-name">Last Name:</label>
                          <input type="text" class="form-control" id="last-email">
                        </div>
                        <div class="form-group">
                          <label for="email">Email:</label>
                          <input type="text" class="form-control" id="email">
                        </div>
                      </div>
                      <div class="col-md-8">
                        <label for="message">Message:</label>
                        <textarea class="form-control" rows="8" id="message"></textarea>
                      </div>
                      <div class="col-md-12">
                        <p>
                          <button type="submit" class="btn btn-primary pull-right" data-dismiss="modal">Submit</button>
                        </p>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="tab-pane fade" id="bct-tab">
                <p>Bay Circuit Trail data courtesy of <a href="http://baycircuit.org/" target="_blank">Bay Circuit Alliance</a></p>
              </div>
            </div>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="legendModal" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Map Legend</h4>
          </div>
          <div class="modal-body">
            <p><img src='assets/img/legend.png' width='142' height='100'></p>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="featureModal" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title text-primary" id="feature-title"></h4>
          </div>
          <div class="modal-body" id="feature-info">
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="issueModal" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Report a trouble issue!</h4>
          </div>
          <div class="modal-body">
            <p>Click on the Go! button below to start reporting an issue.</p>
            <p>Navigate to issue.  Use the "Show me where I am" button in upper left corner to zoom to current location.  Click map and fill out form.  Click Submit button.</p>
            <a href="#" onclick="$('#issueModal').modal('hide'); initRegistration(); return false;"class="btn btn-primary btn-sm">Go!</a>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="insertSuccessModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Success!</h4>
          </div>
          <div class="modal-body">
            <p>Thanks for reporting your issue!</p>
            <p>You should receive an email shortly with instructions should you need to delete your issue.</p>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="removeModal" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Remove issue</h4>
          </div>
          <div class="modal-body">
            <form id="remove-form">
              <div class="well well-sm">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                    <div class="form-group">
                      <label for="email">Email:</label>
                      <input type="text" class="form-control" id="email_remove">
                    </div>
                      <label for="token">Token:</label>
                      <input type="text" class="form-control" id="token_remove">
                    </div>
                    <a href="#" onclick="$('#removeModal').modal('hide'); removeIssue(); return false;"class="btn btn-primary btn-sm">Submit</a>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="removeSuccessModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Issue Removed</h4>
          </div>
          <div class="modal-body">
            <p>Your issue has been removed.</p>
            <p>Thanks for your contribution and feel free to add new issues at any time.</p>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="assets/typeahead/typeahead.bundle.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.2/leaflet.js"></script>
    <script src="assets/leaflet-hash/leaflet-hash.js"></script>
    <script src="assets/leaflet-locatecontrol/L.Control.Locate.js"></script>
    <script src="assets/leaflet-markercluster/leaflet.markercluster.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>