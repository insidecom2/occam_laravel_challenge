<x-app-layout>
    <div class="content-wrapper">
        <!-- Content -->
        <div>
            <h4 class=" mb-2">All Users</h4>
            <!-- customers List Table -->
            <div class="card">
                <div class="card-datatable table-responsive">
                    <table class="datatables-customers table border-top">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Customer Id</th>
                                <th>Customer Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Verify</th>
                                <th>2FA</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                {{ view('dashboard.user.create') }}
            </div>
        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
    <!-- modal confirm delete-->
    <div class="modal fade" id="confirm_delete" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-simple modal-add-new-address">
            <div class="modal-content p-md-5">
                <div class="modal-body text-center">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h5>Are you sure you want to delete this user?</h5>
                    <div class="col-12 text-center">
                        <form method="POST" action="{{ route('users.destroy') }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" id="delete_id" value="">
                            <button type="submit"
                                class="btn btn-danger me-sm-3 me-1 waves-effect waves-light">Delete</button>
                            <button type="reset" class="btn btn-label-secondary waves-effect" data-bs-dismiss="modal"
                                aria-label="Close">
                                Cancel
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-alert-message />
    @section('customs_js')
        <script src="{{ asset('js/dashboard/pages-user-lists.js') }}"></script>
        @if ($errors->any())
            <script>
                const offcanvasElement = document.getElementById("offcanvasUserAdd");
                const offcanvas = new bootstrap.Offcanvas(offcanvasElement);
                offcanvas.show();
            </script>
        @endif
    @endsection
</x-app-layout>
