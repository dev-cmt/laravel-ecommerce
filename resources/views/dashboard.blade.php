<x-app-layout>
    <div class="row">
        <div class="col">

            <div class="h-100">
                <div class="row mb-3 pb-1">
                    <div class="col-12">
                        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-20 mb-1">Welcome, {{Auth::user()->name}}!</h4>
                                <p class="text-muted mb-0">Here's what's happening with your store today.</p>
                            </div>
                            
                        </div><!-- end card header -->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->



                



            </div> <!-- end .h-100-->

        </div> <!-- end col -->

    </div>
</x-app-layout>
