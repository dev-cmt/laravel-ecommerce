<div class="popup-modal modal fade" tabindex="-1" id="sg-modal-add">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{asset('public/frontend')}}/images/product/modal.png" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-lg-6">
                        <h2>Get <span>25%</span> Discount</h2>
                        <p>Subscribe to the yoori shop newsletter to receive updates on special offers.</p>
                        <form action="#">
                            <div class="form-group">
                                <input type="email" class="form-control" required="required" placeholder="Email Address">
                            </div>
                            <button class="btn btn-primary text-uppercase" name="submit" type="submit">Subscribe</button>
                        </form>
                        <div class="social">
                            <ul class="global-list">
                                <li><a href="#"><span><i class="fa-brands fa-facebook"></i></span></a></li>
                                <li><a href="#"><span><i class="fa-brands fa-twitter"></i></span></a></li>
                                <li><a href="#"><span><i class="fa-brands fa-linkedin"></i></span></a></li>
                                <li><a href="#"><span><i class="fa-brands fa-instagram"></i></span></a></li>
                                <li><a href="#"><span><i class="fa-brands fa-pinterest"></i></span></a></li>
                            </ul>
                        </div>
                        <div class="form-group tnc">
                            <input type="checkbox" name="tnc" id="tnc">
                            <label for="tnc">Don't show this popup again</label>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Check if the modal has been shown before using sessionStorage
        if (!sessionStorage.getItem('modalShown')) {
            // Show the modal
            var myModal = new bootstrap.Modal(document.getElementById('sg-modal-add'), {
                backdrop: 'static',
                keyboard: false
            });
            myModal.show();

            // Store the flag in sessionStorage so that it doesn't show again
            sessionStorage.setItem('modalShown', 'true');
        }

        // Handle the "Don't show this popup again" checkbox
        document.getElementById('tnc').addEventListener('change', function () {
            if (this.checked) {
                sessionStorage.setItem('modalShown', 'true');
                myModal.hide();
            }
        });
    });
</script>