<?php
require_once("../../assets/php/connection.php");
session_start();

// Fetch data from the services table

$home_page_result = mysqli_query($conn,"SELECT * from home_page");
$home_page = mysqli_fetch_assoc($home_page_result);

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
                href="#Users"
                aria-expanded="false"
                aria-controls="Users"
              >
                <span class="menu-title">Users</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="Users">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="users.php"
                      >User Details
                    </a>
                  </li>
                </ul>
              </div>
          </li>
            <li class="nav-item">
              <a
                class="nav-link"
                data-bs-toggle="collapse"
                href="#homeContent"
                aria-expanded="false"
                aria-controls="homeContent"
              >
                <span class="menu-title">Home Content</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="homeContent">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="manage_home.php"
                      >Manage Home Content</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                data-bs-toggle="collapse"
                href="#bannerSection"
                aria-expanded="false"
                aria-controls="bannerSection"
              >
                <span class="menu-title">Banner Section</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="bannerSection">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="add_home_banner.html">Add Banner</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="manage_home_banner.php"
                      >Manage Banner</a
                    >
                  </li>
                </ul>
              </div>
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
                href="#trustSection"
                aria-expanded="false"
                aria-controls="trustSection"
              >
                <span class="menu-title">Trust Section</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="trustSection">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="add_Trust.html">Add Trust</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="manage_Trust.php"
                      >Manage Trust</a
                    >
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                data-bs-toggle="collapse"
                href="#bookingProcess"
                aria-expanded="false"
                aria-controls="bookingProcess"
              >
                <span class="menu-title">Booking Process</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="bookingProcess">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="add_booking_process.html">Add Trust</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="manage_booking_process.php"
                      >Manage Trust</a
                    >
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                data-bs-toggle="collapse"
                href="#examcity"
                aria-expanded="false"
                aria-controls="examcity"
              >
                <span class="menu-title">Exam Cities</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="examcity">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="add_city.html">Add City</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="manage_city.php"
                      >Manage City</a
                    >
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                data-bs-toggle="collapse"
                href="#functionCount"
                aria-expanded="false"
                aria-controls="functionCount"
              >
                <span class="menu-title">Functionality Count</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="functionCount">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="add_function.html">Add Function</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="manage_function.php"
                      >Manage Function</a
                    >
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                data-bs-toggle="collapse"
                href="#faqs"
                aria-expanded="false"
                aria-controls="faqs"
              >
                <span class="menu-title">FAQs</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="faqs">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="add_question.html">Add Question</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="manage_question.php"
                      >Manage Question</a
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

           
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Home Content</h4>
                  <form class="form-sample" id="addHomeContentForm">
                    <div class="row mt-5">
                      <div class="col-xl-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" for="logo"
                            >
                            <div class="row">
                            <div class="col-12">
                            <img src="../../assets/php/Images/<?php echo $home_page["logo"]?>" style="margin-top:-30px;" width="100"/>
                            <p>Logo</p>
                            </div>
                            </div>
                            </label
                          >
                          <div class="col-sm-9">
                            
                            <input type="file" class="form-control" name="logo" id="logo" accept=".jpg, .jpeg, .png" value="">
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" for="service_qt"
                            >service Question</label
                          >
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="service_qt" id="service_qt" required value="<?php echo $home_page["service_qt"]?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" for="service_hd"
                            >Service Heading</label
                          >
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="service_hd" id="service_hd" required value="<?php echo $home_page["service_hd"]?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-6">
                    <div class="form-group row">
                          <label class="col-sm-3 col-form-label" for="about_qt"
                            >About Question</label
                          >
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="about_qt" id="about_qt" required value="<?php echo $home_page["about_qt"]?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" for="about_hd"
                            >About Heading</label
                          >
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="about_hd" id="about_hd" required value="<?php echo $home_page["about_hd"]?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" for="about_content"
                            >About Content</label
                          >
                          <div class="col-sm-9">
                            <textarea rows="20" cols="50" class="form-control" name="about_content" id="about_content" required ><?php echo $home_page["about_content"]?></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" for="about_comment"
                            >About Comment</label
                          >
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="about_comment" id="about_comment" required value="<?php echo $home_page["about_comment"]?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-6">
                    <div class="form-group row">
                          <label class="col-sm-3 col-form-label" for="trust_qt"
                            >Trust Question</label
                          >
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="trust_qt" id="trust_qt" required value="<?php echo $home_page["trust_qt"]?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" for="trust_hd"
                            >Trust Heading</label
                          >
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="trust_hd" id="trust_hd" required value="<?php echo $home_page["trust_hd"]?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-6">
                        <div class="form-group row">
                              <label class="col-sm-3 col-form-label" for="booking_ht1"
                                >Booking Heading1</label
                              >
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="booking_ht1" id="booking_ht1" required value="<?php echo $home_page["booking_ht1"]?>"/>
                              </div>
                            </div>
                          </div>
                          <div class="col-xl-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label" for="booking_ht2"
                                >Booking Heading2</label
                              >
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="booking_ht2" id="booking_ht2" required value="<?php echo $home_page["booking_ht2"]?>"/>
                              </div>
                            </div>
                          </div>
                          <div class="col-xl-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="cities_ht1"
                            >Cities Heading1</label
                            >
                            <div class="col-sm-9">
                            <input type="text" class="form-control" name="cities_ht1" id="cities_ht1" required value="<?php echo $home_page["cities_ht1"]?>"/>
                            </div>
                            </div>
                            </div>
                            <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="cities_ht2"
                                >Cities Heading2</label
                                >
                                <div class="col-sm-9">
                                <input type="text" class="form-control" name="cities_ht2" id="cities_ht2" required value="<?php echo $home_page["cities_ht2"]?>"/>
                                </div>
                            </div>
                            </div>
                            <div class="col-xl-6">
                            <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="final_t"
                                    >Final Text</label
                                    >
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="final_t" id="final_t" required value="<?php echo $home_page["final_t"]?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="faq_ht1"
                                    >FAQ Heading1</label
                                    >
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="faq_ht1" id="faq_ht1" required value="<?php echo $home_page["faq_ht1"]?>"/>
                                    </div>
                                </div>
                                </div>
                                <div class="col-xl-6">
                                <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="faq_ht2"
                                        >FAQ Heading2</label
                                        >
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" name="faq_ht2" id="faq_ht2" required value="<?php echo $home_page["faq_ht2"]?>"/>
                                        </div>
                                    </div>
                                </div>
                                  
                    </div>
                    <div class="form-group row text-center ">
                        <button
                        type="submit"
                        class="btn btn-gradient-primary mb-2"
                        style="width:200px;"
                      >
                        Submit
                      </button>
                   
                    </div>
                  </form>
                  <h4><b id="result" class="text-success"></b></h4>
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
