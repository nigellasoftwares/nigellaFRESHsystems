        <?php
            $active = Helpers::activeMenu($user->role->name);
        ?>

        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        
        <aside class="left-sidebar">
            
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="active">
                            <a class="waves-effect waves-dark" href="#" aria-expanded="false">
                                <i class="icon-grid"></i>
                                <span class="hide-menu">Scan QR</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->