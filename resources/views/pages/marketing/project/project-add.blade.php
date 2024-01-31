@extends('components.app.layouts')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-md-8">
            <div class="card bg-transparent shadow-none">
                <div class="card-header pb-0 text-black">
                    <h4>Create Data</h4>
                </div>
                <form action="" method="POST" class="needs-validation form-create">
                    <div class="card-body">
                        @csrf
                        @method('POST')
                        <div class="row g-2">
                            <div class="col-md-7 form-floating">
                                <input type="text" class="form-control" id="projectName" name="project_name" placeholder="PT Example Indonesia" title="Name Customer / Project" required>
                                <label for="projectName">Name Customer / Project</label>
                            </div>
                            <div class="col-md-5 form-floating">
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
                                <textarea class="form-control" placeholder="Tuliskan deskripsi project anda disini" title="Description Prospect" name="description" id="description" style="height: 300px" required></textarea>
                                <label for="description">Description</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer pt-0">
                        <button type="submit" class="btn btn-primary">Save Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection