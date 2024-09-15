<div class="popup-modal modal fade" tabindex="-1" id="sg-modal-add">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="d-flex justify-content-end m-1">
                <button type="button" class="btn-close text-right" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{asset('public')}}/images/modal.png" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-lg-6">
                        <h2>Get <span class="text-info">25%</span> Discount</h2>
                        <p>Subscribe to the yoori shop newsletter to receive updates on special offers.</p>
                        <form action="#">
                            <div class="tp-subscribe-input">
                                <input type="email" placeholder="Enter Your Email">
                                <button type="submit">Subscribe</button>
                            </div>
                        </form>
                        <div class="tp-footer-social text-center my-4">
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a href="#"><i class="fa-brands fa-vimeo-v"></i></a>
                        </div>
                        <div class="form-group text-center">
                            <input type="checkbox" name="tnc" id="tnc">
                            <label for="tnc">Don't show this popup again</label>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        var modal = new bootstrap.Modal(document.getElementById('sg-modal-add'));
        modal.show();
    });
</script> --}}
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