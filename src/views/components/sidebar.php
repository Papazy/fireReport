        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <?php $query = mysqli_query($con, "select * from tblsite");
            while ($row = mysqli_fetch_array($query)) {
                $logo = $row['siteLogo'];
                $wtitle = $row['siteTitle'];
            }  ?>
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=BASEURL.'/admin/dashboard'?>">



                <div class="sidebar-brand-text mx-3"><?php echo $wtitle; ?> | Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">


            <li class="nav-item">
                <a class="nav-link" href="dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="true" aria-controls="collapsePages1">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Fire Control Teams</span>
                </a>
                <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?=BASEURL.'/admin/add-team'?>">Add</a>
                        <a class="collapse-item" href="<?=BASEURL.'/admin/manage-teams'?>">Manage</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-fire"></i>
                    <span>Fire Alerts</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?=BASEURL.'/admin/new-requests'?>">New Requests</a>
                        <a class="collapse-item" href="<?=BASEURL.'/admin/assigned-requests'?>">Assigned Requests</a>
                        <a class="collapse-item" href="<?=BASEURL.'/admin/team-ontheway-requests'?>">Team On the Way Report</a>
                        <a class="collapse-item" href="<?=BASEURL.'/admin/workin-progress-requests'?>">Relief Work in Progress</a>
                        <a class="collapse-item" href="<?=BASEURL.'/admin/completed-requests'?>">Completed Requests</a>
                        <a class="collapse-item" href="<?=BASEURL.'/admin/all-requests'?>">All Requests</a>
                    </div>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages2">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Reports</span>
                </a>
                <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?=BASEURL.'/admin/bwdates-report-ds'?>">B/w Dates</a>
                        <a class="collapse-item" href="<?=BASEURL.'/admin/search-report'?>">Search</a>
                    </div>
                </div>
            </li>



            <li class="nav-item">
                <a class="nav-link" href="<?=BASEURL.'/admin/manage-site'?>">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Manage Website</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->