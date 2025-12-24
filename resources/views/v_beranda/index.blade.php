@extends('v_layouts.app')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5">
                            <h2>
                                Welcome 
                                {{ $user->role === 'admin' ? 'Admin' : $user->nama_pegawai }},
                            </h2>

                            @if($user->role === 'admin')
                                <p class="mb-md-0">
                                    Anda login sebagai <strong>Administrator</strong>.
                                </p>
                            @else
                                <p class="mb-md-0">
                                    Anda login sebagai <strong>Pegawai</strong>.
                                </p>
                            @endif
                        </div>

                        <div class="d-flex">
                            <i class="mdi mdi-home text-muted hover-cursor"></i>
                            <p class="text-muted mb-0 hover-cursor">
                                &nbsp;/&nbsp;Dashboard&nbsp;
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                      <div class="d-flex flex-wrap justify-content-xl-between">
                        <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Data Pegawai</small>
                            <div class="dropdown">
                                <h5 class="mb-0 d-inline-block">26 Jul 2018</h5>
                            </div>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Data Admin</small>
                            <h5 class="mr-2 mb-0">$577545</h5>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Data Jabatan</small>
                            <h5 class="mr-2 mb-0">9833550</h5>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Data Kehadiran</small>
                            <h5 class="mr-2 mb-0">2233783</h5>
                          </div>
                        </div> 
                      </div>
                    </div>
    </div>
</div>

@endsection

          