@extends('main-layout.main')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              <i class="fas fa-undo-alt mr-2" style="color:#e94560;"></i>
              Cancel Requests
              @if($pendingCount > 0)
                <span class="badge badge-danger ml-2" style="font-size:.75rem;">{{ $pendingCount }} Pending</span>
              @endif
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Cancel Requests</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">

        @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
          </div>
        @endif
        @if(session('error'))
          <div class="alert alert-danger alert-dismissible fade show">
            <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
          </div>
        @endif

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header" style="background:linear-gradient(135deg,#1a1a2e,#0f3460);color:#fff;">
                <h3 class="card-title">
                  <i class="fas fa-list mr-2"></i>All Cancel Requests
                </h3>
              </div>
              <div class="card-body p-0">
                @if($requests->count() > 0)
                <div class="table-responsive">
                <table class="table table-hover mb-0">
                  <thead style="background:#f1f5f9;">
                    <tr>
                      <th style="font-size:.8rem;text-transform:uppercase;letter-spacing:.5px;color:#718096;">#</th>
                      <th style="font-size:.8rem;text-transform:uppercase;letter-spacing:.5px;color:#718096;">Customer</th>
                      <th style="font-size:.8rem;text-transform:uppercase;letter-spacing:.5px;color:#718096;">Order No.</th>
                      <th style="font-size:.8rem;text-transform:uppercase;letter-spacing:.5px;color:#718096;">Amount</th>
                      <th style="font-size:.8rem;text-transform:uppercase;letter-spacing:.5px;color:#718096;">Payment Method</th>
                      <th style="font-size:.8rem;text-transform:uppercase;letter-spacing:.5px;color:#718096;">Cancel Reason</th>
                      <th style="font-size:.8rem;text-transform:uppercase;letter-spacing:.5px;color:#718096;">Admin Response</th>
                      <th style="font-size:.8rem;text-transform:uppercase;letter-spacing:.5px;color:#718096;">Requested At</th>
                      <th style="font-size:.8rem;text-transform:uppercase;letter-spacing:.5px;color:#718096;">Status</th>
                      <th style="font-size:.8rem;text-transform:uppercase;letter-spacing:.5px;color:#718096;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($requests as $req)
                    <tr>
                      <td style="color:#718096;font-size:.85rem;">{{ $req->id }}</td>
                      <td>
                        <strong>{{ $req->user?->name ?? '—' }}</strong><br>
                        <small class="text-muted">{{ $req->user?->email ?? '' }}</small>
                      </td>
                      <td><code>{{ $req->order?->order_number ?? '—' }}</code></td>
                      <td><strong>{{ $req->order?->total_amount }}/-</strong></td>
                      <td>
                        @php
                          $method = $req->order?->order_payment_method;
                          $methodLabel = match(strtolower($method ?? '')) {
                            'cashondelivery' => 'Cash on Delivery',
                            'bkash'  => 'Bkash',
                            'nogod'  => 'Nogod',
                            'card'   => 'Card',
                            default  => ucfirst($method ?? '—'),
                          };
                        @endphp
                        <span class="badge badge-secondary">{{ $methodLabel }}</span>
                      </td>
                      <td style="max-width:220px;">
                        <span style="font-size:.87rem;">{{ Str::limit($req->cancel_reason, 80) }}</span>
                        @if(strlen($req->cancel_reason) > 80)
                          <a href="#" class="text-primary" style="font-size:.8rem;" onclick="showReason('{{ addslashes($req->cancel_reason) }}'); return false;">more</a>
                        @endif
                      </td>
                      <td style="max-width:200px;">
                        @if($req->admin_description)
                          <span style="font-size:.87rem;color:#2d3748;">{{ Str::limit($req->admin_description, 60) }}</span>
                        @else
                          <span class="text-muted" style="font-size:.82rem;">—</span>
                        @endif
                      </td>
                      <td style="font-size:.85rem;color:#718096;">{{ $req->created_at->format('d M Y, h:i A') }}</td>
                      <td>
                        @if($req->status === 'Pending')
                          <span class="badge badge-warning" style="font-size:.8rem;">Pending</span>
                        @elseif($req->status === 'Approved')
                          <span class="badge badge-success" style="font-size:.8rem;">Approved</span>
                        @else
                          <span class="badge badge-danger" style="font-size:.8rem;">Rejected</span>
                        @endif
                      </td>
                      <td>
                        @if($req->status === 'Pending')
                          <button onclick="openApprove({{ $req->id }})"
                                  class="btn btn-xs btn-success mb-1" style="border-radius:5px;">
                            <i class="fas fa-check mr-1"></i>Approve
                          </button>
                          <button onclick="openReject({{ $req->id }})"
                                  class="btn btn-xs btn-danger" style="border-radius:5px;">
                            <i class="fas fa-times mr-1"></i>Reject
                          </button>
                        @else
                          <span class="text-muted" style="font-size:.82rem;">Resolved</span>
                        @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                </div>
                <div class="p-3">{{ $requests->links() }}</div>
                @else
                <div class="text-center py-5 text-muted">
                  <i class="fas fa-inbox fa-3x mb-3"></i>
                  <p class="mb-0">No cancel requests found.</p>
                </div>
                @endif
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
</div>

{{-- ══════════ APPROVE MODAL ══════════ --}}
<div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="border-radius:12px;overflow:hidden;border:none;box-shadow:0 20px 60px rgba(0,0,0,.25);">
      <div class="modal-header text-white" style="background:linear-gradient(135deg,#11998e,#38ef7d);border-bottom:none;padding:20px 24px;">
        <h5 class="modal-title font-weight-bold">
          <i class="fas fa-check-circle mr-2"></i>Approve Cancel Request
        </h5>
        <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
      </div>
      <form id="approveForm" method="POST" action="">
        @csrf
        <div class="modal-body" style="background:#f8fafc;padding:24px;">
          <div class="alert alert-success" style="border-radius:8px;font-size:.9rem;">
            <i class="fas fa-info-circle mr-2"></i>
            Approving will <strong>cancel the order</strong> and notify the customer.
          </div>
          <div class="form-group mb-0">
            <label class="font-weight-bold" style="font-size:.85rem;text-transform:uppercase;letter-spacing:.5px;color:#718096;">
              Response / Description <span class="text-danger">*</span>
            </label>
            <textarea name="admin_description" class="form-control mt-1" rows="4"
                      placeholder="Explain why you are approving this cancel request…"
                      required></textarea>
          </div>
        </div>
        <div class="modal-footer" style="background:#f8fafc;border-top:1px solid #e2e8f0;">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
            <i class="fas fa-times mr-1"></i>Cancel
          </button>
          <button type="submit" class="btn btn-success btn-sm">
            <i class="fas fa-check mr-1"></i>Confirm Approve
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- ══════════ REJECT MODAL ══════════ --}}
<div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="border-radius:12px;overflow:hidden;border:none;box-shadow:0 20px 60px rgba(0,0,0,.25);">
      <div class="modal-header text-white" style="background:linear-gradient(135deg,#e94560,#c0392b);border-bottom:none;padding:20px 24px;">
        <h5 class="modal-title font-weight-bold">
          <i class="fas fa-times-circle mr-2"></i>Reject Cancel Request
        </h5>
        <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
      </div>
      <form id="rejectForm" method="POST" action="">
        @csrf
        <div class="modal-body" style="background:#f8fafc;padding:24px;">
          <div class="alert alert-warning" style="border-radius:8px;font-size:.9rem;">
            <i class="fas fa-info-circle mr-2"></i>
            Rejecting will <strong>keep the order active</strong>. The customer will see your reason.
          </div>
          <div class="form-group mb-0">
            <label class="font-weight-bold" style="font-size:.85rem;text-transform:uppercase;letter-spacing:.5px;color:#718096;">
              Rejection Reason <span class="text-danger">*</span>
            </label>
            <textarea name="admin_description" class="form-control mt-1" rows="4"
                      placeholder="Explain why you are rejecting this cancel request…"
                      required></textarea>
          </div>
        </div>
        <div class="modal-footer" style="background:#f8fafc;border-top:1px solid #e2e8f0;">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
            <i class="fas fa-times mr-1"></i>Close
          </button>
          <button type="submit" class="btn btn-danger btn-sm">
            <i class="fas fa-times-circle mr-1"></i>Confirm Reject
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- ══════════ FULL REASON MODAL ══════════ --}}
<div class="modal fade" id="reasonModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="border-radius:12px;overflow:hidden;">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fas fa-quote-left mr-2 text-muted"></i>Cancel Reason</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
      </div>
      <div class="modal-body">
        <p id="reasonText" style="line-height:1.7;color:#2d3748;"></p>
      </div>
    </div>
  </div>
</div>

<style>
  .modal-content { animation: modalPop .2s ease; }
  @keyframes modalPop { from{transform:scale(.95);opacity:0;} to{transform:scale(1);opacity:1;} }
</style>

<script>
  function openApprove(id) {
    document.getElementById('approveForm').action = '/cancel-request/' + id + '/approve';
    document.querySelector('#approveModal textarea').value = '';
    $('#approveModal').modal('show');
  }
  function openReject(id) {
    document.getElementById('rejectForm').action = '/cancel-request/' + id + '/reject';
    document.querySelector('#rejectModal textarea').value = '';
    $('#rejectModal').modal('show');
  }
  function showReason(text) {
    document.getElementById('reasonText').textContent = text;
    $('#reasonModal').modal('show');
  }
</script>

@stop
