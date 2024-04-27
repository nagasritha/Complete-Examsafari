<?php
require_once("../../assets/php/connection.php");
session_start();

// Fetch data from the services table

$services = mysqli_query($conn,"SELECT * from services");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Predulive Labs</title>
    <!-- plugins:css -->
    <link
      rel="stylesheet"
      href="assets/vendors/mdi/css/materialdesignicons.min.css"
    />
    <link rel="stylesheet" href="../../assets/css/style.css"/>
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />

    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- End layout styles -->
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div
            class="card-body card-body-padding d-flex align-items-center justify-content-between"
          >
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">
                  Free 24/7 customer support, updates, and more on purchasing
                  our service
                </p>
                <a
                  href="https://www.bootstrapdash.com/product/purple-bootstrap-admin-template/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo"
                  target="_blank"
                  class="btn me-2 buy-now-btn border-0"
                  >Get Pro</a
                >
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a
                href="https://www.bootstrapdash.com/product/purple-bootstrap-admin-template/"
                ><i class="mdi mdi-home me-3 text-white"></i
              ></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_navbar.html -->
      <nav
        class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row"
      >
        <div
          class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center"
        >
          <a
            class="navbar-brand brand-logo"
            href="index.html"
            style="font-weight: 1000"
            >Predulive</a
          >
          <a class="navbar-brand brand-logo-mini" href="index.html"
            ><img src="assets/images/logo-mini.svg" alt="logo"
          /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button
            class="navbar-toggler navbar-toggler align-self-center"
            type="button"
            data-toggle="minimize"
          >
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input
                  type="text"
                  class="form-control bg-transparent border-0"
                  placeholder="Search projects"
                />
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a
                class="nav-link dropdown-toggle"
                id="profileDropdown"
                href="#"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <div class="nav-profile-img">
                  <img src="assets/images/faces/face1.jpg" alt="image" />
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">Sandeep Kumar</p>
                </div>
              </a>
              <div
                class="dropdown-menu navbar-dropdown"
                aria-labelledby="profileDropdown"
              >
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-cached me-2 text-success"></i> Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-logout me-2 text-primary"></i> Signout
                </a>
              </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link count-indicator dropdown-toggle"
                id="messageDropdown"
                href="#"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="mdi mdi-email-outline"></i>
                <span class="count-symbol bg-warning"></span>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                aria-labelledby="messageDropdown"
              >
                <h6 class="p-3 mb-0">Messages</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img
                      src="assets/images/faces/face4.jpg"
                      alt="image"
                      class="profile-pic"
                    />
                  </div>
                  <div
                    class="preview-item-content d-flex align-items-start flex-column justify-content-center"
                  >
                    <h6
                      class="preview-subject ellipsis mb-1 font-weight-normal"
                    >
                      Mark send you a message
                    </h6>
                    <p class="text-gray mb-0">1 Minutes ago</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img
                      src="assets/images/faces/face2.jpg"
                      alt="image"
                      class="profile-pic"
                    />
                  </div>
                  <div
                    class="preview-item-content d-flex align-items-start flex-column justify-content-center"
                  >
                    <h6
                      class="preview-subject ellipsis mb-1 font-weight-normal"
                    >
                      Cregh send you a message
                    </h6>
                    <p class="text-gray mb-0">15 Minutes ago</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img
                      src="assets/images/faces/face3.jpg"
                      alt="image"
                      class="profile-pic"
                    />
                  </div>
                  <div
                    class="preview-item-content d-flex align-items-start flex-column justify-content-center"
                  >
                    <h6
                      class="preview-subject ellipsis mb-1 font-weight-normal"
                    >
                      Profile picture updated
                    </h6>
                    <p class="text-gray mb-0">18 Minutes ago</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center">4 new messages</h6>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link count-indicator dropdown-toggle"
                id="notificationDropdown"
                href="#"
                data-bs-toggle="dropdown"
              >
                <i class="mdi mdi-bell-outline"></i>
                <span class="count-symbol bg-danger"></span>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                aria-labelledby="notificationDropdown"
              >
                <h6 class="p-3 mb-0">Notifications</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                      <i class="mdi mdi-calendar"></i>
                    </div>
                  </div>
                  <div
                    class="preview-item-content d-flex align-items-start flex-column justify-content-center"
                  >
                    <h6 class="preview-subject font-weight-normal mb-1">
                      Event today
                    </h6>
                    <p class="text-gray ellipsis mb-0">
                      Just a reminder that you have an event today
                    </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-warning">
                      <i class="mdi mdi-settings"></i>
                    </div>
                  </div>
                  <div
                    class="preview-item-content d-flex align-items-start flex-column justify-content-center"
                  >
                    <h6 class="preview-subject font-weight-normal mb-1">
                      Settings
                    </h6>
                    <p class="text-gray ellipsis mb-0">Update dashboard</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-info">
                      <i class="mdi mdi-link-variant"></i>
                    </div>
                  </div>
                  <div
                    class="preview-item-content d-flex align-items-start flex-column justify-content-center"
                  >
                    <h6 class="preview-subject font-weight-normal mb-1">
                      Launch Admin
                    </h6>
                    <p class="text-gray ellipsis mb-0">New admin wow!</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center">See all notifications</h6>
              </div>
            </li>
            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-power"></i>
              </a>
            </li>
            <li class="nav-item nav-settings d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-format-line-spacing"></i>
              </a>
            </li>
          </ul>
          <button
            class="navbar-toggler navbar-toggler-right d-lg-none align-self-center"
            type="button"
            data-toggle="offcanvas"
          >
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="assets/images/faces/face1.jpg" alt="profile" />
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">Sandeep Kumar</span>
                  <span class="text-secondary text-small"
                    >Drone Service Provider</span
                  >
                </div>
                <i
                  class="mdi mdi-bookmark-check text-success nav-profile-badge"
                ></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.html">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                data-bs-toggle="collapse"
                href="#ui-basic"
                aria-expanded="false"
                aria-controls="ui-basic"
              >
                <span class="menu-title">Services</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="add_service.html">Add Services</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="manage_services.php"
                      >Manage Services</a
                    >
                  </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a
                class="nav-link"
                data-bs-toggle="collapse"
                href="#locations"
                aria-expanded="false"
                aria-controls="locations"
              >
                <span class="menu-title">Locations</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="locations">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="add_locations.html"
                      >Add Locations</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Manage_locations.html"
                      >Manage Locations</a
                    >
                  </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a
                class="nav-link"
                data-bs-toggle="collapse"
                href="#teams"
                aria-expanded="false"
                aria-controls="teams"
              >
                <span class="menu-title">Team</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="teams">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="add_team.html">Add Team Member</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="manage_team.html">Manage Team</a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="manage_requests.html">
                <span class="menu-title">View Requests</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a
                class="nav-link"
                data-bs-toggle="collapse"
                href="#pilots"
                aria-expanded="false"
                aria-controls="pilots"
              >
                <span class="menu-title">Pilots</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="pilots">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="add_pilot.html">Add Pilots</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="manage_pilot.html"
                      >Manage Pilots</a
                    >
                  </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="my_revenue.html">
                <span class="menu-title">Revenue</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a
                class="nav-link"
                data-bs-toggle="collapse"
                href="#drones"
                aria-expanded="false"
                aria-controls="drones"
              >
                <span class="menu-title">Drones</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="drones">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="add_drone.html">Add Drone</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="manage_drone.html"
                      >Manage Drone</a
                    >
                  </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="manage_customers.html">
                <span class="menu-title">Manage Customers</span>
                <i class="mdi mdi-table-large menu-icon"></i>
              </a>
            </li>

            <li class="nav-item sidebar-actions">
              <span class="nav-link">
                <button class="btn btn-block btn-lg btn-gradient-primary mt-4">
                  Logout
                </button>
              </span>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

            
            <div class="row">
             
              <?php
              foreach($services as $service) :
                ?>
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                    <div class="col-sm-8">
                    <h3 class="card-title">Service <span id=""><?php echo $service['id'] ?></span></h3>
                    </div>
                    <div class="col-sm-4">
                    <button class="card-title edit-btn bg-transparent border-0" data-service-id="<?php echo $service['id']?>">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                      </svg>
                    </button>
                    <button class="card-title delete-btn bg-transparent border-0" data-service-id="<?php echo $service['id']?>">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                      </svg>
                    </button>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                       <b>Title:</b>
                      </div>
                      <div class="col-md-6">
                        <p><?php echo $service['title']?></p>
                     </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                       <b>Description:</b>
                      </div>
                      <div class="col-md-6">
                        <p><?php echo $service['description']?></p>
                     </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                       <b>Icon:</b>
                      </div>
                      <div class="col-md-6">
                        <p><?php echo $service['icon']?></p>
                     </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
              endforeach;
              ?>
              
              <div class="signup-popup-container" id="service-Edit-card">
                <div class="signup-popup-card">
                <div class="row">   
                <h4 class="card-title col-10">Add New Service</h4>
                <button id="close-service-Edit-card" class="border-0 bg-transparent col-2"><svg style="font-size:20px" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                </svg>
                </button>
                </div>
                <hr/>
                <form class="form-sample" id="editServiceForm">
                    <div class="row mt-5">
                      <div class="col-12">
                        <div class="form-group row">
                          <label class="col-12 col-form-label font-weight-bold" for="title" style="font-size:20px"
                            >Service Title</label
                          >
                          <div class="col-12">
                            <input type="text" class="form-control" name="title" id="title" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group row">
                          <label class="col-12 col-form-label font-weight-bold" style="font-size:20px" for="description"
                            >Service Description</label
                          >
                          <div class="col-12">
                            <input type="textarea" rows='100' col='100' class="form-control" name="description" id="description" required />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group row">
                          <label class="col-12 col-form-label font-weight-bold" style="font-size:20px" for="icon">Service Icon</label>
                          <div class="col-12">
                            <input type="text" class="form-control" name="icon" id="icon" required/>
                          </div>
                        </div>
                      </div>
                    </div> 
                    <div class="form-group row text-center">
                        <button
                        type="submit"
                        class="btn btn-gradient-primary mb-2"
                        style="width:200px;margin-left:20px;"
                      >
                        Submit
                      </button>
                   
                    </div>
                  </form>
                  <h3><b id="result"></b></h3>
                </div>
              </div>
               
            </div>
          </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->

          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
    <script src="../../assets/js/admin.js"></script>
  </body>
</html>
