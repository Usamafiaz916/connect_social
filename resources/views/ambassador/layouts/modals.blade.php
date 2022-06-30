<!-- Invitation Modal -->
<div class="modal fade" id="Send-InvitationModal" tabindex="-1" role="dialog" aria-labelledby="Send-InvitationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Send-InvitationModalLabel">Send Invitations</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="send-invite-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="referel-link-outer">
                                <input type="text" class="referel-link-input show-popover" data-popover=".popover-01" value="{{auth()->user()->invite()}}" readonly>
                                <div class="copy-popover popover-01">
                                    <div class="copy-popover-text">
                                        Link Coppied!
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div>Add Email (Press enter to add more)</div>
                                <input type="text" class="form-control pt-1 pb-3" name="emails" id="email-tags" placeholder="Add Emails">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary add-post-close-btn"  data-dismiss="modal" aria-label="Close">Close</button>
                <button type="button" class="btn btn-primary add-post-upload-btn">Send</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $(document).on('submit','#send-invite-form',function () {
           //
        });
    });
</script>