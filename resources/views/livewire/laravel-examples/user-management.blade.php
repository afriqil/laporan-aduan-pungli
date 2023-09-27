<div class="main-content">
    <div class="row">
        <div class="col-12">
            <div class="mb-4 mx-4">
                <!-- Tampilan pesan kesalahan -->
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Tampilan pesan sukses -->
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">All Admin</h5>
                        </div>
                        <a data-toggle="modal" data-target="#addAdmin" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; New Admin</a>

                        <!-- Modal Add -->
                        <div class="modal fade" id="addAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Admin</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('add-user-management') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="full_name">Full Name</label>
                                            <input type="text" name="full_name" class="form-control"id="full_name" placeholder="Your name..">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary bg-gradient-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                          </div>
                        </div>

                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        NO
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Email
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        role
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach($users as $user)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $no }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $user->name }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $user->email }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $user->role }}</p>
                                    </td>
                                    <td class="text-center">
                                        <a data-toggle="modal" data-target="#editAdmin<?=$user->id?>"  class="mx-3" data-bs-toggle="tooltip"
                                            data-bs-original-title="Edit user">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <!-- <span>
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </span> -->
                                    </td>
                                </tr>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editAdmin<?=$user->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit {{ $user->name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('edit-user-management') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="full_name">Full Name</label>
                                                    <input type="text" name="full_name" class="form-control"id="full_name" value="{{$user->name}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email Address</label>
                                                    <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary bg-gradient-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                                @php
                                    $no++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
