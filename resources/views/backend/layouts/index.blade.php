@extends('backend.layouts.app')
@section('content')


<!--body wrapper start-->
        <div class="wrapper">
              
          <!--Start Page Title-->
           <div class="page-title-box">
                <h4 class="page-title">Dashboard1 </h4>
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    
                    <li class="active">
                        Dashboard 1
                    </li>
                </ol>
                <div class="clearfix"></div>
             </div>
              <!--End Page Title-->          
           
                 <!--Start row-->
                 <div class="row">
                     <div class="container">
                         <div class="analytics-box">
                             
                         </div>
                     </div>
                 </div>
                 <!--End row-->
           
                  <!--Start row-->
                  <div class="row">
                   <!--Start info box-->
                   <div class="col-md-3 col-sm-6">
                       <div class="info-box-main">
                          <div class="info-stats">
                              <p>1250</p>
                              <span>Total Sales </span>
                          </div>
                          <div class="info-icon text-primary ">
                              <i class="mdi mdi-cart"></i>
                          </div>
                          <div class="info-box-progress">
                             <div class="progress">
                              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100" style="width: 48%;">
                             </div>
                          </div>
                          </div>
                       </div>
                   </div>
                   <!--End info box-->
                   
                   <!--Start info box-->
                   <div class="col-md-3 col-sm-6">
                       <div class="info-box-main">
                          <div class="info-stats">
                              <p>2300</p>
                              <span>Daily visitors</span>
                          </div>
                          <div class="info-icon text-info">
                             <i class="mdi mdi-account-multiple"></i>	
                          </div>
                          <div class="info-box-progress">
                             <div class="progress">
                              <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100" style="width: 48%;">
                             </div>
                          </div>
                          </div>
                       </div>
                   </div>
                   <!--End info box-->
                
                   <!--Start info box-->
                   <div class="col-md-3 col-sm-6">
                       <div class="info-box-main">
                          <div class="info-stats">
                              <p>5320</p>
                              <span>Total Earning</span>
                          </div>
                          <div class="info-icon text-warning">
                              <i class="fa fa-dollar"></i>
                          </div>
                          <div class="info-box-progress">
                             <div class="progress">
                              <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100" style="width: 48%;">
                              </div>
                          </div>
                          </div>
                       </div>
                   </div>
                   <!--End info box-->
                
                   <!--Start info box-->
                   <div class="col-md-3 col-sm-6">
                       <div class="info-box-main">
                          <div class="info-stats">
                              <p>65</p>
                              <span>Pending Orders</span>
                          </div>
                          <div class="info-icon text-danger">
                              <i class="mdi mdi-weight"></i>
                          </div>
                          <div class="info-box-progress">
                             <div class="progress">
                              <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100" style="width: 48%;">
                             </div>
                          </div>
                          </div>
                       </div>
                   </div>
                   <!--End info box-->
                
                  </div>
                  <!--End row-->
                  
                             
                  
                <!--Start row-->  
                <div class="row">
                     <div class="col-md-6">
                         <div class="white-box">
                         <h2 class="header-title">Sales Analytics</h2>
                            <ul class="list-inline text-center m-t-10">
                              <li>
                                <h5><i class="fa fa-circle m-r-5" style="color:#98C1D1;"></i>Iphone</h5>
                              </li>
                              <li>
                                <h5><i class="fa fa-circle m-r-5" style="color: #23DBDE;"></i>Ipad</h5>
                              </li>
                              <li>
                                <h5><i class="fa fa-circle m-r-5" style="color: #F6DDA0;"></i>Itouch</h5>
                              </li>
                            </ul>
                               <div id="morris-area-chart" style="height:250px;"></div>
                         </div>
                     </div>
                     
                     
                  <div class="col-md-6">
                      <div class="white-box">
                          <h2 class="header-title">Total Revenue </h2>
                            <ul class="list-inline text-center m-t-10">
                              <li>
                                <h5><i class="fa fa-circle m-r-5" style="color:#03A9F3;"></i>Section A</h5>
                              </li>
                              <li>
                                <h5><i class="fa fa-circle m-r-5" style="color: #FFAA00;"></i>Section B</h5>
                              </li>
                            </ul>
                            <div id="morris2"  style="height:250px;"></div>
                            
                      </div>
                  </div><!-- /col-md-6-->

                     
                </div>
                <!--End row-->
                  
                  
                   <!--Start row-->
                   <div class="row">
                   
                    <!-- Start inbox widget-->
                      <div class="col-md-4">
                        <div class="white-box">
                          <h2 class="header-title">Inbox</h2>
                            <div class="inbox-widget inbox-scroll-list">
                            
                                <div class="inbox-inner">
                                   <a href="#">
                                    <div class="inbox-item">
                                        <div class="inbox-img">
                                            <img src="assets/images/users/avatar-1.jpg" alt="" />
                                        </div>
                                        
                                        <div class="inbox-item-info">
                                           <p class="author">John Doe</p>
                                           <p class="inbox-message">Lorem Ipsum which looks....</p>
                                           <p class="inbox-date">13:34 PM</p>
                                        </div>
                                    </div>
                                    </a>
                                </div>

                                <div class="inbox-inner">
                                   <a href="#">
                                    <div class="inbox-item">
                                        <div class="inbox-img">
                                            <img src="assets/images/users/avatar-2.jpg" alt="" />
                                        </div>
                                        
                                        <div class="inbox-item-info">
                                           <p class="author">John Doe</p>
                                           <p class="inbox-message">Lorem Ipsum which looks....</p>
                                           <p class="inbox-date">13:34 PM</p>
                                        </div>
                                    </div>
                                    </a>
                                </div>


                                <div class="inbox-inner">
                                   <a href="#">
                                    <div class="inbox-item">
                                        <div class="inbox-img">
                                            <img src="assets/images/users/avatar-3.jpg" alt="" />
                                        </div>
                                        
                                        <div class="inbox-item-info">
                                           <p class="author">John Doe</p>
                                           <p class="inbox-message">Lorem Ipsum which looks....</p>
                                           <p class="inbox-date">13:34 PM</p>
                                        </div>
                                    </div>
                                    </a>
                                </div>


                                <div class="inbox-inner">
                                   <a href="#">
                                    <div class="inbox-item">
                                        <div class="inbox-img">
                                            <img src="assets/images/users/avatar-4.jpg" alt="" />
                                        </div>
                                        
                                        <div class="inbox-item-info">
                                           <p class="author">John Doe</p>
                                           <p class="inbox-message">Lorem Ipsum which looks....</p>
                                           <p class="inbox-date">13:34 PM</p>
                                        </div>
                                    </div>
                                    </a>
                                </div>



                                <div class="inbox-inner">
                                   <a href="#">
                                    <div class="inbox-item">
                                        <div class="inbox-img">
                                            <img src="assets/images/users/avatar-5.jpg" alt="" />
                                        </div>
                                        
                                        <div class="inbox-item-info">
                                           <p class="author">John Doe</p>
                                           <p class="inbox-message">Lorem Ipsum which looks....</p>
                                           <p class="inbox-date">13:34 PM</p>
                                        </div>
                                    </div>
                                    </a>
                                </div>


                                <div class="inbox-inner">
                                   <a href="#">
                                    <div class="inbox-item">
                                        <div class="inbox-img">
                                            <img src="assets/images/users/avatar-6.jpg" alt="" />
                                        </div>
                                        
                                        <div class="inbox-item-info">
                                           <p class="author">John Doe</p>
                                           <p class="inbox-message">Lorem Ipsum which looks....</p>
                                           <p class="inbox-date">13:34 PM</p>
                                        </div>
                                    </div>
                                    </a>
                                </div>

                                <div class="inbox-inner">
                                   <a href="#">
                                    <div class="inbox-item">
                                        <div class="inbox-img">
                                            <img src="assets/images/users/avatar-3.jpg" alt="" />
                                        </div>
                                        
                                        <div class="inbox-item-info">
                                           <p class="author">John Doe</p>
                                           <p class="inbox-message">Lorem Ipsum which looks....</p>
                                           <p class="inbox-date">13:34 PM</p>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                                
                                
                            </div>    
                        </div>
                       </div>
                      <!-- End inbox widget-->
                       
                   <!--Start chat widget-->
                   <div class="col-md-4">
                       <div class="white-box">
                           <h2 class="header-title">Chat</h2>
                           
                           <div class="chat-widget">
                              <ul  class="chat-scroll-list">
                                <li class="left">
                                   <img src="assets/images/users/avatar-6.jpg" alt="" />
                                    <div class="chat-info">
                                       <a class="name" href="#">Jone Doe</a>
                                       <span class="datetime">6:12</span>
                                       <span class="message">
                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit
                                        </span>
                                   </div>
                                </li>
                                
                                <li class="right">
                                   <img src="assets/images/users/avatar-6.jpg" alt="" />
                                    <div class="chat-info">
                                       <a class="name" href="#">Jone Doe</a>
                                       <span class="datetime">6:12</span>
                                       <span class="message">
                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit
                                        </span>
                                   </div>
                                </li>
                                
                                <li class="left">
                                   <img src="assets/images/users/avatar-6.jpg" alt="" />
                                    <div class="chat-info">
                                       <a class="name" href="#">Jone Doe</a>
                                       <span class="datetime">6:12</span>
                                       <span class="message">
                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit
                                        </span>
                                   </div>
                                </li>
                                
                                <li class="right">
                                   <img src="assets/images/users/avatar-6.jpg" alt="" />
                                    <div class="chat-info">
                                       <a class="name" href="#">Jone Doe</a>
                                       <span class="datetime">6:12</span>
                                       <span class="message">
                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit
                                        </span>
                                   </div>
                                </li>
                           
                              </ul>
                           </div>
                           
                       <div class="row">
                        <div class="col-sm-12">
                          <div class="input-group">
                            <input class="form-control" placeholder="Say something" type="text">
                            <span class="input-group-btn">
                            <button class="btn btn-primary" type="button">Send</button>
                            </span> </div>
                        </div>
                      </div>
                      
                       </div>
                   </div>
                   <!--End chat widget-->
    
                 <!-- Start timeline-->
                 <div class="col-md-4">
                     <div class="white-box">
                       <h2 class="header-title">Latest Activity</h2>
                        <ul class="timeline timeline-compact">
                          <li class="latest">
                            <div class="timeline-date">Just Now</div>
                            <div class="timeline-title">Create New Page</div>
                            <div class="timeline-description">Lorem Ipsum generators on the tend to repeat.</div>
                          </li>
                          
                          <li>
                           <div class="timeline-date">Just Now</div>
                            <div class="timeline-title">Back Up Theme</div>
                            <div class="timeline-description">Lorem Ipsum generators on the tend to repeat.</div>
                          </li>
                          
                          <li>
                            <div class="timeline-date">Just Now</div>
                            <div class="timeline-title">Changes In The Structure</div>
                            <div class="timeline-description">Lorem Ipsum generators on the tend to repeat. </div>
                          </li>
                          
                          <li>
                            <div class="timeline-date">Just Now</div>
                            <div class="timeline-title">New user register</div>
                            <div class="timeline-description">Lorem Ipsum generators on the tend to repeat.</div>
                          </li>
                          
                        </ul>
                     </div>
                 </div>
                 <!-- End timeline-->  
                       
                    
                     <!-- Start inbox widget-->
                     <div class="col-md-12">
                        <div class="white-box">
                          <h2 class="header-title"> Projects </h2>
                            <div class="table-responsive">
                              <table class="table table-hover">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Project Name</th>
                                    <th >Start Date</th>
                                    <th>Deadline Date</th>
                                    <th>Status</th>
                                    <th>Progress</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>1</td>
                                    <td>Design new theme</td>
                                    <td>10/10/2016</td>
                                    <td>12/11/2016</td>
                                    <td><span class="label label-warning">Pending</span></td>
                                    <td><div class="progress progress-striped progress-sm">
                                      <div class="progress-bar progress-bar-warning" style="width: 25%;"></div>
                                    </div></td>
                                  </tr>
                                  <tr>
                                    <td>2</td>
                                    <td>Website Redesign</td>
                                    <td>10/10/2016</td>
                                   <td>12/11/2016</td>
                                    <td><span class="label label-success">In Progress</span></td>
                                    <td><div class="progress progress-striped progress-sm">
                                      <div class="progress-bar progress-bar-success" style="width: 25%;"></div>
                                    </div></td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td>Mockup Design</td>
                                     <td>10/10/2016</td>
                                     <td>12/11/2016</td>
                                    <td><span class="label label-warning">Pending</span></td>
                                    <td><div class="progress progress-striped progress-sm">
                                      <div class="progress-bar progress-bar-primary" style="width: 25%;"></div>
                                    </div></td>
                                  </tr>
                                  <tr>
                                    <td>4</td>
                                    <td>Admin Panel design</td>
                                    <td>10/10/2016</td>
                                    <td>12/11/2016</td>
                                    <td><span class="label label-success">In Progress</span></td>
                                    <td><div class="progress progress-striped progress-sm">
                                      <div class="progress-bar progress-bar-success" style="width: 25%;"></div>
                                    </div></td>
                                  </tr>
                                  <tr>
                                    <td>5</td>
                                    <td>Front End Design</td>
                                    <td>10/10/2016</td>
                                    <td>12/11/2016</td>
                                    <td><span class="label label-danger">On Hold</span></td>
                                    <td><div class="progress progress-striped progress-sm">
                                      <div class="progress-bar progress-bar-danger" style="width: 25%;"></div>
                                    </div></td>
                                  </tr>
                                  <tr>
                                    <td>6</td>
                                    <td>Software Testing</td>
                                    <td>10/10/2016</td>
                                    <td>12/11/2016</td>
                                    <td><span class="label label-success">In Progress</span></td>
                                    <td><div class="progress progress-striped progress-sm">
                                      <div class="progress-bar progress-bar-success" style="width: 25%;"></div>
                                    </div></td>
                                  </tr>
                                  <tr>
                                    <td>7</td>
                                    <td>Admin Panel design</td>
                                    <td>10/10/2016</td>
                                    <td>12/11/2016</td>
                                    <td><span class="label label-danger">On Hold</span></td>
                                    <td><div class="progress progress-striped progress-sm">
                                      <div class="progress-bar progress-bar-danger" style="width: 25%;"></div>
                                    </div></td>
                                  </tr>
                                  <tr>
                                    <td>8</td>
                                    <td>Website Redesign</td>
                                    <td>10/10/2016</td>
                                    <td>12/11/2016</td>
                                    <td><span class="label label-warning">Pending</span></td>
                                    <td><div class="progress progress-striped progress-sm">
                                      <div class="progress-bar progress-bar-warning" style="width: 25%;"></div>
                                    </div></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                                
                        </div>
                       </div>
					<!-- Start inbox widget-->
                   </div>
                   <!--End row-->
			   
			    </div>
        <!-- End Wrapper-->


@endsection