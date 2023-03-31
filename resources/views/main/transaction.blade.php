<div class="col-12">
    <h5 class="title">Transactions History</h5>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Type</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>
                    <th scope="col">Mode</th>
                    <th scope="col">Date/Time</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $counter = 1;
                @endphp
                @forelse ($transactions as $trans)
                    <tr>
                        <th scope="row">{{ $counter++ }}</th>
                        <td>{{ ($trans->type == 'wallet-deposit')?'Deposit' : 'Withdraw'}}</td>
                        <td>{{ number_format($_user->toView($trans->amount)) }} {{ $_user->currency_rate->symbol }}</td>
                        <td>
                            <p style="color: #{{ ($trans->status)?'00ff6d':'fa2407'}}">{{ ($trans->status)?'Success':'Pending'}}</p>
                        </td>
                        <td>{{ $trans->mode }}</td>
                        <th scope="row">{{ $trans->created_at->diffForHumans() }}</th>
                        <td>
                            <a href="javascript:void(0)" class="cmn-btn" onclick="pullOutTransModal('{{ $trans }}')">View</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th colspan="10">No Data Was Returned</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="col-lg-12 d-flex justify-content-center mt-60">
    <nav aria-label="Page navigation" class="d-flex justify-content-center">
        <ul class="pagination justify-content-center align-items-center">
            <li class="page-item">
                <a class="page-btn previous" href="{{ $transactions->previousPageUrl() }}" aria-label="Previous">
                    <img src="{{ asset('images/icon-arrow-left.png') }}" alt="icon">
                </a>
            </li>
            <li class="page-item"><a class="page-link xlr active" href="javascript:void(0)">{{ $transactions->currentPage() }}</a></li>
            <li class="page-item">
                <a class="page-btn next" href="{{ $transactions->nextPageUrl() }}" aria-label="Next">
                    <img src="{{ asset('images/icon-arrow-right.png') }}" alt="icon">
                </a>
            </li>
        </ul>
    </nav>
</div>

 <!-- Transaction Details Modal start -->
 <div class="betpopmodal">
    <div class="modal fade" id="trans-up" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-8 col-xl-9 col-lg-11">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="top-item">
                                    <span>Reference : </span><span id="refrence"></span>
                                </div>
                                <div class="mid-area">
                                    <div class="single-area">
                                        <div class="item-title d-flex align-items-center justify-content-between">
                                            <span>Transaction Mode :</span>
                                        </div>
                                        <div class="d-flex ">
                                            <h5 class="text-center" id="trans_mode"></h3>
                                        </div>
                                    </div>
                                    <div class="single-area quick-amounts">
                                        <div class="item-title d-flex align-items-center">
                                            <p>Payment Type</p>
                                        </div>
                                        <div class="input-item">
                                            <h6 id="trans_type"></h6>
                                        </div>
                                    </div>
                                    <div class="single-area smart-value">
                                        <div class="item-title d-flex align-items-center">
                                            <p class="mdr">Transaction Amount</p>
                                        </div>
                                        <div class="contact-val d-flex align-items-center">
                                            <h3 id="trans_amt"></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="bottom-area">
                                    <div class="bottom-right">
                                        <p>Transaction Date:</p>
                                        <p class="date-area" id="trans_date"></p>
                                    </div>
                                    <div class="btn-area">
                                        <button class="btn-success" >Success</button>
                                    </div>
                                    <div class="fee-area">
                                        <p id="trans_remark"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Transaction Details Modal end -->