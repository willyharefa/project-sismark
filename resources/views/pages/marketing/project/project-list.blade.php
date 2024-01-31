@extends('components.app.layouts')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        {{-- Table View --}}
        <div class="card bg-transparent shadow-none">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Prospect List</h5>
                {{-- offcanvas --}}
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    Create New
                  </button>
                  
                <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header">
                        <h4 class="offcanvas-title" id="offcanvasExampleLabel">Create Data</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div>Buat data baru dengan melengkapi informasi dibawah ini. Anda dapat melewati kolom inputan dengan tanda (-).</div>
                        <div class="row g-2 mt-4">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="projectName" name="project_name" placeholder="PT Example Indonesia" title="Name Customer / Project" required>
                                <label for="projectName">Name Customer / Project</label>
                            </div>
                            <div class="form-floating">
                                <select class="form-select" required title="Member choose">
                                    <option selected>Select Member</option>
                                    <option value="1">Sintia Lestari</option>
                                    <option value="2">Yudha Satria</option>
                                    <option value="3">MITO Team</option>
                                </select>
                                <label for="projectName">Assignment To</label>
                            </div>
                            <div class="col-md-6 form-floating">
                                <input type="date" class="form-control" id="start_date" name="start_date" title="Start Date" required>
                                <label for="start_date">Start Date</label>
                            </div>
                            <div class="col-md-6 form-floating">
                                <input type="date" class="form-control" id="end_date" name="end_date" title="End Date" required>
                                <label for="end_date">Deadline</label>
                            </div>
                            <div class="col-12 form-floating">
                                <textarea class="form-control" placeholder="Tuliskan deskripsi project anda disini" title="Description Prospect" name="description" id="description" style="height: 230px" required></textarea>
                                <label for="description">Description</label>
                            </div>
                        </div>

                        <div class="my-3">
                            <button class="btn btn-primary me-3">Save Data</button>
                            <button class="btn btn-outline-danger" data-bs-dismiss="offcanvas">Discard</button>
                        </div>
                        
                    </div>
                </div>
                {{--  --}}
            </div>
            <div class="card-body">
                <div class="text-nowrap">
                    <table class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th data-priority="0">#</th>
                                <th data-priority="1">Name Prospect</th>
                                <th data-priority="2">Assigness</th>
                                <th data-priority="4">Start Date</th>
                                <th data-priority="5">Deadline</th>
                                <th data-priority="6">Task</th>
                                <th data-priority="7">Status</th>
                                <th data-priority="3">Act.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><a href="http://" class="fw-bold">PT Gudang Garam</a></td>
                                <td>Sintia</td>
                                <td>Jan 01, 2023</td>
                                <td>Mar 01, 2023</td>
                                <td>124 Task</td>
                                <td>
                                    <span class="badge rounded-pill bg-label-success">Completed</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>

                                        <div class="dropdown-menu" style="">
                                            <a href="" class="dropdown-item"><i class='bx bx-show-alt me-1'></i>Selengkapnya</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="" class="dropdown-item"><i class='bx bx-trash me-1'></i>Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- End Table View --}}
    </div>
@endsection